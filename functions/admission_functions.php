<?php
include_once('../includes/config.php');

/**
 * Admission Functions for NCST Enrollment System
 * Handles admission form processing and health form integration
 */

/**
 * Insert admission data into database
 * @param array $student - Student information
 * @param array $education - Educational background
 * @param array $parent - Parent/Guardian information
 * @param int $healthFormID - Health form ID (optional)
 * @return array - Response with status and message
 */
function insertAdmission($student, $education, $parent, $healthFormID = null) {
    global $db;
    
    try {
        // Start transaction
        $db->begin_transaction();

        $studentSql = "INSERT INTO stud_reg_info (
            firstName, midName, lastName, suffix, address, zip, phone, 
            gender, civilStatus, nationality, birthDate, birthPlace, email, religion,
            employer, position, course, houseHeroes, nstp
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $studentStmt = $db->prepare($studentSql);
        
        if (!$studentStmt) {
            throw new Exception('Database preparation failed: ' . $db->error);
        }
        
        $studentStmt->bind_param("ssssssssssssssssssss",
            $student['firstName'],
            $student['midName'],
            $student['lastName'],
            $student['suffix'],
            $student['address'],
            $student['zip'],
            $student['phone'],
            $student['gender'],
            $student['civilStatus'],
            $student['nationality'],
            $student['birthDate'],
            $student['birthPlace'],
            $student['email'],
            $student['religion'],
            $student['employer'],
            $student['position'],
            $student['course'],
            $student['year'],
            $student['houseHeroes'],
            $student['nstp']
        );
        
        if (!$studentStmt->execute()) {
            throw new Exception('Failed to insert student data: ' . $studentStmt->error);
        }
        
        $studentID = $studentStmt->insert_id;
        $studentStmt->close();

        $educationSql = "INSERT INTO educ_reg_info (
            studentID, primarySchool, primaryYear, secondarySchool, secondaryYear,
            tertiarySchool, tertiaryYear, courseGraduated
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $educationStmt = $db->prepare($educationSql);
        
        if (!$educationStmt) {
            throw new Exception('Database preparation failed: ' . $db->error);
        }
        
        $educationStmt->bind_param("isssssss",
            $studentID,
            $education['primarySchool'],
            $education['primaryYear'],
            $education['secondarySchool'],
            $education['secondaryYear'],
            $education['tertiarySchool'],
            $education['tertiaryYear'],
            $education['courseGraduated']
        );
        
        if (!$educationStmt->execute()) {
            throw new Exception('Failed to insert education data: ' . $educationStmt->error);
        }
        
        $educationStmt->close();

        $parentSql = "INSERT INTO parents_reg_info (
            studentID, fatherFirstName, fatherMidName, fatherLastName, fatherSuffix,
            fatherAddress, fatherPhone, fatherOccupation, motherFirstName, motherMidName,
            motherLastName, motherAddress, motherPhone, motherOccupation,
            guardianFirstName, guardianMidName, guardianLastName, guardianSuffix,
            guardianAddress, guardianPhone, guardianOccupation, guardianRelationship
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $parentStmt = $db->prepare($parentSql);
        
        if (!$parentStmt) {
            throw new Exception('Database preparation failed: ' . $db->error);
        }
        
        $parentStmt->bind_param("isssssssssssssssssssss",
            $studentID,
            $parent['fatherFirstName'],
            $parent['fatherMidName'],
            $parent['fatherLastName'],
            $parent['fatherSuffix'],
            $parent['fatherAddress'],
            $parent['fatherPhone'],
            $parent['fatherOccupation'],
            $parent['motherFirstName'],
            $parent['motherMidName'],
            $parent['motherLastName'],
            $parent['motherAddress'],
            $parent['motherPhone'],
            $parent['motherOccupation'],
            $parent['guardianFirstName'],
            $parent['guardianMidName'],
            $parent['guardianLastName'],
            $parent['guardianSuffix'],
            $parent['guardianAddress'],
            $parent['guardianPhone'],
            $parent['guardianOccupation'],
            $parent['guardianRelationship']
        );
        
        if (!$parentStmt->execute()) {
            throw new Exception('Failed to insert parent data: ' . $parentStmt->error);
        }
        
        $parentStmt->close();
        $db->commit();
        
        return [
            'status' => 'success',
            'message' => 'Admission submitted successfully!',
            'studentID' => $studentID
        ];
        
    } catch (Exception $e) {
        $db->rollback();
        
        return [
            'status' => 'error',
            'message' => 'Admission submission failed: ' . $e->getMessage()
        ];
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $response = [];
    
    switch ($_POST['action']) {
        case 'admission':
            $student = json_decode($_POST['student'], true);
            $education = json_decode($_POST['education'], true);
            $parent = json_decode($_POST['parent'], true);

            $response = insertAdmission($student, $education, $parent);
            break;
        default:
            $response = [
                'status' => 'error',
                'message' => 'Invalid action specified'
            ];
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>