<?php
// The plain text password
$plainPassword = 'ncst-employee123';

// Hash the password using bcrypt
$hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

// Output the hashed password
echo "Plain Password: " . $plainPassword . "<br>";
echo "Hashed Password: " . $hashedPassword;
?>