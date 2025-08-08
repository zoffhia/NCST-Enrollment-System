<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include(__DIR__ . '/../includes/config.php');

    function checkAdminSession() {
        if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in'] || 
            !isset($_SESSION['admin_role']) || $_SESSION['admin_role'] !== 'admin') {

            header('Location: /ncst/logins/admin_login.php');
            exit();
        }
    }

    function checkEmployeeSession() {
        if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in'] || 
            !isset($_SESSION['employee_role']) || !in_array($_SESSION['employee_role'], ['registrar', 'department_head', 'treasury', 'clinic_nurse'])) {

            header('Location: /ncst/logins/employee_login.php');
            exit();
        }
    }

    function checkStudentSession() {
        if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in'] || 
            !isset($_SESSION['student_role']) || $_SESSION['student_role'] !== 'student') {

            header('Location: /ncst/logins/student_login.php');
            exit();
        }
    }

    function getAdminInfo() {
        if (isset($_SESSION['admin_id'])) {
            return [
                'id' => $_SESSION['admin_id'],
                'email' => $_SESSION['admin_email'],
                'name' => $_SESSION['admin_name'],
                'role' => $_SESSION['admin_role']
            ];
        }
        return null;
    }

    function getEmployeeInfo() {
        if (isset($_SESSION['employee_id'])) {
            return [
                'id' => $_SESSION['employee_id'],
                'email' => $_SESSION['employee_email'],
                'name' => $_SESSION['employee_name'],
                'role' => $_SESSION['employee_role']
            ];
        }
        return null;
    }

    function getStudentInfo() {
        if (isset($_SESSION['student_id'])) {
            return [
                'id' => $_SESSION['student_id'],
                'name' => $_SESSION['student_name'],
                'email' => $_SESSION['student_email'],
                'course' => $_SESSION['student_course'],
                'year' => $_SESSION['student_year'],
                'role' => $_SESSION['student_role']
            ];
        }
        return null;
    }

    function adminLogin($email, $password) {
        global $db;

        $email = $db->real_escape_string($email);
        $password = $db->real_escape_string($password);

        $query = "SELECT * FROM admin WHERE email = '$email'";
        $result = $db->query($query);
    
        if ($result && $result->num_rows > 0) {
            $admin = $result->fetch_assoc();

            if (password_verify($password, $admin['password'])) {
                $_SESSION['admin_id'] = $admin['adminID'];
                $_SESSION['admin_email'] = $admin['email'];

                $fullName = $admin['firstName'];
                if (!empty($admin['middleName'])) {
                    $fullName .= ' ' . $admin['middleName'];
                }
                $fullName .= ' ' . $admin['lastName'];
            
                $_SESSION['admin_name'] = $fullName;
                $_SESSION['admin_role'] = 'admin';
                $_SESSION['logged_in'] = true;
            
                return [
                    'status' => 'success',
                    'message' => 'Login successful! Welcome back, ' . $fullName . '!',
                    'redirect' => '/ncst/portals/admin_portal.php'
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Invalid password. Please try again.'
                ];
            }
        } else {
            return [
                'status' => 'error',
                'message' => 'Email address not found. Please check your credentials.'
            ];
        }
    }

    function employeeLogin($email, $password) {
        global $db;

        $email = $db->real_escape_string($email);
        $password = $db->real_escape_string($password);

        $query = "SELECT * FROM employee WHERE email = '$email'";
        $result = $db->query($query);
    
        if ($result && $result->num_rows > 0) {
            $employee = $result->fetch_assoc();

            if (password_verify($password, $employee['password'])) {
                $_SESSION['employee_id'] = $employee['employeeNo'];

                $fullName = $employee['firstName'];
                if (!empty($employee['midName'])) {
                    $fullName .= ' ' . $employee['midName'];
                }
                $fullName .= ' ' . $employee['lastName'];

                $_SESSION['employee_email'] = $employee['email'];
                $_SESSION['employee_name'] = $fullName;
                $_SESSION['employee_role'] = $employee['user_role'];
                $_SESSION['logged_in'] = true;

                $redirect_url = '';
                switch($employee['user_role']) {
                    case 'registrar':
                        $redirect_url = '/ncst/portals/registrar_portal.php';
                        break;
                    case 'department_head':
                        $redirect_url = '/ncst/portals/dept_head_portal.php';
                        break;
                    case 'treasury':
                        $redirect_url = '/ncst/portals/treasury_portal.php';
                        break;
                    case 'clinic_nurse':
                        $redirect_url = '/ncst/portals/clinic_portal.php';
                        break;
                    default:
                        $redirect_url = '/ncst/portals/employee_portal.php';
                }
            
                return [
                    'status' => 'success',
                    'message' => 'Login successful! Welcome back, ' . $employee['firstName'] . '!',
                    'redirect' => $redirect_url
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Invalid password. Please try again.'
                ];
            }
        } else {
            return [
                'status' => 'error',
                'message' => 'Email address not found. Please check your credentials.'
            ];
        }
    }

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
                $_SESSION['student_id'] = $student['studentNo'];
                $_SESSION['student_name'] = $student['firstName'] . ' ' . $student['lastName'];
                $_SESSION['student_email'] = $student['email'] ?? '';
                $_SESSION['student_course'] = $student['course'] ?? '';
                $_SESSION['student_year'] = $student['year'] ?? '';
                $_SESSION['student_role'] = 'student';
                $_SESSION['logged_in'] = true;
                
                return [
                    'status' => 'success',
                    'message' => 'Login successful!<br>Welcome back, ' . $student['firstName'] . '!',
                    'redirect' => '/ncst/portals/student_portal.php'
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

    function adminLogout() {
        session_unset();
        session_destroy();

        header('Location: /ncst/logins/admin_login.php');
        exit();
    }

    function employeeLogout() {
        session_unset();
        session_destroy();

        header('Location: /ncst/logins/employee_login.php');
        exit();
    }

    function studentLogout() {
        session_unset();
        session_destroy();

        header('Location: /ncst/logins/student_login.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
        $userType = $_POST['user_type'] ?? '';
        
        switch ($userType) {
            case 'admin':
                $email = $_POST['email'] ?? '';
                $password = $_POST['password'] ?? '';
                
                if (empty($email) || empty($password)) {
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Please fill in all fields.'
                    ]);
                    exit;
                }
                
                $result = adminLogin($email, $password);
                break;
                
            case 'employee':
                $email = $_POST['email'] ?? '';
                $password = $_POST['password'] ?? '';
                
                if (empty($email) || empty($password)) {
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Please fill in all fields.'
                    ]);
                    exit;
                }
                
                $result = employeeLogin($email, $password);
                break;
                
            case 'student':
                $studentNo = $_POST['studentNo'] ?? '';
                $password = $_POST['password'] ?? '';
                
                if (empty($studentNo) || empty($password)) {
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Please fill in all fields.'
                    ]);
                    exit;
                }
                
                $result = studentLogin($studentNo, $password);
                break;
                
            default:
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Invalid user type.'
                ]);
                exit;
        }
        
        echo json_encode($result);
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'logout') {
        $userType = $_POST['user_type'] ?? '';
        
        session_unset();
        session_destroy();
        
        $redirectUrl = '/ncst/logins/admin_login.php'; // default
        $message = 'You have been successfully logged out.';
        
        switch ($userType) {
            case 'admin':
                $redirectUrl = '/ncst/logins/admin_login.php';
                break;
            case 'employee':
                $redirectUrl = '/ncst/logins/employee_login.php';
                break;
            case 'student':
                $redirectUrl = '/ncst/logins/student_login.php';
                break;
        }
    
        echo json_encode([
            'status' => 'success',
            'message' => $message,
            'redirect' => $redirectUrl
        ]);
        exit;
    }
?> 