<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "users_db");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$errors = array();
$success_message = "";
$login_error = "";

// Handle Sign Up
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup_submit'])) {
    
    // Validate First Name
    if (empty(trim($_POST['fname']))) {
        $errors['fname'] = "First Name is required.";
    } elseif (strlen(trim($_POST['fname'])) < 2) {
        $errors['fname'] = "First Name must be at least 2 characters.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", trim($_POST['fname']))) {
        $errors['fname'] = "First Name should only contain letters and spaces.";
    }
    
    // Validate Last Name
    if (empty(trim($_POST['lname']))) {
        $errors['lname'] = "Last Name is required.";
    } elseif (strlen(trim($_POST['lname'])) < 2) {
        $errors['lname'] = "Last Name must be at least 2 characters.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", trim($_POST['lname']))) {
        $errors['lname'] = "Last Name should only contain letters and spaces.";
    }
    
    // Validate Email
    if (empty(trim($_POST['email']))) {
        $errors['email'] = "Email address is required.";
    } elseif (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Please enter a valid email address.";
    }
    
    // Validate Password
    if (empty($_POST['password'])) {
        $errors['password'] = "Password is required.";
    } elseif (strlen($_POST['password']) < 8) {
        $errors['password'] = "Password must be at least 8 characters long.";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]/", $_POST['password'])) {
        $errors['password'] = "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
    }
    
    // Validate Confirm Password
    if (empty($_POST['confirm_password'])) {
        $errors['confirm_password'] = "Please confirm your password.";
    } elseif ($_POST['password'] !== $_POST['confirm_password']) {
        $errors['confirm_password'] = "Passwords do not match.";
    }
    
    // Check if email already exists
    if (empty($errors['email']) && !empty(trim($_POST['email']))) {
        $email_check = mysqli_real_escape_string($con, trim($_POST['email']));
        $search_query = mysqli_query($con, "SELECT id FROM members WHERE email = '$email_check'");
        if (mysqli_num_rows($search_query) > 0) {
            $errors['email'] = "This email address is already registered.";
        }
    }
    
    // If no errors, proceed with registration
    if (empty($errors)) {
        $fname = mysqli_real_escape_string($con, trim($_POST['fname']));
        $lname = mysqli_real_escape_string($con, trim($_POST['lname']));
        $email = mysqli_real_escape_string($con, trim($_POST['email']));
        
        // Generate secure salt and hash password
        $salt = bin2hex(random_bytes(16)); // More secure salt generation
        $password_hash = hash('sha256', $salt . $_POST['password']);
        
        $sql = "INSERT INTO members (fname, lname, email, salt, password, created_at) VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt = mysqli_prepare($con, $sql);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $email, $salt, $password_hash);
            
            if (mysqli_stmt_execute($stmt)) {
                $success_message = "Registration successful! You can now log in with your credentials.";
                // Clear form data
                $_POST = array();
            } else {
                $errors['general'] = "Registration failed. Please try again.";
            }
            mysqli_stmt_close($stmt);
        } else {
            $errors['general'] = "Database error. Please try again.";
        }
    }
}

