<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dimple Star Transport - Reliable Bus Transportation Services</title>
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
    
    <!-- Custom CSS for additional animations -->
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .glass-morphism {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        .slider-container {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .slider-slide {
            display: none;
            animation: fadeIn 1s ease-in-out;
        }
        .slider-slide.active {
            display: block;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .floating-action {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 1000;
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
                        <a href="index.php" class="bg-primary-100 text-primary-700 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Home</a>
                        <a href="about.php" class="text-gray-600 hover:bg-gray-100 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">About Us</a>
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
                <a href="index.php" class="bg-primary-100 text-primary-700 block px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="about.php" class="text-gray-600 hover:bg-gray-100 hover:text-primary-600 block px-3 py-2 rounded-md text-base font-medium">About Us</a>
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

    <!-- Hero Section -->
    <section class="hero-gradient min-h-screen relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.4"%3E%3Ccircle cx="12" cy="12" r="1"/%3E%3Ccircle cx="36" cy="36" r="1"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="min-h-screen flex items-center">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center w-full">
                    <!-- Hero Content -->
                    <div class="text-white animate-fade-in-up">
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                            Your Journey
                            <span class="block text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-300">
                                Starts Here
                            </span>
                        </h1>
                        <p class="text-xl sm:text-2xl mb-8 text-blue-100 leading-relaxed">
                            Experience safe, comfortable, and reliable bus transportation across the Philippines with Dimple Star Transport.
                        </p>
                        
                        <!-- CTA Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 mb-8">
                            <a href="book.php" class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-8 py-4 rounded-full text-lg font-semibold hover:from-orange-600 hover:to-red-600 transition-all duration-300 transform hover:scale-105 shadow-xl text-center">
                                <i class="fas fa-ticket-alt mr-2"></i>Book Your Ticket
                            </a>
                            <a href="routeschedule.php" class="glass-morphism text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-white hover:bg-opacity-20 transition-all duration-300 text-center border border-white border-opacity-20">
                                <i class="fas fa-route mr-2"></i>View Routes
                            </a>
                        </div>
                        
                        <!-- Trust Indicators -->
                        <div class="flex flex-wrap items-center gap-6 text-blue-100">
                            <div class="flex items-center">
                                <i class="fas fa-shield-alt text-2xl text-green-300 mr-2"></i>
                                <span class="text-sm font-medium">Safe & Secure</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-clock text-2xl text-blue-300 mr-2"></i>
                                <span class="text-sm font-medium">On-Time Service</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-star text-2xl text-yellow-300 mr-2"></i>
                                <span class="text-sm font-medium">Trusted by Thousands</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Image Slider -->
                    <div class="animate-slide-in-right">
                        <div class="slider-container">
                            <div id="image-slider" class="relative h-96 lg:h-[500px]">
                                <div class="slider-slide active">
                                    <img src="slide/images/b1.png" alt="Modern Bus Fleet" class="w-full h-full object-cover">
                                </div>
                                <div class="slider-slide">
                                    <img src="slide/images/b2.png" alt="Comfortable Interior" class="w-full h-full object-cover">
                                </div>
                                <div class="slider-slide">
                                    <img src="slide/images/b3.png" alt="Professional Service" class="w-full h-full object-cover">
                                </div>
                                <div class="slider-slide">
                                    <img src="slide/images/b4.png" alt="Safe Journey" class="w-full h-full object-cover">
                                </div>
                                
                                <!-- Slider Navigation -->
                                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                                    <button class="slider-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition-all duration-300 active" data-slide="0"></button>
                                    <button class="slider-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition-all duration-300" data-slide="1"></button>
                                    <button class="slider-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition-all duration-300" data-slide="2"></button>
                                    <button class="slider-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition-all duration-300" data-slide="3"></button>
                                </div>
                                
                                <!-- Slider Arrows -->
                                <button class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white hover:text-orange-300 transition-colors duration-300" id="prevSlide">
                                    <i class="fas fa-chevron-left text-2xl"></i>
                                </button>
                                <button class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white hover:text-orange-300 transition-colors duration-300" id="nextSlide">
                                    <i class="fas fa-chevron-right text-2xl"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Down Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce-gentle">
            <i class="fas fa-chevron-down text-white text-2xl"></i>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Why Choose Dimple Star Transport?</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Experience the difference with our premium transportation services designed for your comfort and safety.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="text-center p-8 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-bus text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Modern Fleet</h3>
                    <p class="text-gray-600">Our buses are equipped with the latest safety features, comfortable seating, and climate control for your journey.</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="text-center p-8 bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-shield-alt text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Safety First</h3>
                    <p class="text-gray-600">Professional drivers, regular maintenance, and strict safety protocols ensure your peace of mind throughout your journey.</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="text-center p-8 bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-clock text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Punctual Service</h3>
                    <p class="text-gray-600">We value your time. Our buses operate on schedule, ensuring you reach your destination when you need to.</p>
                </div>
                
                <!-- Feature 4 -->
                <div class="text-center p-8 bg-gradient-to-br from-orange-50 to-red-50 rounded-2xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-dollar-sign text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Affordable Rates</h3>
                    <p class="text-gray-600">Quality transportation doesn't have to be expensive. We offer competitive pricing for all routes.</p>
                </div>
                
                <!-- Feature 5 -->
                <div class="text-center p-8 bg-gradient-to-br from-yellow-50 to-orange-50 rounded-2xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-mobile-alt text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Easy Booking</h3>
                    <p class="text-gray-600">Book your tickets online or through our mobile-friendly platform with just a few clicks.</p>
                </div>
                
                <!-- Feature 6 -->
                <div class="text-center p-8 bg-gradient-to-br from-teal-50 to-cyan-50 rounded-2xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-headset text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">24/7 Support</h3>
                    <p class="text-gray-600">Our customer service team is available round the clock to assist you with your travel needs.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Contact Info -->
                <div>
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-8">Get in Touch</h2>
                    <div class="space-y-6">
                        <!-- Phone -->
                        <div class="flex items-center p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-phone text-white text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Call Us</h3>
                                <p class="text-2xl font-bold text-primary-600">0929 209 0712</p>
                            </div>
                        </div>
                        
                        <!-- Address -->
                        <div class="flex items-start p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mr-4 mt-1">
                                <i class="fas fa-map-marker-alt text-white text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Visit Our Office</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Block 1 lot 10, Southpoint Subdivision<br>
                                    Brgy Banay-Banay, Cabuyao, Laguna<br>
                                    Philippines
                                </p>
                            </div>
                        </div>
                        
                        <!-- Date & Time -->
                        <div class="flex items-center p-6 bg-white rounded-xl shadow-md">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-calendar-alt text-white text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Current Date & Time</h3>
                                <p class="text-primary-600 font-semibold"><?php include_once("php_includes/date_time.php"); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Contact Form -->
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Quick Contact</h3>
                    <form class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200" placeholder="Your full name">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200" placeholder="your.email@example.com">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                            <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200" placeholder="How can we help you?"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-gradient-to-r from-primary-600 to-primary-700 text-white px-6 py-3 rounded-lg font-semibold hover:from-primary-700 hover:to-primary-800 transition-all duration-300 transform hover:scale-[1.02] shadow-lg">
                            <i class="fas fa-paper-plane mr-2"></i>Send Message
                        </button>
                    </form>
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

    <!-- Floating Action Button -->
    <div class="floating-action">
        <a href="book.php" class="bg-gradient-to-r from-orange-500 to-red-500 text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-300 animate-pulse">
            <i class="fas fa-ticket-alt text-lg"></i>
        </a>
    </div>

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-20 right-4 bg-gray-900 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg opacity-0 invisible transition-all duration-300 hover:bg-primary-600 z-40">
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
            
            // Image slider functionality
            const slides = document.querySelectorAll('.slider-slide');
            const dots = document.querySelectorAll('.slider-dot');
            const prevButton = document.getElementById('prevSlide');
            const nextButton = document.getElementById('nextSlide');
            let currentSlide = 0;
            
            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.toggle('active', i === index);
                });
                dots.forEach((dot, i) => {
                    dot.classList.toggle('active', i === index);
                    if (i === index) {
                        dot.classList.add('bg-opacity-100');
                        dot.classList.remove('bg-opacity-50');
                    } else {
                        dot.classList.add('bg-opacity-50');
                        dot.classList.remove('bg-opacity-100');
                    }
                });
                currentSlide = index;
            }
            
            function nextSlide() {
                showSlide((currentSlide + 1) % slides.length);
            }
            
            function prevSlide() {
                showSlide((currentSlide - 1 + slides.length) % slides.length);
            }
            
            // Auto-slide functionality
            setInterval(nextSlide, 5000);
            
            // Navigation buttons
            if (nextButton) nextButton.addEventListener('click', nextSlide);
            if (prevButton) prevButton.addEventListener('click', prevSlide);
            
            // Dot navigation
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => showSlide(index));
            });
            
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
            
            // Form submission handling
            const contactForm = document.querySelector('form');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    // Get form data
                    const formData = new FormData(this);
                    const name = formData.get('name');
                    const email = formData.get('email');
                    const message = formData.get('message');
                    
                    // Basic validation
                    if (!name || !email || !message) {
                        alert('Please fill in all fields.');
                        return;
                    }
                    
                    if (!isValidEmail(email)) {
                        alert('Please enter a valid email address.');
                        return;
                    }
                    
                    // Here you would typically send the data to your server
                    // For now, we'll just show a success message
                    alert('Thank you for your message! We\'ll get back to you soon.');
                    this.reset();
                });
            }
            
            // Email validation function
            function isValidEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }
            
            // Add loading animation to buttons on click
            document.querySelectorAll('button, .btn').forEach(button => {
                button.addEventListener('click', function() {
                    if (this.type === 'submit') {
                        const originalText = this.innerHTML;
                        this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Processing...';
                        this.disabled = true;
                        
                        // Re-enable after 3 seconds (adjust as needed)
                        setTimeout(() => {
                            this.innerHTML = originalText;
                            this.disabled = false;
                        }, 3000);
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
            
            // Observe all feature cards and sections
            document.querySelectorAll('.grid > div, section > div').forEach(el => {
                observer.observe(el);
            });
        });
        
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('nav');
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-xl');
                navbar.classList.add('bg-white');
            } else {
                navbar.classList.remove('shadow-xl');
            }
        });
        
        // Prevent default form submission for demo
        document.addEventListener('submit', function(e) {
            e.preventDefault();
            return false;
        });
    </script>
</body>
</html>