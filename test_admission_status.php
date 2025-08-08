<?php
include('includes/config.php');

echo "<h2>Admission Status Test</h2>";

// Test the database connection
if ($db->connect_error) {
    echo "❌ Database connection failed: " . $db->connect_error;
    exit;
}

echo "✅ Database connection successful<br><br>";

// Check if required tables exist
$tables = ['stud_reg_info', 'educ_reg_info', 'parents_reg_info'];
$tableExists = true;

foreach ($tables as $table) {
    $checkTable = "SHOW TABLES LIKE '$table'";
    $tableResult = $db->query($checkTable);
    
    if ($tableResult->num_rows === 0) {
        echo "❌ Table '$table' does not exist<br>";
        $tableExists = false;
    } else {
        echo "✅ Table '$table' exists<br>";
    }
}

if (!$tableExists) {
    echo "<br>❌ Some required tables are missing. Please create the necessary tables first.";
    exit;
}

echo "<br>✅ All required tables exist<br><br>";

// Test the admission status function
include('functions/admission_status_functions.php');

// Test with a non-existent email
echo "<h3>Test 1: Non-existent email</h3>";
$testEmail1 = "nonexistent@example.com";
$result1 = checkAdmissionStatus($testEmail1);
echo "Email: $testEmail1<br>";
echo "Status: " . $result1['status'] . "<br>";
echo "Message: " . $result1['message'] . "<br><br>";

// Test with an empty email
echo "<h3>Test 2: Empty email</h3>";
$testEmail2 = "";
$result2 = checkAdmissionStatus($testEmail2);
echo "Email: (empty)<br>";
echo "Status: " . $result2['status'] . "<br>";
echo "Message: " . $result2['message'] . "<br><br>";

// Show sample data structure
echo "<h3>Sample Data Structure</h3>";
echo "The function expects the following database structure:<br>";
echo "- stud_reg_info table with columns: studentID, firstName, lastName, email, course<br>";
echo "- educ_reg_info table with columns: studentID, primarySchool, secondarySchool, tertiarySchool<br>";
echo "- parents_reg_info table with columns: studentID, fatherFirstName, fatherLastName, motherFirstName, motherLastName<br><br>";

echo "<h3>Function Response Format</h3>";
echo "The function returns JSON with the following structure:<br>";
echo "<pre>";
echo '{
    "status": "success|incomplete|not_found|error",
    "message": "Human readable message",
    "data": {
        "studentID": "123",
        "name": "John Doe",
        "email": "john@example.com",
        "course": "BSIT",
        "isComplete": true|false,
        "missingInfo": ["Personal Information", "Course Selection"],
        "instructions": ["Instruction 1", "Instruction 2"]
    }
}';
echo "</pre>";

echo "<br><strong>Test completed successfully!</strong>";
?> 