// Handle Login
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login_submit'])) {
    $login_email = trim($_POST['login_email']);
    $login_password = $_POST['login_password'];
    
    if (empty($login_email)) {
        $login_error = "Email address is required.";
    } elseif (empty($login_password)) {
        $login_error = "Password is required.";
    } else {
        $login_email = mysqli_real_escape_string($con, $login_email);
        $login_query = mysqli_query($con, "SELECT id, fname, lname, email, salt, password FROM members WHERE email = '$login_email'");
        
        if (mysqli_num_rows($login_query) == 1) {
            $user = mysqli_fetch_assoc($login_query);
            $stored_hash = hash('sha256', $user['salt'] . $login_password);
            
            if ($stored_hash === $user['password']) {
                // Login successful
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['fname'] = $user['fname'];
                $_SESSION['lname'] = $user['lname'];
                
                // Redirect to prevent form resubmission
                header("Location: index.php");
                exit();
            } else {
                $login_error = "Invalid email or password.";
            }
        } else {
            $login_error = "Invalid email or password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In | Sign Up - Dimple Star Transport</title>
    <meta name="description" content="Create your account or sign in to book bus tickets with Dimple Star Transport. Safe, secure, and easy registration process.">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom Tailwind Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        },
                        secondary: {
                            50: '#fef7ff',
                            100: '#fdf2ff',
                            200: '#fce7ff',
                            300: '#f8d4fe',
                            400: '#f1b4fb',
                            500: '#e879f9',
                            600: '#d946ef',
                            700: '#be185d',
                            800: '#a21caf',
                            900: '#86198f',
                        }
                    },
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', '-apple-system', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'bounce-gentle': 'bounceGentle 2s infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        bounceGentle: {
                            '0%, 20%, 50%, 80%, 100%': { transform: 'translateY(0)' },
                            '40%': { transform: 'translateY(-10px)' },
                            '60%': { transform: 'translateY(-5px)' },
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Favicon -->
    <link rel="icon" href="images/icon.ico" type="image/x-icon">
    
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .glass-morphism {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .form-transition {
            transition: all 0.3s ease;
        }
        .password-strength-indicator {
            height: 4px;
            border-radius: 2px;
            transition: all 0.3s ease;
        }
        .floating-label {
            transition: all 0.2s ease;
        }
        .input-group:focus-within .floating-label {
            transform: translateY(-1.5rem) scale(0.875);
            color: #2563eb;
        }
        .input-group input:not(:placeholder-shown) + .floating-label {
            transform: translateY(-1.5rem) scale(0.875);
        }
        .tab-button.active {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }
        .shake {
            animation: shake 0.5s ease-in-out;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
    </style>
</head>
<body class="font-sans bg-gray-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="index.php" class="flex items-center space-x-2">
                        <img src="images/logo.png" alt="Dimple Star Transport" class="h-10 w-auto">
                        <span class="text-xl font-bold text-primary-600 hidden sm:block">Dimple Star Transport</span>
                    </a>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="index.php" class="text-gray-600 hover:bg-gray-100 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Home</a>
                        <a href="about.php" class="text-gray-600 hover:bg-gray-100 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">About Us</a>
                        <a href="terminal.php" class="text-gray-600 hover:bg-gray-100 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Terminals</a>
                        <a href="routeschedule.php" class="text-gray-600 hover:bg-gray-100 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Routes & Schedules</a>
                        <a href="contact.php" class="text-gray-600 hover:bg-gray-100 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Contact</a>
                        <a href="book.php" class="bg-primary-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-primary-700 transition-colors duration-200 shadow-md">Book Now</a>
                    </div>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-primary-600 hover:bg-gray-100">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="hero-gradient min-h-screen py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.4"%3E%3Ccircle cx="12" cy="12" r="1"/%3E%3Ccircle cx="36" cy="36" r="1"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <div class="max-w-md mx-auto relative">
            <!-- Logo and Title -->
            <div class="text-center mb-8 animate-fade-in">
                <div class="flex justify-center mb-4">
                    <img src="images/logo.png" alt="Dimple Star Transport" class="h-16 w-auto">
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">Welcome Back!</h1>
                <p class="text-blue-100">Sign in to your account or create a new one</p>
            </div>

            <!-- Success Message -->
            <?php if (!empty($success_message)): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 animate-slide-up">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span><?php echo htmlspecialchars($success_message); ?></span>
                </div>
            </div>
            <?php endif; ?>

            <!-- General Error Message -->
            <?php if (isset($errors['general'])): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 animate-slide-up shake">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <span><?php echo htmlspecialchars($errors['general']); ?></span>
                </div>
            </div>
            <?php endif; ?>

            <!-- Login Error Message -->
            <?php if (!empty($login_error)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 animate-slide-up shake">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <span><?php echo htmlspecialchars($login_error); ?></span>
                </div>
            </div>
            <?php endif; ?>

            <!-- Tab Switcher -->
            <div class="glass-morphism rounded-2xl shadow-2xl overflow-hidden animate-slide-up">
                <div class="flex bg-gray-100 bg-opacity-50">
                    <button type="button" class="tab-button flex-1 py-3 px-6 text-sm font-medium text-gray-600 focus:outline-none transition-all duration-300" data-tab="login">
                        <i class="fas fa-sign-in-alt mr-2"></i>Sign In
                    </button>
                    <button type="button" class="tab-button flex-1 py-3 px-6 text-sm font-medium text-gray-600 focus:outline-none transition-all duration-300" data-tab="signup">
                        <i class="fas fa-user-plus mr-2"></i>Sign Up
                    </button>
                </div>

                <!-- Login Form -->
                <div id="login-tab" class="tab-content p-8">
                    <form method="POST" action="" class="space-y-6" autocomplete="on">
                        <div class="input-group relative">
                            <input type="email" 
                                   id="login_email" 
                                   name="login_email" 
                                   placeholder=" "
                                   autocomplete="email"
                                   value="<?php echo isset($_POST['login_email']) ? htmlspecialchars($_POST['login_email']) : ''; ?>"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 bg-white bg-opacity-90 backdrop-blur-sm peer"
                                   required>
                            <label for="login_email" class="floating-label absolute left-4 top-3 text-gray-500 pointer-events-none peer-placeholder-shown:top-3 peer-placeholder-shown:scale-100 peer-focus:-top-2 peer-focus:left-2 peer-focus:scale-75 peer-focus:bg-white peer-focus:px-2 peer-focus:text-primary-600">
                                <i class="fas fa-envelope mr-1"></i>Email Address
                            </label>
                        </div>

                        <div class="input-group relative">
                            <input type="password" 
                                   id="login_password" 
                                   name="login_password" 
                                   placeholder=" "
                                   autocomplete="current-password"
                                   class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 bg-white bg-opacity-90 backdrop-blur-sm peer"
                                   required>
                            <label for="login_password" class="floating-label absolute left-4 top-3 text-gray-500 pointer-events-none peer-placeholder-shown:top-3 peer-placeholder-shown:scale-100 peer-focus:-top-2 peer-focus:left-2 peer-focus:scale-75 peer-focus:bg-white peer-focus:px-2 peer-focus:text-primary-600">
                                <i class="fas fa-lock mr-1"></i>Password
                            </label>
                            <button type="button" class="toggle-password absolute right-3 top-3 text-gray-500 hover:text-primary-600 focus:outline-none" data-target="login_password">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>

                        <div class="flex items-center justify-between text-sm">
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50">
                                <span class="ml-2 text-gray-600">Remember me</span>
                            </label>
                            <a href="forgot-password.php" class="text-primary-600 hover:text-primary-800 hover:underline">Forgot password?</a>
                        </div>

                        <button type="submit" 
                                name="login_submit" 
                                class="w-full bg-gradient-to-r from-primary-600 to-primary-700 text-white py-3 px-4 rounded-lg font-semibold hover:from-primary-700 hover:to-primary-800 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] shadow-lg">
                            <i class="fas fa-sign-in-alt mr-2"></i>Sign In
                        </button>
                    </form>
                </div>

                <!-- Sign Up Form -->
                <div id="signup-tab" class="tab-content p-8 hidden">
                    <form method="POST" action="" class="space-y-6" autocomplete="on" novalidate>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="input-group relative">
                                <input type="text" 
                                       id="fname" 
                                       name="fname" 
                                       placeholder=" "
                                       autocomplete="given-name"
                                       value="<?php echo isset($_POST['fname']) ? htmlspecialchars($_POST['fname']) : ''; ?>"
                                       class="w-full px-4 py-3 border <?php echo isset($errors['fname']) ? 'border-red-500' : 'border-gray-300'; ?> rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 bg-white bg-opacity-90 backdrop-blur-sm peer"
                                       required>
                                <label for="fname" class="floating-label absolute left-4 top-3 text-gray-500 pointer-events-none peer-placeholder-shown:top-3 peer-placeholder-shown:scale-100 peer-focus:-top-2 peer-focus:left-2 peer-focus:scale-75 peer-focus:bg-white peer-focus:px-2 peer-focus:text-primary-600">
                                    <i class="fas fa-user mr-1"></i>First Name
                                </label>
                                <?php if (isset($errors['fname'])): ?>
                                <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i><?php echo $errors['fname']; ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="input-group relative">
                                <input type="text" 
                                       id="lname" 
                                       name="lname" 
                                       placeholder=" "
                                       autocomplete="family-name"
                                       value="<?php echo isset($_POST['lname']) ? htmlspecialchars($_POST['lname']) : ''; ?>"
                                       class="w-full px-4 py-3 border <?php echo isset($errors['lname']) ? 'border-red-500' : 'border-gray-300'; ?> rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 bg-white bg-opacity-90 backdrop-blur-sm peer"
                                       required>
                                <label for="lname" class="floating-label absolute left-4 top-3 text-gray-500 pointer-events-none peer-placeholder-shown:top-3 peer-placeholder-shown:scale-100 peer-focus:-top-2 peer-focus:left-2 peer-focus:scale-75 peer-focus:bg-white peer-focus:px-2 peer-focus:text-primary-600">
                                    <i class="fas fa-user mr-1"></i>Last Name
                                </label>
                                <?php if (isset($errors['lname'])): ?>
                                <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i><?php echo $errors['lname']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="input-group relative">
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   placeholder=" "
                                   autocomplete="email"
                                   value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                                   class="w-full px-4 py-3 border <?php echo isset($errors['email']) ? 'border-red-500' : 'border-gray-300'; ?> rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 bg-white bg-opacity-90 backdrop-blur-sm peer"
                                   required>
                            <label for="email" class="floating-label absolute left-4 top-3 text-gray-500 pointer-events-none peer-placeholder-shown:top-3 peer-placeholder-shown:scale-100 peer-focus:-top-2 peer-focus:left-2 peer-focus:scale-75 peer-focus:bg-white peer-focus:px-2 peer-focus:text-primary-600">
                                <i class="fas fa-envelope mr-1"></i>Email Address
                            </label>
                            <?php if (isset($errors['email'])): ?>
                            <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i><?php echo $errors['email']; ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="input-group relative">
                            <input type="password" 
                                   id="password" 
                                   name="password" 
                                   placeholder=" "
                                   autocomplete="new-password"
                                   class="w-full px-4 py-3 pr-12 border <?php echo isset($errors['password']) ? 'border-red-500' : 'border-gray-300'; ?> rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 bg-white bg-opacity-90 backdrop-blur-sm peer"
                                   required>
                            <label for="password" class="floating-label absolute left-4 top-3 text-gray-500 pointer-events-none peer-placeholder-shown:top-3 peer-placeholder-shown:scale-100 peer-focus:-top-2 peer-focus:left-2 peer-focus:scale-75 peer-focus:bg-white peer-focus:px-2 peer-focus:text-primary-600">
                                <i class="fas fa-lock mr-1"></i>Password
                            </label>
                            <button type="button" class="toggle-password absolute right-3 top-3 text-gray-500 hover:text-primary-600 focus:outline-none" data-target="password">
                                <i class="fas fa-eye"></i>
                            </button>
                            <div class="password-strength-indicator bg-gray-200 mt-2" id="password-strength">
                                <div class="h-full rounded-lg transition-all duration-300" id="password-strength-bar"></div>
                            </div>
                            <div class="text-xs text-gray-600 mt-1">
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="requirement" data-requirement="length">
                                        <i class="fas fa-times text-red-500 requirement-icon"></i>
                                        <span>8+ characters</span>
                                    </div>
                                    <div class="requirement" data-requirement="uppercase">
                                        <i class="fas fa-times text-red-500 requirement-icon"></i>
                                        <span>Uppercase letter</span>
                                    </div>
                                    <div class="requirement" data-requirement="lowercase">
                                        <i class="fas fa-times text-red-500 requirement-icon"></i>
                                        <span>Lowercase letter</span>
                                    </div>
                                    <div class="requirement" data-requirement="number">
                                        <i class="fas fa-times text-red-500 requirement-icon"></i>
                                        <span>Number</span>
                                    </div>
                                    <div class="requirement" data-requirement="special" style="grid-column: span 2;">
                                        <i class="fas fa-times text-red-500 requirement-icon"></i>
                                        <span>Special character (@$!%*?&)</span>
                                    </div>
                                </div>
                            </div>
                            <?php if (isset($errors['password'])): ?>
                            <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i><?php echo $errors['password']; ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="input-group relative">
                            <input type="password" 
                                   id="confirm_password" 
                                   name="confirm_password" 
                                   placeholder=" "
                                   autocomplete="new-password"
                                   class="w-full px-4 py-3 pr-12 border <?php echo isset($errors['confirm_password']) ? 'border-red-500' : 'border-gray-300'; ?> rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 bg-white bg-opacity-90 backdrop-blur-sm peer"
                                   required>
                            <label for="confirm_password" class="floating-label absolute left-4 top-3 text-gray-500 pointer-events-none peer-placeholder-shown:top-3 peer-placeholder-shown:scale-100 peer-focus:-top-2 peer-focus:left-2 peer-focus:scale-75 peer-focus:bg-white peer-focus:px-2 peer-focus:text-primary-600">
                                <i class="fas fa-lock mr-1"></i>Confirm Password
                            </label>
                            <button type="button" class="toggle-password absolute right-3 top-3 text-gray-500 hover:text-primary-600 focus:outline-none" data-target="confirm_password">
                                <i class="fas fa-eye"></i>
                            </button>
                            <div class="password-match-indicator mt-1 text-xs hidden">
                                <div class="match-success text-green-600 hidden">
                                    <i class="fas fa-check mr-1"></i>Passwords match
                                </div>
                                <div class="match-error text-red-500 hidden">
                                    <i class="fas fa-times mr-1"></i>Passwords don't match
                                </div>
                            </div>
                            <?php if (isset($errors['confirm_password'])): ?>
                            <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i><?php echo $errors['confirm_password']; ?></p>
                            <?php endif; ?>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="flex items-start">
                            <input type="checkbox" 
                                   id="terms" 
                                   name="terms" 
                                   required
                                   class="mt-1 rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50">
                            <label for="terms" class="ml-2 text-sm text-gray-600">
                                I agree to the <a href="terms.php" class="text-primary-600 hover:text-primary-800 hover:underline" target="_blank">Terms and Conditions</a> and <a href="privacy.php" class="text-primary-600 hover:text-primary-800 hover:underline" target="_blank">Privacy Policy</a>
                            </label>
                        </div>

                        <button type="submit" 
                                name="signup_submit" 
                                class="w-full bg-gradient-to-r from-green-600 to-emerald-700 text-white py-3 px-4 rounded-lg font-semibold hover:from-green-700 hover:to-emerald-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
                                id="signup-btn">
                            <i class="fas fa-user-plus mr-2"></i>Create Account
                        </button>
                    </form>
                </div>
            </div>

            <!-- Additional Links -->
            <div class="text-center mt-8">
                <p class="text-blue-100 text-sm">
                    Need help? <a href="contact.php" class="text-white hover:text-yellow-300 hover:underline font-medium">Contact Support</a>
                </p>
                <div class="mt-4">
                    <a href="index.php" class="inline-flex items-center text-white hover:text-yellow-300 transition-colors duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Home
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center mb-4 md:mb-0">
                    <img src="images/footer-logo.jpg" alt="Dimple Star Transport" class="h-8 w-auto mr-3">
                    <span class="text-sm">&copy; <?php echo date('Y'); ?> Dimple Star Transport. All rights reserved.</span>
                </div>
                <div class="flex space-x-6 text-sm">
                    <a href="privacy.php" class="text-gray-400 hover:text-white transition-colors duration-200">Privacy Policy</a>
                    <a href="terms.php" class="text-gray-400 hover:text-white transition-colors duration-200">Terms of Service</a>
                    <a href="contact.php" class="text-gray-400 hover:text-white transition-colors duration-200">Support</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tab switching functionality
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');
            
            // Set initial active tab
            const urlParams = new URLSearchParams(window.location.search);
            const initialTab = urlParams.get('tab') || 'login';
            
            function switchTab(targetTab) {
                tabButtons.forEach(btn => {
                    btn.classList.remove('active');
                    if (btn.dataset.tab === targetTab) {
                        btn.classList.add('active');
                    }
                });
                
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                    if (content.id === targetTab + '-tab') {
                        content.classList.remove('hidden');
                    }
                });
            }
            
            // Initialize tab
            switchTab(initialTab);
            
            // Tab button click handlers
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetTab = this.dataset.tab;
                    switchTab(targetTab);
                    
                    // Update URL without page reload
                    const newUrl = new URL(window.location);
                    newUrl.searchParams.set('tab', targetTab);
                    window.history.pushState({}, '', newUrl);
                });
            });
            
            // Password visibility toggle
            document.querySelectorAll('.toggle-password').forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.dataset.target;
                    const passwordInput = document.getElementById(targetId);
                    const icon = this.querySelector('i');
                    
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    } else {
                        passwordInput.type = 'password';
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                });
            });
            
            // Password strength indicator
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('confirm_password');
            const strengthIndicator = document.getElementById('password-strength-bar');
            const requirements = document.querySelectorAll('.requirement');
            const signupBtn = document.getElementById('signup-btn');
            
            if (passwordInput) {
                passwordInput.addEventListener('input', function() {
                    const password = this.value;
                    const strength = checkPasswordStrength(password);
                    updatePasswordUI(strength);
                    checkFormValidity();
                });
            }
            
            if (confirmPasswordInput) {
                confirmPasswordInput.addEventListener('input', function() {
                    checkPasswordMatch();
                    checkFormValidity();
                });
            }
            
            function checkPasswordStrength(password) {
                const requirements = {
                    length: password.length >= 8,
                    uppercase: /[A-Z]/.test(password),
                    lowercase: /[a-z]/.test(password),
                    number: /\d/.test(password),
                    special: /[@$!%*?&]/.test(password)
                };
                
                const score = Object.values(requirements).filter(Boolean).length;
                
                return { requirements, score };
            }
            
            function updatePasswordUI(strength) {
                const { requirements: reqs, score } = strength;
                
                // Update strength bar
                if (strengthIndicator) {
                    const colors = ['bg-red-500', 'bg-orange-500', 'bg-yellow-500', 'bg-blue-500', 'bg-green-500'];
                    const widths = ['20%', '40%', '60%', '80%', '100%'];
                    
                    strengthIndicator.className = `h-full rounded-lg transition-all duration-300 ${colors[score - 1] || 'bg-gray-300'}`;
                    strengthIndicator.style.width = widths[score - 1] || '0%';
                }
                
                // Update requirement indicators
                requirements.forEach(req => {
                    const reqElement = req.querySelector('.requirement-icon');
                    const requirementType = req.dataset.requirement;
                    
                    if (reqs[requirementType]) {
                        reqElement.className = 'fas fa-check text-green-500 requirement-icon';
                    } else {
                        reqElement.className = 'fas fa-times text-red-500 requirement-icon';
                    }
                });
            }
            
            function checkPasswordMatch() {
                if (!passwordInput || !confirmPasswordInput) return;
                
                const password = passwordInput.value;
                const confirmPassword = confirmPasswordInput.value;
                const matchIndicator = document.querySelector('.password-match-indicator');
                const matchSuccess = document.querySelector('.match-success');
                const matchError = document.querySelector('.match-error');
                
                if (confirmPassword.length > 0) {
                    matchIndicator.classList.remove('hidden');
                    
                    if (password === confirmPassword) {
                        matchSuccess.classList.remove('hidden');
                        matchError.classList.add('hidden');
                    } else {
                        matchSuccess.classList.add('hidden');
                        matchError.classList.remove('hidden');
                    }
                } else {
                    matchIndicator.classList.add('hidden');
                }
            }
            
            function checkFormValidity() {
                if (!passwordInput || !confirmPasswordInput || !signupBtn) return;
                
                const password = passwordInput.value;
                const confirmPassword = confirmPasswordInput.value;
                const strength = checkPasswordStrength(password);
                const allRequirementsMet = Object.values(strength.requirements).every(Boolean);
                const passwordsMatch = password === confirmPassword;
                const termsChecked = document.getElementById('terms')?.checked;
                
                const isValid = allRequirementsMet && passwordsMatch && password.length > 0 && confirmPassword.length > 0 && termsChecked;
                
                signupBtn.disabled = !isValid;
            }
            
            // Terms checkbox handler
            const termsCheckbox = document.getElementById('terms');
            if (termsCheckbox) {
                termsCheckbox.addEventListener('change', checkFormValidity);
            }
            
            // Mobile menu functionality
            const mobileMenuButton = document.querySelector('.mobile-menu-button');
            const mobileMenu = document.querySelector('.mobile-menu');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }
            
            // Form submission with loading states
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    const submitButton = this.querySelector('button[type="submit"]');
                    if (submitButton) {
                        const originalText = submitButton.innerHTML;
                        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Processing...';
                        submitButton.disabled = true;
                        
                        // Re-enable after 5 seconds in case of error
                        setTimeout(() => {
                            submitButton.innerHTML = originalText;
                            submitButton.disabled = false;
                        }, 5000);
                    }
                });
            });
            
            // Auto-dismiss success messages
            const successMessage = document.querySelector('.bg-green-100');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.opacity = '0';
                    setTimeout(() => {
                        successMessage.remove();
                    }, 300);
                }, 5000);
            }
            
            // Email validation on blur
            const emailInputs = document.querySelectorAll('input[type="email"]');
            emailInputs.forEach(input => {
                input.addEventListener('blur', function() {
                    const email = this.value.trim();
                    if (email && !isValidEmail(email)) {
                        this.classList.add('border-red-500');
                        this.classList.remove('border-gray-300');
                    } else {
                        this.classList.remove('border-red-500');
                        this.classList.add('border-gray-300');
                    }
                });
            });
            
            function isValidEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }
            
            // Real-time name validation
            const nameInputs = document.querySelectorAll('#fname, #lname');
            nameInputs.forEach(input => {
                input.addEventListener('input', function() {
                    const value = this.value;
                    const isValid = /^[a-zA-Z\s]*$/.test(value) && value.length >= 2;
                    
                    if (value.length > 0 && !isValid) {
                        this.classList.add('border-red-500');
                        this.classList.remove('border-gray-300');
                    } else {
                        this.classList.remove('border-red-500');
                        this.classList.add('border-gray-300');
                    }
                });
            });
            
            // Switch to signup tab if there are signup errors
            <?php if (!empty($errors) && !isset($_POST['login_submit'])): ?>
            switchTab('signup');
            <?php endif; ?>
            
            // Switch to login tab if there's a login error
            <?php if (!empty($login_error)): ?>
            switchTab('login');
            <?php endif; ?>
            
            // Auto-focus first input in active tab
            function focusFirstInput() {
                const activeTab = document.querySelector('.tab-content:not(.hidden)');
                if (activeTab) {
                    const firstInput = activeTab.querySelector('input');
                    if (firstInput) {
                        setTimeout(() => firstInput.focus(), 100);
                    }
                }
            }
            
            // Focus first input on tab switch
            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    setTimeout(focusFirstInput, 100);
                });
            });
            
            // Initial focus
            focusFirstInput();
        });
        
        // Prevent back button after successful login
        if (window.location.hash === '#logged-in') {
            window.location.hash = '';
            window.location.href = 'index.php';
        }
    </script>
</body>
</html>