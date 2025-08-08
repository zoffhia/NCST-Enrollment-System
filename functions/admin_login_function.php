<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include('../includes/config.php');

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
    
        $result = adminLogin($email, $password);
        echo json_encode($result);
        exit;
    }
?>
