<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us - Dimple Star Transport</title>
    <meta name="description" content="Learn about Dimple Star Transport's history, mission, and vision. Providing reliable bus transportation services across the Philippines since 1993.">
    
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
                        'scale-in': 'scaleIn 0.5s ease-out',
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
                        scaleIn: {
                            '0%': { opacity: '0', transform: 'scale(0.9)' },
                            '100%': { opacity: '1', transform: 'scale(1)' },
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
    
    <!-- Custom CSS -->
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .glass-morphism {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        .timeline-line {
            background: linear-gradient(to bottom, #3b82f6, #1d4ed8);
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
                        <a href="about.php" class="bg-primary-100 text-primary-700 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">About Us</a>
                        <a href="terminal.php" class="text-gray-600 hover:bg-gray-100 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Terminals</a>
                        <a href="routeschedule.php" class="text-gray-600 hover:bg-gray-100 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Routes & Schedules</a>
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
                <a href="about.php" class="bg-primary-100 text-primary-700 block px-3 py-2 rounded-md text-base font-medium">About Us</a>
                <a href="terminal.php" class="text-gray-600 hover:bg-gray-100 hover:text-primary-600 block px-3 py-2 rounded-md text-base font-medium">Terminals</a>
                <a href="routeschedule.php" class="text-gray-600 hover:bg-gray-100 hover:text-primary-600 block px-3 py-2 rounded-md text-base font-medium">Routes & Schedules</a>
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
    <section class="hero-gradient py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-white">
                <h1 class="text-4xl sm:text-5xl font-bold mb-4 animate-fade-in-up">About Us</h1>
                <p class="text-xl text-blue-100 max-w-3xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s;">
                    Discover our journey of providing reliable transportation services across the Philippines since 1993
                </p>
                
                <!-- Date/Time Display -->
                <div class="mt-8 glass-morphism inline-block px-6 py-3 rounded-full animate-scale-in" style="animation-delay: 0.4s;">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-calendar-alt text-lg"></i>
                        <span class="font-semibold"><?php include_once("php_includes/date_time.php"); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- History Section -->
            <div class="mb-20">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <!-- Image -->
                    <div class="animate-fade-in-up">
                        <div class="relative">
                            <img src="images/oldbus.jpg" alt="Historical photo of Napat Transit bus from 1993" 
                                 class="rounded-2xl shadow-2xl w-full h-auto transform hover:scale-105 transition-transform duration-500">
                            <div class="absolute -bottom-6 -right-6 bg-gradient-to-br from-primary-500 to-primary-700 text-white p-4 rounded-xl shadow-lg">
                                <div class="text-center">
                                    <div class="text-2xl font-bold">1993</div>
                                    <div class="text-sm">Since</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- History Content -->
                    <div class="animate-slide-in-right">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-history text-white text-xl"></i>
                            </div>
                            <h2 class="text-3xl font-bold text-gray-900">Our History</h2>
                        </div>
                        
                        <div class="space-y-6">
                            <div class="bg-gradient-to-r from-gray-50 to-blue-50 p-6 rounded-xl border-l-4 border-primary-500">
                                <div class="flex items-center mb-3">
                                    <div class="w-8 h-8 bg-primary-500 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-white text-sm font-bold">1</span>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900">October 16, 1993</h3>
                                </div>
                                <p class="text-gray-700 leading-relaxed">
                                    This historic photo shows our fleet No. 800 (NVR-963) operating under Napat Transit, 
                                    traveling to Alabang alongside jeepneys under the Light Rail Line in Taft Avenue 
                                    near United Nations Avenue, Ermita, Manila, Philippines.
                                </p>
                            </div>
                            
                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-6 rounded-xl border-l-4 border-indigo-500">
                                <div class="flex items-center mb-3">
                                    <div class="w-8 h-8 bg-indigo-500 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-white text-sm font-bold">2</span>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900">May 2004</h3>
                                </div>
                                <p class="text-gray-700 leading-relaxed">
                                    A significant transformation took place when Napat Transit became 
                                    <span class="font-semibold text-primary-600">Dimple Star Transport</span>, 
                                    marking a new era in our commitment to excellence in public transportation.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mission & Vision Section -->
            <div class="mb-20">
                <div class="text-center mb-12">
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Our Mission & Vision</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Guiding principles that drive our commitment to excellence in transportation services
                    </p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Mission Card -->
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 animate-fade-in-up">
                        <div class="flex items-center mb-6">
                            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-bullseye text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">Our Mission</h3>
                        </div>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            To provide superior transport service to Metro Manila and Mindoro Province commuters, 
                            ensuring safe, reliable, and comfortable journeys for all our passengers.
                        </p>
                        <div class="mt-6 flex items-center text-blue-600 font-semibold">
                            <i class="fas fa-arrow-right mr-2"></i>
                            <span>Excellence in Service</span>
                        </div>
                    </div>
                    
                    <!-- Vision Card -->
                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 animate-slide-in-right">
                        <div class="flex items-center mb-6">
                            <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-eye text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">Our Vision</h3>
                        </div>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            To lead the bus transport industry through innovative service delivery to the riding public, 
                            setting new standards in passenger experience and transportation excellence.
                        </p>
                        <div class="mt-6 flex items-center text-purple-600 font-semibold">
                            <i class="fas fa-arrow-right mr-2"></i>
                            <span>Industry Leadership</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Company Timeline -->
            <div class="mb-20">
                <div class="text-center mb-12">
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Our Journey</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Key milestones in our evolution from Napat Transit to Dimple Star Transport
                    </p>
                </div>
                
                <div class="relative">
                    <!-- Timeline Line -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 timeline-line rounded-full"></div>
                    
                    <!-- Timeline Items -->
                    <div class="space-y-12">
                        <!-- 1993 -->
                        <div class="flex items-center">
                            <div class="flex-1 text-right pr-8">
                                <div class="bg-white p-6 rounded-xl shadow-lg animate-fade-in-up">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Napat Transit Era</h3>
                                    <p class="text-gray-600">Started operations serving Metro Manila routes with dedication to passenger safety and comfort.</p>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-lg z-10 shadow-lg">
                                93
                            </div>
                            <div class="flex-1 pl-8">
                                <div class="text-2xl font-bold text-primary-600">1993</div>
                                <div class="text-gray-500">October 16</div>
                            </div>
                        </div>
                        
                        <!-- 2004 -->
                        <div class="flex items-center">
                            <div class="flex-1 text-right pr-8">
                                <div class="text-2xl font-bold text-primary-600">2004</div>
                                <div class="text-gray-500">May</div>
                            </div>
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center text-white font-bold text-lg z-10 shadow-lg">
                                04
                            </div>
                            <div class="flex-1 pl-8">
                                <div class="bg-white p-6 rounded-xl shadow-lg animate-slide-in-right">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Dimple Star Transport</h3>
                                    <p class="text-gray-600">Rebranded to Dimple Star Transport, marking a new chapter in our commitment to excellence.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Present -->
                        <div class="flex items-center">
                            <div class="flex-1 text-right pr-8">
                                <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-6 rounded-xl shadow-lg animate-fade-in-up border border-green-200">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Continuing Excellence</h3>
                                    <p class="text-gray-600">Today, we continue to serve thousands of passengers daily with modern fleet and improved services.</p>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center text-white z-10 shadow-lg animate-pulse">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="flex-1 pl-8">
                                <div class="text-2xl font-bold text-green-600">Present</div>
                                <div class="text-gray-500">Ongoing</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Facebook Like Section -->
            <div class="text-center bg-gradient-to-r from-blue-50 to-indigo-50 p-8 rounded-2xl">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Stay Connected</h3>
                <p class="text-gray-600 mb-6">Follow us on social media for updates, promotions, and travel tips</p>
                <div class="inline-block">
                    <?php include_once("php_includes/fblike.php"); ?>
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
                        We've been serving passengers with excellence for over 30 years.
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
                        <li><a href="index.php" class="text-gray-400 hover:text-white transition-colors duration-200">Home</a></li>
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
    <button id="backToTop" class="fixed bottom-8 right-8 bg-primary-600 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg opacity-0 invisible transition-all duration-300 hover:bg-primary-700 z-50 transform hover:scale-110">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- JavaScript -->
    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
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
            
            // Intersection Observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animationPlayState = 'running';
                    }
                });
            }, observerOptions);
            
            // Observe animated elements
            document.querySelectorAll('.animate-fade-in-up, .animate-slide-in-right, .animate-scale-in').forEach(el => {
                el.style.animationPlayState = 'paused';
                observer.observe(el);
            });
            
            // Add scroll effects to navbar
            let lastScrollTop = 0;
            const navbar = document.querySelector('nav');
            
            window.addEventListener('scroll', function() {
                let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                if (scrollTop > 100) {
                    navbar.classList.add('shadow-xl');
                } else {
                    navbar.classList.remove('shadow-xl');
                }
                
                lastScrollTop = scrollTop;
            });
            
            // Timeline animation on scroll
            const timelineItems = document.querySelectorAll('.space-y-12 > div');
            
            const timelineObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                        entry.target.style.transition = `opacity 0.6s ease-out ${index * 0.2}s, transform 0.6s ease-out ${index * 0.2}s`;
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });
            
            timelineItems.forEach(item => {
                item.style.opacity = '0';
                item.style.transform = 'translateY(30px)';
                timelineObserver.observe(item);
            });
            
            // Enhanced hover effects for cards
            const cards = document.querySelectorAll('.hover\\:shadow-xl');
            
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px) scale(1.02)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
            
            // Add loading states to interactive elements
            const interactiveElements = document.querySelectorAll('a[href], button');
            
            interactiveElements.forEach(element => {
                element.addEventListener('click', function(e) {
                    // Add loading state for external links
                    if (this.href && this.href.startsWith('http') && !this.href.includes(window.location.hostname)) {
                        const originalText = this.innerHTML;
                        this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Loading...';
                        
                        setTimeout(() => {
                            this.innerHTML = originalText;
                        }, 2000);
                    }
                });
            });
        });
        
        // Add parallax effect to hero section
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const heroSection = document.querySelector('.hero-gradient');
            
            if (heroSection) {
                const rate = scrolled * -0.5;
                heroSection.style.transform = `translateY(${rate}px)`;
            }
        });
        
        // Add dynamic content loading effect
        function addContentLoadingEffect() {
            const content = document.querySelectorAll('section');
            content.forEach((section, index) => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    section.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
                    section.style.opacity = '1';
                    section.style.transform = 'translateY(0)';
                }, index * 200);
            });
        }
        
        // Initialize content loading effect when page loads
        window.addEventListener('load', addContentLoadingEffect);
    </script>
</body>
</html>