<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include('../includes/config.php');

    function studentLogin($studentNo, $password) {
        global $db;
        
        $studentNo = $db->real_escape_string($studentNo);
        
        // Query to check student credentials
        $query = "SELECT * FROM student WHERE studentNo = '$studentNo'";
        $result = $db->query($query);
        
        if ($result && $result->num_rows > 0) {
            $student = $result->fetch_assoc();
            
            // Check password (assuming plain text for now, you might want to hash it)
            if ($password === $student['password']) {
                // Start session and store student data
                session_start();
                $_SESSION['student_id'] = $student['studentNo'];
                $_SESSION['student_name'] = $student['firstName'] . ' ' . $student['lastName'];
                $_SESSION['student_role'] = $student['role'];
                $_SESSION['user_type'] = 'student';
                
                return [
                    'status' => 'success',
                    'message' => 'Login successful!<br>Welcome back, ' . $student['firstName'] . '!'
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Invalid password'
                ];
            }
        } else {
            return [
                'status' => 'error',
                'message' => 'Student ID not found'
            ];
        }
    }

    // Handle AJAX requests
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
        header('Content-Type: application/json');
        
        $studentNo = $_POST['studentNo'] ?? '';
        $password = $_POST['password'] ?? '';
        
        if (empty($studentNo) || empty($password)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Please fill in all fields'
            ]);
            exit;
        }
        
        $result = studentLogin($studentNo, $password);
        echo json_encode($result);
        exit;
    }
?> 