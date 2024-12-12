<?php
// Simple PHP script to demonstrate broken authentication vulnerabilities

// Function to handle login
function login($username, $password) {
    // Hardcoded credentials for demonstration purposes
    $valid_username = "admin";
    $valid_password = "password";

    // Check if credentials match
    if ($username == $valid_username && $password == $valid_password) {
        // Successful login
        return "Login successful!";
    } else {
        // Invalid credentials
        return "Invalid username or password.";
    }
}

// Function to handle registration
function register($username, $password) {
    // Always allow registration for demonstration purposes
    return "Registration successful!";
}

// Function to handle password reset
function resetPassword($username, $new_password) {
    // Always allow password reset for demonstration purposes
    return "Password reset successful!";
}

// Function to handle account deletion
function deleteAccount($username) {
    // Always allow account deletion for demonstration purposes
    return "Account deleted successfully!";
}

// Main script logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'login':
                echo login($_POST['username'], $_POST['password']);
                break;
            case 'register':
                echo register($_POST['username'], $_POST['password']);
                break;
            case 'resetPassword':
                echo resetPassword($_POST['username'], $_POST['new_password']);
                break;
            case 'deleteAccount':
                echo deleteAccount($_POST['username']);
                break;
            default:
                echo "Invalid action.";
        }
    } else {
        echo "No action specified.";
    }
} else {
    // Simple HTML form for demonstration with embedded CSS and JavaScript
    echo <<<HTML
    <!DOCTYPE html>
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }
            .navbar {
                overflow: hidden;
                background-color: #333;
            }
            .navbar a {
                float: left;
                display: block;
                color: #f2f2f2;
                text-align: center;
                padding: 14px 20px;
                text-decoration: none;
            }
            .navbar a:hover {
                background-color: #ddd;
                color: black;
            }
            .form-container {
                max-width: 400px;
                margin: 20px auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .form-container h2 {
                text-align: center;
                color: #333;
            }
            .form-container input[type="text"],
            .form-container input[type="password"] {
                width: 100%;
                padding: 10px;
                margin: 5px 0 20px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }
            .form-container input[type="submit"] {
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
                border-radius: 5px;
            }
            .form-container input[type="submit"]:hover {
                background-color: #45a049;
            }
            .hidden {
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="navbar">
            <a href="#" onclick="showForm('login')">Login</a>
            <a href="#" onclick="showForm('register')">Register</a>
            <a href="#" onclick="showForm('resetPassword')">Reset Password</a>
            <a href="#" onclick="showForm('deleteAccount')">Delete Account</a>
        </div>
        <div id="loginForm" class="form-container hidden">
            <h2>Login</h2>
            <form method="post">
                <input type="hidden" name="action" value="login">
                Username: <input type="text" name="username"><br>
                Password: <input type="password" name="password"><br>
                <input type="submit" value="Login">
            </form>
        </div>
        <div id="registerForm" class="form-container hidden">
            <h2>Register</h2>
            <form method="post">
                <input type="hidden" name="action" value="register">
                Username: <input type="text" name="username"><br>
                Password: <input type="password" name="password"><br>
                <input type="submit" value="Register">
            </form>
        </div>
        <div id="resetPasswordForm" class="form-container hidden">
            <h2>Reset Password</h2>
            <form method="post">
                <input type="hidden" name="action" value="resetPassword">
                Username: <input type="text" name="username"><br>
                New Password: <input type="password" name="new_password"><br>
                <input type="submit" value="Reset Password">
            </form>
        </div>
        <div id="deleteAccountForm" class="form-container hidden">
            <h2>Delete Account</h2>
            <form method="post">
                <input type="hidden" name="action" value="deleteAccount">
                Username: <input type="text" name="username"><br>
                <input type="submit" value="Delete Account">
            </form>
        </div>

        <script>
            function showForm(formId) {
                var forms = document.querySelectorAll('.form-container');
                forms.forEach(function(form) {
                    form.classList.add('hidden');
                });
                document.getElementById(formId).classList.remove('hidden');
            }
        </script>
    </body>
    </html>
HTML;
}
?>
