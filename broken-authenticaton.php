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
    // Simple HTML form for demonstration with embedded CSS
    ?>
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
                position: fixed;
                top: 0;
                width: 100%;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            }
            .navbar a {
                float: left;
                display: block;
                color: #f2f2f2;
                text-align: center;
                padding: 14px 20px;
                text-decoration: none;
                transition: background-color 0.3s, color 0.3s;
            }
            .navbar a:hover {
                background-color: #575757;
                color: #fff;
            }
            .form-container {
                max-width: 400px;
                margin: 100px auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            }
            .form-container h2 {
                text-align: center;
                color: #333;
                margin-bottom: 20px;
                font-size: 1.5rem;
            }
            .form-container input[type="text"],
            .form-container input[type="password"] {
                width: 100%;
                padding: 10px;
                margin: 5px 0 20px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;
                transition: border-color 0.3s;
            }
            .form-container input[type="text"]:focus,
            .form-container input[type="password"]:focus {
                border-color: #0078d7;
            }
            .form-container input[type="submit"] {
                background-color: #0078d7;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
                border-radius: 5px;
                transition: background-color 0.3s;
            }
            .form-container input[type="submit"]:hover {
                background-color: #005bb5;
            }
            .hidden {
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="navbar">
            <a href="?form=login">Login</a>
            <a href="?form=register">Register</a>
            <a href="?form=resetPassword">Reset Password</a>
            <a href="?form=deleteAccount">Delete Account</a>
        </div>
        <div class="form-container">
            <h2>
                <?php
                if (isset($_GET['form'])) {
                    switch ($_GET['form']) {
                        case 'register':
                            echo 'Register';
                            break;
                        case 'resetPassword':
                            echo 'Reset Password';
                            break;
                        case 'deleteAccount':
                            echo 'Delete Account';
                            break;
                        default:
                            echo 'Login';
                    }
                } else {
                    echo 'Login';
                }
                ?>
            </h2>
            <form method="post">
                <input type="hidden" name="action" value="<?php echo isset($_GET['form']) ? $_GET['form'] : 'login'; ?>">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required><br>
                <?php
                if (isset($_GET['form']) && $_GET['form'] === 'resetPassword') {
                    echo '<label for="new_password">New Password:</label>';
                    echo '<input type="password" name="new_password" id="new_password" required><br>';
                } else if (!isset($_GET['form']) || $_GET['form'] !== 'deleteAccount') {
                    echo '<label for="password">Password:</label>';
                    echo '<input type="password" name="password" id="password" required><br>';
                }
                ?>
                <input type="submit" value="Submit">
            </form>
        </div>
    </body>
    </html>
    <?php
}
?>
