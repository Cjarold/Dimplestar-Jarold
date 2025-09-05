<!DOCTYPE html>
<?php
    include 'php_includes/connection.php';
    include 'php_includes/book.php';
    
    // Generate CSRF token
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Your Journey - Dimple Star Transport</title>
    <meta name="description" content="Book your bus tickets with Dimple Star Transport. Safe, reliable, and comfortable transportation services across the Philippines.">
    
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
                        'fade-in-up': 'fadeInUp 0.6s ease-out',
                        'slide-in-right': 'slideInRight 0.8s ease-out',
                        'bounce-gentle': 'bounceGentle 2s infinite',
                        'pulse-glow': 'pulseGlow 2s infinite',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        slideInRight: {
                            '0%': { opacity: '0', transform: 'translateX(30px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' },
                        },
                        bounceGentle: {
                            '0%, 20%, 50%, 80%, 100%': { transform: 'translateY(0)' },
                            '40%': { transform: 'translateY(-10px)' },
                            '60%': { transform: 'translateY(-5px)' },
                        },
                        pulseGlow: {
                            '0%, 100%': { boxShadow: '0 0 20px rgba(59, 130, 246, 0.3)' },
                            '50%': { boxShadow: '0 0 30px rgba(59, 130, 246, 0.6)' },
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
    
    <!-- Custom CSS for additional effects -->
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .glass-morphism {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        .form-gradient {
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
        }
        .input-focus {
            transition: all 0.3s ease;
        }
        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .booking-card {
            background: linear-gradient(145deg, #ffffff 0%, #f1f5f9 100%);
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.1);
        }
        .step-indicator {
            position: relative;
        }
        .step-indicator::after {
            content: '';
            position: absolute;
            top: 50%;
            right: -50%;
            width: 100%;
            height: 2px;
            background: #e5e7eb;
            z-index: 1;
        }
        .step-indicator.active::after {
            background: linear-gradient(90deg, #3b82f6, #10b981);
        }
        .step-indicator:last-child::after {
            display: none;
        }
        .floating-label {
            position: relative;
        }
        .floating-label input:focus + label,
        .floating-label input:not(:placeholder-shown) + label,
        .floating-label select:focus + label,
        .floating-label select:not([value=""]) + label {
            transform: translateY(-1.5rem) scale(0.85);
            color: #3b82f6;
        }
        .floating-label label {
            position: absolute;
            left: 0.75rem;
            top: 0.75rem;
            transition: all 0.3s ease;
            pointer-events: none;
            color: #6b7280;
        }
        .error-message {
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            border: 1px solid #fca5a5;
            color: #dc2626;
        }
        .success-message {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            border: 1px solid #86efac;
            color: #16a34a;
        }
    </style>
</head>
<body class="font-sans bg-gradient-to-br from-blue-50 via-white to-purple-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50 transition-all duration-300">
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
                        <a href="book.php" class="bg-primary-100 text-primary-700 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Book Now</a>
                    </div>
                </div>
                
                <!-- User Menu -->
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <?php
                        if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
                            $email = $_SESSION['email'];
                            echo '<div class="relative group">';
                            echo '<button class="flex items-center space-x-2 text-sm font-medium text-gray-700 hover:text-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 rounded-md px-3 py-2">';
                            echo '<i class="fas fa-user-circle text-lg"></i>';
                            echo '<span>Welcome, ' . htmlspecialchars($email) . '</span>';
                            echo '<i class="fas fa-chevron-down text-xs"></i>';
                            echo '</button>';
                            echo '<div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">';
                            echo '<a href="profile.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><i class="fas fa-user mr-2"></i>Profile</a>';
                            echo '<a href="mybookings.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><i class="fas fa-ticket-alt mr-2"></i>My Bookings</a>';
                            echo '<hr class="my-1">';
                            echo '<a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-red-600"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>';
                            echo '</div>';
                            echo '</div>';
                        } else {
                            echo '<a href="signlog.php" class="bg-gradient-to-r from-primary-600 to-primary-700 text-white px-4 py-2 rounded-md text-sm font-medium hover:from-primary-700 hover:to-primary-800 transition-all duration-200 shadow-md transform hover:scale-105">';
                            echo '<i class="fas fa-sign-in-alt mr-2"></i>Sign In / Sign Up';
                            echo '</a>';
                        }
                        ?>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-primary-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="mobile-menu hidden md:hidden bg-white border-t border-gray-200">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="index.php" class="text-gray-600 hover:bg-gray-100 hover:text-primary-600 block px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="about.php" class="text-gray-600 hover:bg-gray-100 hover:text-primary-600 block px-3 py-2 rounded-md text-base font-medium">About Us</a>
                <a href="terminal.php" class="text-gray-600 hover:bg-gray-100 hover:text-primary-600 block px-3 py-2 rounded-md text-base font-medium">Terminals</a>
                <a href="routeschedule.php" class="text-gray-600 hover:bg-gray-100 hover:text-primary-600 block px-3 py-2 rounded-md text-base font-medium">Routes & Schedules</a>
                <a href="contact.php" class="text-gray-600 hover:bg-gray-100 hover:text-primary-600 block px-3 py-2 rounded-md text-base font-medium">Contact</a>
                <a href="book.php" class="bg-primary-100 text-primary-700 block px-3 py-2 rounded-md text-base font-medium">Book Now</a>
                
                <?php if(isset($_SESSION['email']) && !empty($_SESSION['email'])): ?>
                <div class="border-t border-gray-200 pt-4 pb-3">
                    <div class="flex items-center px-3">
                        <div class="flex-shrink-0">
                            <i class="fas fa-user-circle text-2xl text-gray-400"></i>
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium text-gray-800"><?php echo htmlspecialchars($_SESSION['email']); ?></div>
                        </div>
                    </div>
                    <div class="mt-3 space-y-1 px-2">
                        <a href="profile.php" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-primary-600 hover:bg-gray-100">Profile</a>
                        <a href="mybookings.php" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-primary-600 hover:bg-gray-100">My Bookings</a>
                        <a href="logout.php" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-red-600 hover:bg-gray-100">Logout</a>
                    </div>
                </div>
                <?php else: ?>
                <div class="border-t border-gray-200 pt-4 pb-3">
                    <a href="signlog.php" class="block px-3 py-2 rounded-md text-base font-medium bg-primary-600 text-white">Sign In / Sign Up</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Success/Error Messages -->
    <?php if(isset($_SESSION['message'])): ?>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="<?php echo $_SESSION['message_type'] === 'success' ? 'success-message' : 'error-message'; ?> p-4 rounded-lg mb-4">
                <div class="flex items-center">
                    <i class="fas <?php echo $_SESSION['message_type'] === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle'; ?> mr-3"></i>
                    <span><?php echo htmlspecialchars($_SESSION['message']); ?></span>
                </div>
            </div>
        </div>
        <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
    <?php endif; ?>

    <!-- Hero Section -->
    <section class="hero-gradient py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-white">
                <h1 class="text-4xl sm:text-5xl font-bold mb-4 animate-fade-in-up">
                    Book Your 
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-300">
                        Perfect Journey
                    </span>
                </h1>
                <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto animate-fade-in-up">
                    Choose your destination, select your preferred time, and travel in comfort with Dimple Star Transport
                </p>
                
                <!-- Current Date & Time -->
                <div class="glass-morphism rounded-xl p-4 inline-block animate-slide-in-right">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-calendar-alt text-yellow-300"></i>
                        <span class="font-medium"><?php include_once("php_includes/date_time.php"); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Progress Steps -->
    <section class="py-8 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-center space-x-8">
                <div class="step-indicator active flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-primary-600 to-primary-700 rounded-full flex items-center justify-center text-white font-semibold z-10 relative">
                        <i class="fas fa-route text-sm"></i>
                    </div>
                    <span class="ml-3 text-sm font-medium text-primary-600">Select Route</span>
                </div>
                <div class="step-indicator flex items-center">
                    <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-semibold z-10 relative">
                        <i class="fas fa-calendar text-sm"></i>
                    </div>
                    <span class="ml-3 text-sm font-medium text-gray-500">Choose Date</span>
                </div>
                <div class="step-indicator flex items-center">
                    <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-semibold z-10 relative">
                        <i class="fas fa-check text-sm"></i>
                    </div>
                    <span class="ml-3 text-sm font-medium text-gray-500">Confirm</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Booking Section -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Booking Form -->
                <div class="lg:col-span-2">
                    <div class="booking-card rounded-2xl p-8 animate-fade-in-up">
                        <div class="flex items-center mb-8">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-ticket-alt text-white text-lg"></i>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">Book Your Ticket</h2>
                                <p class="text-gray-600">Fill in your travel details</p>
                            </div>
                        </div>

                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="space-y-6" id="bookingForm">
                            <!-- CSRF Token -->
                            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                            
                            <!-- Trip Type -->
                            <div class="space-y-4">
                                <label class="text-lg font-semibold text-gray-900">Trip Type</label>
                                <div class="flex space-x-4">
                                    <label class="flex items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-primary-300 transition-colors duration-200 flex-1">
                                        <input type="radio" name="way" value="1" checked class="w-5 h-5 text-primary-600 focus:ring-primary-500" onchange="toggleReturnDate()">
                                        <div class="ml-3">
                                            <div class="flex items-center">
                                                <i class="fas fa-long-arrow-alt-right text-primary-600 mr-2"></i>
                                                <span class="font-medium text-gray-900">One Way</span>
                                            </div>
                                            <p class="text-sm text-gray-500">Single journey</p>
                                        </div>
                                    </label>
                                    <label class="flex items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-primary-300 transition-colors duration-200 flex-1">
                                        <input type="radio" name="way" value="2" class="w-5 h-5 text-primary-600 focus:ring-primary-500" onchange="toggleReturnDate()">
                                        <div class="ml-3">
                                            <div class="flex items-center">
                                                <i class="fas fa-exchange-alt text-primary-600 mr-2"></i>
                                                <span class="font-medium text-gray-900">Round Trip</span>
                                            </div>
                                            <p class="text-sm text-gray-500">Return journey</p>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Origin and Destination -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="floating-label">
                                    <select name="Origin" required class="input-focus w-full px-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-white text-gray-900 font-medium appearance-none">
                                        <option value="">Select Origin</option>
                                        <option value="San Lazaro">San Lazaro</option>
                                        <option value="Espana">España</option>
                                        <option value="Alabang">Alabang</option>
                                        <option value="Cabuyao">Cabuyao</option>
                                        <option value="Naujan">Naujan</option>
                                        <option value="Victoria">Victoria</option>
                                        <option value="Pinamalayan">Pinamalayan</option>
                                        <option value="Gloria">Gloria</option>
                                        <option value="Bongabong">Bongabong</option>
                                        <option value="Roxas">Roxas</option>
                                        <option value="Mansalay">Mansalay</option>
                                        <option value="Bulalacao">Bulalacao</option>
                                        <option value="Magsaysay">Magsaysay</option>
                                        <option value="San Jose">San Jose</option>
                                        <option value="Pola">Pola</option>
                                        <option value="Socorro">Socorro</option>
                                    </select>
                                    <label class="bg-white px-2">
                                        <i class="fas fa-map-marker-alt text-green-500 mr-2"></i>From
                                    </label>
                                </div>

                                <div class="floating-label">
                                    <select name="Destination" required class="input-focus w-full px-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-white text-gray-900 font-medium appearance-none">
                                        <option value="">Select Destination</option>
                                        <option value="San Lazaro">San Lazaro</option>
                                        <option value="Espana">España</option>
                                        <option value="Alabang">Alabang</option>
                                        <option value="Cabuyao">Cabuyao</option>
                                        <option value="Naujan">Naujan</option>
                                        <option value="Victoria">Victoria</option>
                                        <option value="Pinamalayan">Pinamalayan</option>
                                        <option value="Gloria">Gloria</option>
                                        <option value="Bongabong">Bongabong</option>
                                        <option value="Roxas">Roxas</option>
                                        <option value="Mansalay">Mansalay</option>
                                        <option value="Bulalacao">Bulalacao</option>
                                        <option value="Magsaysay">Magsaysay</option>
                                        <option value="San Jose">San Jose</option>
                                        <option value="Pola">Pola</option>
                                        <option value="Socorro">Socorro</option>
                                    </select>
                                    <label class="bg-white px-2">
                                        <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>To
                                    </label>
                                </div>
                            </div>

                            <!-- Passengers and Bus Type -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="floating-label">
                                    <input type="number" name="no_of_pass" min="1" max="10" required placeholder=" " class="input-focus w-full px-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                                    <label class="bg-white px-2">
                                        <i class="fas fa-users text-blue-500 mr-2"></i>Number of Passengers
                                    </label>
                                </div>

                                <div class="floating-label">
                                    <select name="bustype" required class="input-focus w-full px-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-white text-gray-900 font-medium appearance-none">
                                        <option value="">Select Bus Type</option>
                                        <option value="Air Conditioned">Air Conditioned</option>
                                        <option value="Ordinary">Ordinary</option>
                                    </select>
                                    <label class="bg-white px-2">
                                        <i class="fas fa-bus text-purple-500 mr-2"></i>Bus Type
                                    </label>
                                </div>
                            </div>

                            <!-- Departure and Return Dates -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="floating-label">
                                    <input type="date" id="datepick1" name="Departure" required placeholder=" " class="input-focus w-full px-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                                    <label class="bg-white px-2">
                                        <i class="fas fa-calendar-alt text-orange-500 mr-2"></i>Departure Date
                                    </label>
                                </div>

                                <div class="floating-label">
                                    <input type="date" id="datepick2" name="Return" disabled placeholder=" " class="input-focus w-full px-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 disabled:bg-gray-100 disabled:cursor-not-allowed">
                                    <label class="bg-white px-2">
                                        <i class="fas fa-calendar-alt text-teal-500 mr-2"></i>Return Date
                                    </label>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-6">
                                <button type="submit" name="submit" class="w-full bg-gradient-to-r from-primary-600 to-primary-700 text-white px-8 py-4 rounded-xl font-semibold hover:from-primary-700 hover:to-primary-800 transform hover:scale-[1.02] transition-all duration-300 shadow-lg hover:shadow-xl animate-pulse-glow">
                                    <i class="fas fa-search mr-3"></i>
                                    Search Available Buses
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Popular Routes -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg animate-slide-in-right">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">
                            <i class="fas fa-fire text-orange-500 mr-2"></i>
                            Popular Routes
                        </h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center p-3 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg hover:from-blue-100 hover:to-indigo-100 transition-colors duration-200 cursor-pointer" data-route="Alabang,Gloria">
                                <div>
                                    <p class="font-medium text-gray-900">Alabang → Gloria</p>
                                    <p class="text-sm text-gray-600">₱150 - ₱220</p>
                                </div>
                                <i class="fas fa-arrow-right text-primary-600"></i>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg hover:from-green-100 hover:to-emerald-100 transition-colors duration-200 cursor-pointer" data-route="Cabuyao,Naujan">
                                <div>
                                    <p class="font-medium text-gray-900">Cabuyao → Naujan</p>
                                    <p class="text-sm text-gray-600">₱200 - ₱280</p>
                                </div>
                                <i class="fas fa-arrow-right text-primary-600"></i>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-gradient-to-r from-purple-50 to-pink-50 rounded-lg hover:from-purple-100 hover:to-pink-100 transition-colors duration-200 cursor-pointer" data-route="Manila,Batangas">
                                <div>
                                    <p class="font-medium text-gray-900">Manila → Batangas</p>
                                    <p class="text-sm text-gray-600">₱120 - ₱180</p>
                                </div>
                                <i class="fas fa-arrow-right text-primary-600"></i>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-lg hover:from-yellow-100 hover:to-orange-100 transition-colors duration-200 cursor-pointer" data-route="Espana,Socorro">
                                <div>
                                    <p class="font-medium text-gray-900">España → Socorro</p>
                                    <p class="text-sm text-gray-600">₱280 - ₱350</p>
                                </div>
                                <i class="fas fa-arrow-right text-primary-600"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Bus Features -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">
                            <i class="fas fa-star text-yellow-500 mr-2"></i>
                            Bus Features
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-snowflake text-blue-600 text-sm"></i>
                                </div>
                                <span class="text-sm text-gray-700">Air Conditioning</span>
                            </div>
                            <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-wifi text-green-600 text-sm"></i>
                                </div>
                                <span class="text-sm text-gray-700">Free WiFi</span>
                            </div>
                            <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-couch text-purple-600 text-sm"></i>
                                </div>
                                <span class="text-sm text-gray-700">Comfortable Seats</span>
                            </div>
                            <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-shield-alt text-red-600 text-sm"></i>
                                </div>
                                <span class="text-sm text-gray-700">Safety First</span>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Support -->
                    <div class="bg-gradient-to-br from-primary-600 to-primary-700 rounded-2xl p-6 text-white">
                        <h3 class="text-lg font-bold mb-4">
                            <i class="fas fa-headset mr-2"></i>
                            Need Help?
                        </h3>
                        <p class="text-primary-100 mb-4">Our customer support team is here to assist you 24/7</p>
                        <div class="space-y-3">
                            <a href="tel:09292090712" class="flex items-center p-3 bg-white bg-opacity-20 rounded-lg hover:bg-opacity-30 transition-colors duration-200">
                                <i class="fas fa-phone mr-3"></i>
                                <span class="font-medium">0929 209 0712</span>
                            </a>
                            <a href="contact.php" class="flex items-center p-3 bg-white bg-opacity-20 rounded-lg hover:bg-opacity-30 transition-colors duration-200">
                                <i class="fas fa-envelope mr-3"></i>
                                <span class="font-medium">Contact Form</span>
                            </a>
                        </div>
                    </div>

                    <!-- Booking Tips -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">
                            <i class="fas fa-lightbulb text-yellow-500 mr-2"></i>
                            Booking Tips
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <div class="w-2 h-2 bg-primary-500 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                                <p class="text-sm text-gray-700">Book early to secure your preferred seats and get better prices</p>
                            </div>
                            <div class="flex items-start">
                                <div class="w-2 h-2 bg-primary-500 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                                <p class="text-sm text-gray-700">Arrive at the terminal 30 minutes before departure</p>
                            </div>
                            <div class="flex items-start">
                                <div class="w-2 h-2 bg-primary-500 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                                <p class="text-sm text-gray-700">Bring valid ID for verification purposes</p>
                            </div>
                            <div class="flex items-start">
                                <div class="w-2 h-2 bg-primary-500 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                                <p class="text-sm text-gray-700">Keep your booking confirmation safe</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Indicators -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Why Thousands Trust Us</h2>
                <p class="text-xl text-gray-600">Your safety and comfort are our top priorities</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl hover:shadow-lg transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">50,000+</h3>
                    <p class="text-gray-600">Happy Passengers</p>
                </div>
                
                <div class="text-center p-6 bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl hover:shadow-lg transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-route text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">25+</h3>
                    <p class="text-gray-600">Routes Available</p>
                </div>
                
                <div class="text-center p-6 bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl hover:shadow-lg transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clock text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">99.5%</h3>
                    <p class="text-gray-600">On-Time Performance</p>
                </div>
                
                <div class="text-center p-6 bg-gradient-to-br from-yellow-50 to-orange-50 rounded-2xl hover:shadow-lg transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-star text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">4.8/5</h3>
                    <p class="text-gray-600">Customer Rating</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Travel Guidelines -->
    <section class="py-16 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Travel Guidelines</h2>
                <p class="text-xl text-gray-600">Please follow these guidelines for a safe and comfortable journey</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-ban text-red-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Prohibited Items</h3>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li>• Flammable liquids and substances</li>
                        <li>• Sharp objects and weapons</li>
                        <li>• Illegal drugs and substances</li>
                        <li>• Live animals (except service animals)</li>
                        <li>• Excessive luggage beyond limits</li>
                    </ul>
                </div>
                
                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-check-circle text-green-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">What to Bring</h3>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li>• Valid government-issued ID</li>
                        <li>• Booking confirmation (printed or digital)</li>
                        <li>• Personal medications</li>
                        <li>• Small carry-on bag</li>
                        <li>• Face mask (health protocols)</li>
                    </ul>
                </div>
                
                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-info-circle text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Important Notes</h3>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li>• Arrive 30 minutes before departure</li>
                        <li>• No smoking inside the bus</li>
                        <li>• Keep noise level to minimum</li>
                        <li>• Follow driver and staff instructions</li>
                        <li>• Report any suspicious activities</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
                <p class="text-xl text-gray-600">Find answers to common questions about our booking system</p>
            </div>
            
            <div class="space-y-6">
                <div class="bg-gray-50 rounded-2xl p-6">
                    <button class="w-full text-left flex justify-between items-center focus:outline-none" onclick="toggleFAQ(1)">
                        <h3 class="text-lg font-semibold text-gray-900">How do I cancel or modify my booking?</h3>
                        <i class="fas fa-chevron-down text-gray-500 transform transition-transform duration-200" id="faq-icon-1"></i>
                    </button>
                    <div class="hidden mt-4 text-gray-600" id="faq-content-1">
                        <p>You can cancel or modify your booking by calling our customer service at 0929 209 0712 or visiting our terminal. Cancellations made 24 hours before departure are eligible for a full refund, while cancellations made within 24 hours may incur a service fee.</p>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-2xl p-6">
                    <button class="w-full text-left flex justify-between items-center focus:outline-none" onclick="toggleFAQ(2)">
                        <h3 class="text-lg font-semibold text-gray-900">What payment methods do you accept?</h3>
                        <i class="fas fa-chevron-down text-gray-500 transform transition-transform duration-200" id="faq-icon-2"></i>
                    </button>
                    <div class="hidden mt-4 text-gray-600" id="faq-content-2">
                        <p>We accept various payment methods including cash, credit/debit cards, GCash, PayMaya, and bank transfers. Online bookings can be paid through our secure payment gateway, while terminal bookings accept cash and card payments.</p>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-2xl p-6">
                    <button class="w-full text-left flex justify-between items-center focus:outline-none" onclick="toggleFAQ(3)">
                        <h3 class="text-lg font-semibold text-gray-900">How early should I arrive at the terminal?</h3>
                        <i class="fas fa-chevron-down text-gray-500 transform transition-transform duration-200" id="faq-icon-3"></i>
                    </button>
                    <div class="hidden mt-4 text-gray-600" id="faq-content-3">
                        <p>We recommend arriving at least 30 minutes before your scheduled departure time. This allows sufficient time for check-in, luggage handling, and boarding procedures. During peak travel seasons, consider arriving 45 minutes early.</p>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-2xl p-6">
                    <button class="w-full text-left flex justify-between items-center focus:outline-none" onclick="toggleFAQ(4)">
                        <h3 class="text-lg font-semibold text-gray-900">What's your luggage policy?</h3>
                        <i class="fas fa-chevron-down text-gray-500 transform transition-transform duration-200" id="faq-icon-4"></i>
                    </button>
                    <div class="hidden mt-4 text-gray-600" id="faq-content-4">
                        <p>Each passenger is allowed one carry-on bag (up to 7kg) and one checked luggage (up to 20kg) free of charge. Additional or overweight luggage may incur extra fees. Fragile and valuable items should be kept as carry-on luggage.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="lg:col-span-2">
                    <div class="flex items-center mb-4">
                        <img src="images/footer-logo.jpg" alt="Dimple Star Transport" class="h-12 w-auto mr-3">
                        <span class="text-xl font-bold">Dimple Star Transport</span>
                    </div>
                    <p class="text-gray-400 mb-6 max-w-md">
                        Your trusted partner for safe, comfortable, and reliable bus transportation across the Philippines. 
                        We've been serving passengers with excellence for years.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-600 transition-colors duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-600 transition-colors duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-600 transition-colors duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-600 transition-colors duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="about.php" class="text-gray-400 hover:text-white transition-colors duration-200">About Us</a></li>
                        <li><a href="terminal.php" class="text-gray-400 hover:text-white transition-colors duration-200">Terminals</a></li>
                        <li><a href="routeschedule.php" class="text-gray-400 hover:text-white transition-colors duration-200">Routes & Schedules</a></li>
                        <li><a href="book.php" class="text-gray-400 hover:text-white transition-colors duration-200">Book Now</a></li>
                        <li><a href="contact.php" class="text-gray-400 hover:text-white transition-colors duration-200">Contact Us</a></li>
                    </ul>
                </div>
                
                <!-- Services -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Services</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Regular Transit</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Express Service</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Charter Service</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Package Delivery</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Travel Insurance</a></li>
                    </ul>
                </div>
            </div>
            
            <!-- Bottom Footer -->
            <div class="border-t border-gray-800 mt-12 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm">
                        &copy; <?php echo date('Y'); ?> Dimple Star Transport. All rights reserved.
                    </p>
                    <div class="flex space-x-6 mt-4 md:mt-0">
                        <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-200">Privacy Policy</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-200">Terms of Service</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-200">FAQ</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-6 right-6 bg-gradient-to-r from-primary-600 to-primary-700 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg opacity-0 invisible transition-all duration-300 hover:shadow-xl hover:scale-110 z-40">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-2xl p-8 text-center">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary-600 mx-auto mb-4"></div>
            <p class="text-gray-700 font-medium">Searching for available buses...</p>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            const mobileMenuButton = document.querySelector('.mobile-menu-button');
            const mobileMenu = document.querySelector('.mobile-menu');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }

            // Set minimum date to today
            const today = new Date().toISOString().split('T')[0];
            const departureInput = document.getElementById('datepick1');
            const returnInput = document.getElementById('datepick2');
            
            if (departureInput) {
                departureInput.setAttribute('min', today);
                departureInput.addEventListener('change', function() {
                    if (returnInput) {
                        returnInput.setAttribute('min', this.value);
                        if (returnInput.value && returnInput.value < this.value) {
                            returnInput.value = '';
                        }
                    }
                });
            }

            // Back to top button
            const backToTopButton = document.getElementById('backToTop');
            
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTopButton.classList.remove('opacity-0', 'invisible');
                    backToTopButton.classList.add('opacity-100', 'visible');
                } else {
                    backToTopButton.classList.add('opacity-0', 'invisible');
                    backToTopButton.classList.remove('opacity-100', 'visible');
                }
            });
            
            backToTopButton.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // Enhanced form validation
            const form = document.getElementById('bookingForm');
            if (form) {
                form.addEventListener('submit', function(e) {
                    const origin = document.querySelector('select[name="Origin"]').value;
                    const destination = document.querySelector('select[name="Destination"]').value;
                    const departureDate = document.querySelector('input[name="Departure"]').value;
                    const returnDate = document.querySelector('input[name="Return"]').value;
                    const roundTrip = document.querySelector('input[name="way"][value="2"]').checked;
                    const passengers = parseInt(document.querySelector('input[name="no_of_pass"]').value);
                    
                    // Check if origin and destination are the same
                    if (origin === destination && origin !== '') {
                        e.preventDefault();
                        showAlert('Origin and destination cannot be the same. Please select different locations.', 'error');
                        return false;
                    }
                    
                    // Check if return date is provided for round trip
                    if (roundTrip && !returnDate) {
                        e.preventDefault();
                        showAlert('Please select a return date for round trip bookings.', 'error');
                        return false;
                    }
                    
                    // Check departure date is not in the past
                    if (departureDate < today) {
                        e.preventDefault();
                        showAlert('Departure date cannot be in the past.', 'error');
                        return false;
                    }
                    
                    // Check passenger count
                    if (passengers < 1 || passengers > 10) {
                        e.preventDefault();
                        showAlert('Number of passengers must be between 1 and 10.', 'error');
                        return false;
                    }
                    
                    // Show loading overlay
                    showLoadingOverlay();
                });
            }

            // Popular routes click handlers
            const popularRoutes = document.querySelectorAll('[data-route]');
            popularRoutes.forEach(route => {
                route.addEventListener('click', function() {
                    const routeData = this.getAttribute('data-route').split(',');
                    const [origin, destination] = routeData;
                    
                    const originSelect = document.querySelector('select[name="Origin"]');
                    const destinationSelect = document.querySelector('select[name="Destination"]');
                    
                    if (originSelect && destinationSelect) {
                        originSelect.value = origin;
                        destinationSelect.value = destination;
                        
                        // Trigger change events to update floating labels
                        originSelect.dispatchEvent(new Event('change'));
                        destinationSelect.dispatchEvent(new Event('change'));
                        
                        // Scroll to form
                        document.querySelector('form').scrollIntoView({ 
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                });
            });

            // Navbar scroll effect
            window.addEventListener('scroll', function() {
                const navbar = document.querySelector('nav');
                if (window.scrollY > 50) {
                    navbar.classList.add('shadow-xl');
                } else {
                    navbar.classList.remove('shadow-xl');
                }
            });

            // Animate elements on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in-up');
                    }
                });
            }, observerOptions);
            
            // Observe all animated elements
            document.querySelectorAll('.animate-fade-in-up, .animate-slide-in-right').forEach(el => {
                observer.observe(el);
            });

            // Form input animations
            const inputs = document.querySelectorAll('.floating-label input, .floating-label select');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    if (!this.value) {
                        this.parentElement.classList.remove('focused');
                    }
                });
                
                // Initialize labels for pre-filled inputs
                if (input.value) {
                    input.parentElement.classList.add('focused');
                }
            });

            // Real-time form validation
            const originSelect = document.querySelector('select[name="Origin"]');
            const destinationSelect = document.querySelector('select[name="Destination"]');
            
            if (originSelect && destinationSelect) {
                const validateRoute = () => {
                    if (originSelect.value && destinationSelect.value && originSelect.value === destinationSelect.value) {
                        showAlert('Origin and destination cannot be the same', 'error');
                        destinationSelect.setCustomValidity('Origin and destination cannot be the same');
                    } else {
                        destinationSelect.setCustomValidity('');
                        hideAlert();
                    }
                };
                
                originSelect.addEventListener('change', validateRoute);
                destinationSelect.addEventListener('change', validateRoute);
            }

            // Auto-hide alerts after 5 seconds
            setTimeout(() => {
                const alerts = document.querySelectorAll('.error-message, .success-message');
                alerts.forEach(alert => {
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 300);
                });
            }, 5000);
        });

        // Toggle return date based on trip type
        function toggleReturnDate() {
            const oneWayRadio = document.querySelector('input[name="way"][value="1"]');
            const returnInput = document.getElementById('datepick2');
            const returnLabel = returnInput.nextElementSibling;
            
            if (returnInput) {
                if (oneWayRadio.checked) {
                    returnInput.disabled = true;
                    returnInput.value = '';
                    returnInput.required = false;
                    returnInput.classList.add('disabled:bg-gray-100', 'disabled:cursor-not-allowed');
                    if (returnLabel) {
                        returnLabel.classList.add('text-gray-400');
                    }
                } else {
                    returnInput.disabled = false;
                    returnInput.required = true;
                    returnInput.classList.remove('disabled:bg-gray-100', 'disabled:cursor-not-allowed');
                    if (returnLabel) {
                        returnLabel.classList.remove('text-gray-400');
                    }
                }
            }
        }

        // FAQ Toggle Function
        function toggleFAQ(faqNumber) {
            const content = document.getElementById(`faq-content-${faqNumber}`);
            const icon = document.getElementById(`faq-icon-${faqNumber}`);
            
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.classList.add('rotate-180');
            } else {
                content.classList.add('hidden');
                icon.classList.remove('rotate-180');
            }
        }

        // Show Alert Function
        function showAlert(message, type = 'error') {
            const alertContainer = document.createElement('div');
            alertContainer.className = `fixed top-20 right-4 z-50 p-4 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full ${
                type === 'success' ? 'success-message' : 'error-message'
            }`;
            
            alertContainer.innerHTML = `
                <div class="flex items-center">
                    <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle'} mr-3"></i>
                    <span>${message}</span>
                    <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-lg">&times;</button>
                </div>
            `;
            
            document.body.appendChild(alertContainer);
            
            // Animate in
            setTimeout(() => {
                alertContainer.classList.remove('translate-x-full');
            }, 100);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                alertContainer.classList.add('translate-x-full');
                setTimeout(() => alertContainer.remove(), 300);
            }, 5000);
        }

        // Hide Alert Function
        function hideAlert() {
            const alerts = document.querySelectorAll('.fixed.top-20.right-4');
            alerts.forEach(alert => {
                alert.classList.add('translate-x-full');
                setTimeout(() => alert.remove(), 300);
            });
        }

        // Show Loading Overlay
        function showLoadingOverlay() {
            const overlay = document.getElementById('loadingOverlay');
            if (overlay) {
                overlay.classList.remove('hidden');
                overlay.classList.add('flex');
            }
        }

        // Hide Loading Overlay
        function hideLoadingOverlay() {
            const overlay = document.getElementById('loadingOverlay');
            if (overlay) {
                overlay.classList.add('hidden');
                overlay.classList.remove('flex');
            }
        }

        // Form Auto-save (to localStorage - for user convenience)
        function saveFormData() {
            const formData = {
                way: document.querySelector('input[name="way"]:checked')?.value,
                origin: document.querySelector('select[name="Origin"]').value,
                destination: document.querySelector('select[name="Destination"]').value,
                passengers: document.querySelector('input[name="no_of_pass"]').value,
                bustype: document.querySelector('select[name="bustype"]').value,
                departure: document.querySelector('input[name="Departure"]').value,
                return: document.querySelector('input[name="Return"]').value
            };
            
            try {
                localStorage.setItem('dimpleStarBookingData', JSON.stringify(formData));
            } catch (e) {
                console.log('Unable to save form data');
            }
        }

        // Load saved form data
        function loadFormData() {
            try {
                const savedData = localStorage.getItem('dimpleStarBookingData');
                if (savedData) {
                    const formData = JSON.parse(savedData);
                    
                    // Restore form values
                    if (formData.way) {
                        const wayRadio = document.querySelector(`input[name="way"][value="${formData.way}"]`);
                        if (wayRadio) wayRadio.checked = true;
                    }
                    
                    if (formData.origin) {
                        document.querySelector('select[name="Origin"]').value = formData.origin;
                    }
                    
                    if (formData.destination) {
                        document.querySelector('select[name="Destination"]').value = formData.destination;
                    }
                    
                    if (formData.passengers) {
                        document.querySelector('input[name="no_of_pass"]').value = formData.passengers;
                    }
                    
                    if (formData.bustype) {
                        document.querySelector('select[name="bustype"]').value = formData.bustype;
                    }
                    
                    if (formData.departure) {
                        document.querySelector('input[name="Departure"]').value = formData.departure;
                    }
                    
                    if (formData.return) {
                        document.querySelector('input[name="Return"]').value = formData.return;
                    }
                    
                    toggleReturnDate();
                }
            } catch (e) {
                console.log('Unable to load form data');
            }
        }

        // Auto-save form data on input changes
        window.addEventListener('load', function() {
            toggleReturnDate();
            loadFormData();
            
            // Add event listeners for auto-save
            const form = document.getElementById('bookingForm');
            if (form) {
                form.addEventListener('input', saveFormData);
                form.addEventListener('change', saveFormData);
            }
        });

        // Clear saved data on successful submission
        window.addEventListener('beforeunload', function() {
            // Only clear if form was submitted successfully
            if (window.formSubmittedSuccessfully) {
                try {
                    localStorage.removeItem('dimpleStarBookingData');
                } catch (e) {
                    console.log('Unable to clear form data');
                }
            }
        });

        // Price estimation based on route
        const routePrices = {
            'Alabang-Gloria': { ordinary: 150, aircon: 220 },
            'Cabuyao-Naujan': { ordinary: 200, aircon: 280 },
            'Manila-Batangas': { ordinary: 120, aircon: 180 },
            'Espana-Socorro': { ordinary: 280, aircon: 350 },
            'San Lazaro-Bulalacao': { ordinary: 300, aircon: 400 },
            'default': { ordinary: 100, aircon: 150 }
        };

        function updatePriceEstimate() {
            const origin = document.querySelector('select[name="Origin"]').value;
            const destination = document.querySelector('select[name="Destination"]').value;
            const busType = document.querySelector('select[name="bustype"]').value;
            const passengers = parseInt(document.querySelector('input[name="no_of_pass"]').value) || 1;
            
            if (origin && destination && busType) {
                const routeKey = `${origin}-${destination}`;
                const reverseRouteKey = `${destination}-${origin}`;
                
                let priceData = routePrices[routeKey] || routePrices[reverseRouteKey] || routePrices.default;
                let basePrice = busType === 'Air Conditioned' ? priceData.aircon : priceData.ordinary;
                let totalPrice = basePrice * passengers;
                
                // Show price estimate (you can add a dedicated element for this)
                console.log(`Estimated price: ₱${totalPrice} for ${passengers} passenger(s)`);
            }
        }

        // Add price estimation listeners
        document.addEventListener('DOMContentLoaded', function() {
            const priceInputs = ['select[name="Origin"]', 'select[name="Destination"]', 'select[name="bustype"]', 'input[name="no_of_pass"]'];
            priceInputs.forEach(selector => {
                const element = document.querySelector(selector);
                if (element) {
                    element.addEventListener('change', updatePriceEstimate);
                }
            });
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl/Cmd + Enter to submit form
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                const submitButton = document.querySelector('button[type="submit"]');
                if (submitButton) {
                    submitButton.click();
                }
            }
            
            // Escape to close modals/alerts
            if (e.key === 'Escape') {
                hideAlert();
                hideLoadingOverlay();
            }
        });

        // Accessibility improvements
        document.addEventListener('DOMContentLoaded', function() {
            // Add ARIA labels
            const form = document.getElementById('bookingForm');
            if (form) {
                form.setAttribute('aria-label', 'Bus ticket booking form');
            }
            
            // Add focus indicators for better accessibility
            const focusableElements = document.querySelectorAll('input, select, button, a');
            focusableElements.forEach(element => {
                element.addEventListener('focus', function() {
                    this.classList.add('ring-2', 'ring-primary-500', 'ring-opacity-50');
                });
                
                element.addEventListener('blur', function() {
                    this.classList.remove('ring-2', 'ring-primary-500', 'ring-opacity-50');
                });
            });
        });
    </script>

    <?php
    // PHP Form Processing
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        // CSRF Token Validation
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            $_SESSION['message'] = 'Security token mismatch. Please try again.';
            $_SESSION['message_type'] = 'error';
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        }
        
        // Regenerate CSRF token
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        
        // Sanitize and validate inputs
        $way = filter_input(INPUT_POST, 'way', FILTER_VALIDATE_INT);
        $origin = filter_input(INPUT_POST, 'Origin', FILTER_SANITIZE_STRING);
        $destination = filter_input(INPUT_POST, 'Destination', FILTER_SANITIZE_STRING);
        $no_of_pass = filter_input(INPUT_POST, 'no_of_pass', FILTER_VALIDATE_INT);
        $bustype = filter_input(INPUT_POST, 'bustype', FILTER_SANITIZE_STRING);
        $departure = filter_input(INPUT_POST, 'Departure', FILTER_SANITIZE_STRING);
        $return = filter_input(INPUT_POST, 'Return', FILTER_SANITIZE_STRING);
        
        $errors = [];
        
        // Validation
        if (!$way || ($way !== 1 && $way !== 2)) {
            $errors[] = 'Please select a valid trip type.';
        }
        
        if (empty($origin)) {
            $errors[] = 'Please select an origin.';
        }
        
        if (empty($destination)) {
            $errors[] = 'Please select a destination.';
        }
        
        if ($origin === $destination) {
            $errors[] = 'Origin and destination cannot be the same.';
        }
        
        if (!$no_of_pass || $no_of_pass < 1 || $no_of_pass > 10) {
            $errors[] = 'Number of passengers must be between 1 and 10.';
        }
        
        if (empty($bustype) || !in_array($bustype, ['Air Conditioned', 'Ordinary'])) {
            $errors[] = 'Please select a valid bus type.';
        }
        
        if (empty($departure)) {
            $errors[] = 'Please select a departure date.';
        } else {
            $departure_date = DateTime::createFromFormat('Y-m-d', $departure);
            $today = new DateTime();
            if (!$departure_date || $departure_date < $today->setTime(0, 0, 0)) {
                $errors[] = 'Departure date cannot be in the past.';
            }
        }
        
        if ($way === 2) {
            if (empty($return)) {
                $errors[] = 'Please select a return date for round trip.';
            } else {
                $return_date = DateTime::createFromFormat('Y-m-d', $return);
                $departure_date = DateTime::createFromFormat('Y-m-d', $departure);
                if (!$return_date || ($departure_date && $return_date < $departure_date)) {
                    $errors[] = 'Return date must be after departure date.';
                }
            }
        }
        
        if (!empty($errors)) {
            $_SESSION['message'] = implode(' ', $errors);
            $_SESSION['message_type'] = 'error';
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        }
        
        // If validation passes, store booking data in session and redirect to results page
        $_SESSION['booking_search'] = [
            'way' => $way,
            'origin' => $origin,
            'destination' => $destination,
            'no_of_pass' => $no_of_pass,
            'bustype' => $bustype,
            'departure' => $departure,
            'return' => $way === 2 ? $return : null,
            'search_time' => date('Y-m-d H:i:s')
        ];
        
        $_SESSION['message'] = 'Booking search completed successfully!';
        $_SESSION['message_type'] = 'success';
        
        // Redirect to booking results page
        header('Location: booking-results.php');
        exit();
    }
    ?>
</body>
</html>