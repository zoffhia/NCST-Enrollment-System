<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    include('../includes/config.php');

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

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
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
        echo json_encode($result);
        exit;
    }
?> 