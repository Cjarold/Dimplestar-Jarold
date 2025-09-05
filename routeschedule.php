<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Routes & Schedules - Dimple Star Transport</title>
    <meta name="description" content="View bus routes and schedules for Dimple Star Transport. Plan your journey with our comprehensive schedule information.">
    
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
                        'slide-in-left': 'slideInLeft 0.8s ease-out',
                        'pulse-gentle': 'pulseGentle 2s infinite',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        slideInLeft: {
                            '0%': { opacity: '0', transform: 'translateX(-30px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' },
                        },
                        pulseGentle: {
                            '0%, 100%': { opacity: '1' },
                            '50%': { opacity: '0.8' },
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
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        .schedule-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .schedule-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        .route-indicator {
            position: relative;
        }
        .route-indicator::after {
            content: '';
            position: absolute;
            top: 50%;
            right: -20px;
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-top: 8px solid transparent;
            border-bottom: 8px solid transparent;
            border-left: 12px solid #3b82f6;
        }
        @media (max-width: 768px) {
            .route-indicator::after {
                display: none;
            }
        }
    </style>
</head>
<body class="font-sans bg-gray-50 text-gray-800">
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
                        <a href="routeschedule.php" class="bg-primary-100 text-primary-700 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Routes & Schedules</a>
                        <a href="contact.php" class="text-gray-600 hover:bg-gray-100 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Contact</a>
                        <a href="book.php" class="bg-primary-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-primary-700 transition-colors duration-200 shadow-md">Book Now</a>
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
                <a href="routeschedule.php" class="bg-primary-100 text-primary-700 block px-3 py-2 rounded-md text-base font-medium">Routes & Schedules</a>
                <a href="contact.php" class="text-gray-600 hover:bg-gray-100 hover:text-primary-600 block px-3 py-2 rounded-md text-base font-medium">Contact</a>
                <a href="book.php" class="bg-primary-600 text-white block px-3 py-2 rounded-md text-base font-medium">Book Now</a>
                
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

    <!-- Page Header -->
    <section class="hero-gradient text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center animate-fade-in-up">
                <h1 class="text-4xl sm:text-5xl font-bold mb-4">Routes & Schedules</h1>
                <p class="text-xl text-blue-100 mb-6 max-w-3xl mx-auto">
                    Plan your journey with our comprehensive bus schedule. All trips operate in both directions for your convenience.
                </p>
                <div class="flex items-center justify-center space-x-2 text-blue-100">
                    <i class="fas fa-clock text-lg"></i>
                    <span class="font-medium"><?php include_once("php_includes/date_time.php"); ?></span>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Actions -->
    <section class="py-8 bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-6">
                <div class="flex items-center space-x-2 text-gray-600">
                    <i class="fas fa-info-circle text-primary-500"></i>
                    <span class="text-sm font-medium">All trips operate both ways</span>
                </div>
                <div class="hidden sm:block w-px h-6 bg-gray-300"></div>
                <div class="flex items-center space-x-2 text-gray-600">
                    <i class="fas fa-phone text-green-500"></i>
                    <span class="text-sm font-medium">Call for inquiries: 0929 209 0712</span>
                </div>
                <div class="hidden sm:block w-px h-6 bg-gray-300"></div>
                <a href="book.php" class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-6 py-2 rounded-full text-sm font-semibold hover:from-orange-600 hover:to-red-600 transition-all duration-300 transform hover:scale-105 shadow-md">
                    <i class="fas fa-ticket-alt mr-2"></i>Book Now
                </a>
            </div>
        </div>
    </section>

    <!-- Route Map Section -->
    <section class="py-12 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Our Route Network</h2>
                <p class="text-xl text-gray-600">Connecting major terminals across Metro Manila to San Jose</p>
            </div>
            
            <div class="bg-white rounded-2xl shadow-xl p-8 mb-12">
                <div class="flex justify-center mb-6">
                    <img src="images/route.png" alt="Route Map" class="max-w-full h-auto rounded-lg shadow-md">
                </div>
                <div class="text-center">
                    <div class="inline-flex items-center bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-3 rounded-full font-semibold">
                        <i class="fas fa-route mr-2"></i>
                        All Routes Lead to San Jose
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Schedules Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Bus Schedules</h2>
                <p class="text-xl text-gray-600">Choose your departure terminal and time</p>
            </div>
            
            <!-- Desktop Schedule Table -->
            <div class="hidden lg:block bg-white rounded-2xl shadow-xl overflow-hidden mb-8">
                <div class="bg-gradient-to-r from-primary-600 to-primary-700 text-white p-6">
                    <div class="grid grid-cols-3 gap-4 font-semibold text-lg">
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-3"></i>
                            Origin Terminal
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-clock mr-3"></i>
                            Regular Schedule
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-flag-checkered mr-3"></i>
                            Destination
                        </div>
                    </div>
                </div>
                
                <div class="divide-y divide-gray-200">
                    <?php
                    $schedules = [
                        ['terminal' => 'Ali Mall Cubao Terminal', 'times' => ['9:00 AM', '10:00 AM', '1:00 PM', '4:00 PM'], 'destination' => 'San Jose'],
                        ['terminal' => 'Alabang Terminal', 'times' => ['6:00 AM', '7:00 AM', '2:00 PM', '6:00 PM', '10:00 PM'], 'destination' => 'San Jose'],
                        ['terminal' => 'Cabuyao Terminal', 'times' => ['8:00 AM', '9:00 AM', '4:00 PM', '8:00 PM'], 'destination' => 'San Jose'],
                        ['terminal' => 'Espana Terminal', 'times' => ['4:30 AM', '5:30 AM', '12:00 PM', '4:00 PM', '8:00 PM'], 'destination' => 'San Jose'],
                        ['terminal' => 'San Lazaro Terminal', 'times' => ['3:00 AM', '4:30 AM', '11:00 AM', '3:00 PM', '7:00 PM'], 'destination' => 'San Jose'],
                        ['terminal' => 'Pasay Terminal', 'times' => ['5:00 AM', '6:00 AM', '1:00 PM', '3:00 PM'], 'destination' => 'San Jose']
                    ];
                    
                    foreach ($schedules as $index => $schedule): ?>
                    <div class="grid grid-cols-3 gap-4 p-6 hover:bg-gray-50 transition-colors duration-200">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-primary-500 rounded-full mr-4"></div>
                            <span class="font-semibold text-gray-900"><?php echo $schedule['terminal']; ?></span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach ($schedule['times'] as $time): ?>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                <i class="fas fa-clock mr-1 text-xs"></i>
                                <?php echo $time; ?>
                            </span>
                            <?php endforeach; ?>
                        </div>
                        <div class="flex items-center">
                            <span class="font-semibold text-primary-600"><?php echo $schedule['destination']; ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <!-- Mobile Schedule Cards -->
            <div class="lg:hidden space-y-6">
                <?php foreach ($schedules as $index => $schedule): ?>
                <div class="schedule-card bg-white rounded-2xl shadow-lg p-6 border border-gray-200 animate-fade-in-up" style="animation-delay: <?php echo $index * 0.1; ?>s">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-primary-500 rounded-full mr-3"></div>
                            <h3 class="text-lg font-bold text-gray-900"><?php echo $schedule['terminal']; ?></h3>
                        </div>
                        <span class="bg-gradient-to-r from-primary-100 to-primary-200 text-primary-700 px-3 py-1 rounded-full text-sm font-semibold">
                            <?php echo $schedule['destination']; ?>
                        </span>
                    </div>
                    
                    <div class="mb-4">
                        <div class="flex items-center mb-3">
                            <i class="fas fa-clock text-primary-500 mr-2"></i>
                            <span class="text-sm font-semibold text-gray-700">Departure Times</span>
                        </div>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                            <?php foreach ($schedule['times'] as $time): ?>
                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-lg p-3 text-center">
                                <span class="text-blue-700 font-semibold"><?php echo $time; ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-exchange-alt mr-2 text-green-500"></i>
                            <span>Round trip available</span>
                        </div>
                        <a href="book.php" class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:from-orange-600 hover:to-red-600 transition-all duration-300 transform hover:scale-105">
                            Book Trip
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Important Notice -->
            <div class="mt-12 bg-gradient-to-r from-yellow-50 to-orange-50 border-l-4 border-yellow-400 p-6 rounded-r-lg">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-triangle text-yellow-400 text-xl"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Important Notice</h3>
                        <div class="text-gray-700 space-y-1">
                            <p>• All schedules are subject to change based on traffic conditions and weather</p>
                            <p>• Please arrive at the terminal at least 30 minutes before departure</p>
                            <p>• For urgent inquiries, call our hotline: <strong class="text-primary-600">0929 209 0712</strong></p>
                            <p>• All trips operate in both directions (vice versa)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-br from-primary-600 to-primary-700 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-4">Ready to Book Your Journey?</h2>
            <p class="text-xl text-blue-100 mb-8">
                Choose your preferred schedule and book your ticket now for a comfortable and reliable journey.
            </p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="book.php" class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-8 py-4 rounded-full text-lg font-semibold hover:from-orange-600 hover:to-red-600 transition-all duration-300 transform hover:scale-105 shadow-xl">
                    <i class="fas fa-ticket-alt mr-2"></i>Book Your Ticket
                </a>
                <a href="contact.php" class="glass-morphism text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-white hover:bg-opacity-20 transition-all duration-300 border border-white border-opacity-20">
                    <i class="fas fa-phone mr-2"></i>Call for Inquiries
                </a>
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

    <!-- Floating Action Button -->
    <div class="fixed bottom-6 right-6 z-50">
        <a href="book.php" class="bg-gradient-to-r from-orange-500 to-red-500 text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-300 animate-pulse-gentle">
            <i class="fas fa-ticket-alt text-lg"></i>
        </a>
    </div>

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-20 right-6 bg-gray-900 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg opacity-0 invisible transition-all duration-300 hover:bg-primary-600 z-40">
        <i class="fas fa-chevron-up"></i>
    </button>

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
            
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
            
            // Add scroll animations
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
            
            // Observe schedule cards
            document.querySelectorAll('.schedule-card').forEach(card => {
                observer.observe(card);
            });
            
            // Filter functionality (if needed for future enhancement)
            function filterSchedules(terminal) {
                const cards = document.querySelectorAll('.schedule-card');
                cards.forEach(card => {
                    if (terminal === 'all' || card.textContent.toLowerCase().includes(terminal.toLowerCase())) {
                        card.style.display = 'block';
                        card.classList.add('animate-fade-in-up');
                    } else {
                        card.style.display = 'none';
                    }
                });
            }
            
            // Add loading animation to buttons
            document.querySelectorAll('a[href="book.php"]').forEach(button => {
                button.addEventListener('click', function(e) {
                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Loading...';
                    
                    // Reset after a short delay (for demo purposes)
                    setTimeout(() => {
                        this.innerHTML = originalText;
                    }, 1000);
                });
            });
            
            // Add hover effects to schedule times
            document.querySelectorAll('.bg-blue-100').forEach(timeSlot => {
                timeSlot.addEventListener('mouseenter', function() {
                    this.classList.add('transform', 'scale-105', 'bg-blue-200');
                });
                
                timeSlot.addEventListener('mouseleave', function() {
                    this.classList.remove('transform', 'scale-105', 'bg-blue-200');
                });
            });
            
            // Terminal info tooltips (future enhancement)
            const terminals = document.querySelectorAll('[data-terminal]');
            terminals.forEach(terminal => {
                terminal.addEventListener('mouseenter', function() {
                    // Could show additional terminal information
                });
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
        
        // Time highlighting (show current time slot)
        function highlightCurrentTime() {
            const now = new Date();
            const currentHour = now.getHours();
            const timeSlots = document.querySelectorAll('.bg-blue-100');
            
            timeSlots.forEach(slot => {
                const timeText = slot.textContent.trim();
                const timeMatch = timeText.match(/(\d{1,2}):(\d{2})\s*(AM|PM)/i);
                
                if (timeMatch) {
                    let hour = parseInt(timeMatch[1]);
                    const minute = parseInt(timeMatch[2]);
                    const period = timeMatch[3].toUpperCase();
                    
                    if (period === 'PM' && hour !== 12) hour += 12;
                    if (period === 'AM' && hour === 12) hour = 0;
                    
                    const scheduleTime = hour * 60 + minute;
                    const currentTime = currentHour * 60 + now.getMinutes();
                    
                    // Highlight if within 30 minutes of departure
                    if (scheduleTime >= currentTime && scheduleTime <= currentTime + 30) {
                        slot.classList.remove('bg-blue-100', 'text-blue-800');
                        slot.classList.add('bg-green-100', 'text-green-800', 'animate-pulse');
                        slot.innerHTML = '<i class="fas fa-clock mr-1 text-xs"></i>' + timeText + ' <span class="text-xs">(Soon)</span>';
                    }
                }
            });
        }
        
        // Run time highlighting every minute
        highlightCurrentTime();
        setInterval(highlightCurrentTime, 60000);
    </script>
</body>
</html>