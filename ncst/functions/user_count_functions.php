<?php
    error_reporting(0);
    ini_set('display_errors', 0);

    ob_start();
    
    try {
        include('../includes/config.php');

        if (!isset($db) || !$db) {
            throw new Exception('Database connection failed');
        }
        
        function getTotalUsers() {
            global $db;
            
            $total = 0;

            $studentQuery = "SELECT COUNT(*) as count FROM student";
            $studentResult = $db->query($studentQuery);
            if ($studentResult) {
                $studentCount = $studentResult->fetch_assoc()['count'];
                $total += $studentCount;
            }

            $employeeQuery = "SELECT COUNT(*) as count FROM employee";
            $employeeResult = $db->query($employeeQuery);
            if ($employeeResult) {
                $employeeCount = $employeeResult->fetch_assoc()['count'];
                $total += $employeeCount;
            }

            $adminQuery = "SELECT COUNT(*) as count FROM admin";
            $adminResult = $db->query($adminQuery);
            if ($adminResult) {
                $adminCount = $adminResult->fetch_assoc()['count'];
                $total += $adminCount;
            }
            
            return $total;
        }

        function getStudentCount() {
            global $db;
            
            $query = "SELECT COUNT(*) as count FROM student";
            $result = $db->query($query);
            
            if ($result) {
                return $result->fetch_assoc()['count'];
            }
            
            return 0;
        }

        function getStudentAssistantCount() {
            global $db;
            
            $query = "SELECT COUNT(*) as count FROM student WHERE role = 'student assistant'";
            $result = $db->query($query);
            
            if ($result) {
                return $result->fetch_assoc()['count'];
            }
            
            return 0;
        }

        function getRegistrarCount() {
            global $db;
            
            $query = "SELECT COUNT(*) as count FROM employee WHERE user_role = 'registrar'";
            $result = $db->query($query);
            
            if ($result) {
                return $result->fetch_assoc()['count'];
            }
            
            return 0;
        }


        function getTreasuryCount() {
            global $db;
            
            $query = "SELECT COUNT(*) as count FROM employee WHERE user_role = 'treasury'";
            $result = $db->query($query);
            
            if ($result) {
                return $result->fetch_assoc()['count'];
            }
            
            return 0;
        }

        function getAllUsers() {
            global $db;
            
            $users = [];

            $studentQuery = "SELECT 
                'student' as user_type,
                studentNo as id_no,
                CONCAT(firstName, ' ', COALESCE(midName, ''), ' ', lastName, ' ', COALESCE(suffix, '')) as full_name,
                birthDate,
                email,
                role,
                dateCreated,
                'Active' as status
            FROM student";
            
            $studentResult = $db->query($studentQuery);
            if ($studentResult) {
                while ($row = $studentResult->fetch_assoc()) {
                    $users[] = $row;
                }
            }

            $employeeQuery = "SELECT 
                'employee' as user_type,
                employeeNo as id_no,
                CONCAT(firstName, ' ', COALESCE(midName, ''), ' ', lastName, ' ', COALESCE(suffix, '')) as full_name,
                birthDate,
                email,
                user_role as role,
                dateCreated,
                'Active' as status
            FROM employee";
            
            $employeeResult = $db->query($employeeQuery);
            if ($employeeResult) {
                while ($row = $employeeResult->fetch_assoc()) {
                    $users[] = $row;
                }
            }
            
            return $users;
        }

        function addUser($userData) {
            global $db;
            
            $response = ['status' => 'error', 'message' => 'Unknown error occurred'];
            
            try {
                $userType = $userData['userType'];
                $firstName = $db->real_escape_string($userData['firstName']);
                $midName = $db->real_escape_string($userData['midName']);
                $lastName = $db->real_escape_string($userData['lastName']);
                $suffix = $db->real_escape_string($userData['suffix']);
                $birthDate = $db->real_escape_string($userData['birthDate']);
                $email = $db->real_escape_string($userData['email']);
                $role = $db->real_escape_string($userData['role']);

                $password = password_hash($userData['password'], PASSWORD_DEFAULT);
                
                if ($userType === 'student') {
                    $studentNo = $db->real_escape_string($userData['studentNo']);
                    $course = $db->real_escape_string($userData['course']);
                    $yearLevel = $db->real_escape_string($userData['yearLevel']);
                    
                    $query = "INSERT INTO student (studentNo, firstName, midName, lastName, suffix, birthDate, email, role, course, yearLevel, password, dateCreated) 
                             VALUES ('$studentNo', '$firstName', '$midName', '$lastName', '$suffix', '$birthDate', '$email', '$role', '$course', '$yearLevel', '$password', NOW())";
                    
                    if ($db->query($query)) {
                        $response = ['status' => 'success', 'message' => 'Student added successfully!'];
                    } else {
                        $response = ['status' => 'error', 'message' => 'Failed to add student: ' . $db->error];
                    }
                    
                } elseif ($userType === 'employee') {
                    $employeeNo = $db->real_escape_string($userData['empId']);

                    $userRole = '';
                    switch ($role) {
                        case 'registrar':
                            $userRole = 'registrar';
                            break;
                        case 'treasury':
                            $userRole = 'treasury';
                            break;
                        case 'clinic nurse':
                            $userRole = 'clinic_nurse';
                            break;
                        case 'department head':
                            $userRole = 'department_head';
                            break;
                        case 'admin':
                            $userRole = 'admin';
                            break;
                        default:
                            $userRole = $role;
                    }
                    
                    $query = "INSERT INTO employee (employeeNo, firstName, midName, lastName, suffix, birthDate, email, user_role, password, dateCreated) 
                             VALUES ('$employeeNo', '$firstName', '$midName', '$lastName', '$suffix', '$birthDate', '$email', '$userRole', '$password', NOW())";
                    
                    if ($db->query($query)) {
                        $response = ['status' => 'success', 'message' => 'Employee added successfully!'];
                    } else {
                        $response = ['status' => 'error', 'message' => 'Failed to add employee: ' . $db->error];
                    }
                } else {
                    $response = ['status' => 'error', 'message' => 'Invalid user type'];
                }
                
            } catch (Exception $e) {
                $response = ['status' => 'error', 'message' => 'Exception: ' . $e->getMessage()];
            }
            
            return $response;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
            ob_clean();
            
            header('Content-Type: application/json');
            
            switch ($_POST['action']) {
                case 'get_user_counts':
                    $data = [
                        'total_users' => getTotalUsers(),
                        'students' => getStudentCount(),
                        'student_assistants' => getStudentAssistantCount(),
                        'registrars' => getRegistrarCount(),
                        'treasury' => getTreasuryCount()
                    ];
                    echo json_encode($data);
                    break;
                    
                case 'get_all_users':
                    $users = getAllUsers();
                    echo json_encode(['status' => 'success', 'users' => $users]);
                    break;
                    
                case 'add_user':
                    $result = addUser($_POST);
                    echo json_encode($result);
                    break;
                    
                default:
                    echo json_encode(['error' => 'Invalid action']);
            }
            exit;
        }
        
    } catch (Exception $e) {
        ob_clean();
        
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'error',
            'message' => 'PHP Error: ' . $e->getMessage(),
            'debug' => [
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]
        ]);
        exit;
    }

    ob_end_clean();
?> 