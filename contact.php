<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us - Dimple Star Transport</title>
    <meta name="description" content="Get in touch with Dimple Star Transport. Send us a message or visit our office for all your bus transportation needs.">
    
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
                        'bounce-gentle': 'bounceGentle 2s infinite',
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
                        },
                        bounceGentle: {
                            '0%, 20%, 53%, 80%, 100%': { transform: 'translateY(0px)' },
                            '40%, 43%': { transform: 'translateY(-15px)' },
                            '70%': { transform: 'translateY(-8px)' },
                            '90%': { transform: 'translateY(-2px)' },
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
        .contact-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .contact-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        .map-container {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
        }
        .map-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(59, 130, 246, 0.1) 0%, rgba(147, 197, 253, 0.1) 100%);
            pointer-events: none;
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
                        <a href="routeschedule.php" class="text-gray-600 hover:bg-gray-100 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Routes & Schedules</a>
                        <a href="contact.php" class="bg-primary-100 text-primary-700 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Contact</a>
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
                <a href="routeschedule.php" class="text-gray-600 hover:bg-gray-100 hover:text-primary-600 block px-3 py-2 rounded-md text-base font-medium">Routes & Schedules</a>
                <a href="contact.php" class="bg-primary-100 text-primary-700 block px-3 py-2 rounded-md text-base font-medium">Contact</a>
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
                <h1 class="text-4xl sm:text-5xl font-bold mb-4">Contact Us</h1>
                <p class="text-xl text-blue-100 mb-6 max-w-3xl mx-auto">
                    Get in touch with us for any inquiries, support, or feedback. We're here to help make your journey better.
                </p>
                <div class="flex items-center justify-center space-x-2 text-blue-100">
                    <i class="fas fa-clock text-lg"></i>
                    <span class="font-medium"><?php include_once("php_includes/date_time.php"); ?></span>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Contact Bar -->
    <section class="py-6 bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row justify-center items-center space-y-4 lg:space-y-0 lg:space-x-8">
                <div class="flex items-center space-x-3 text-gray-700">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-phone text-green-600 text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Call Us Now</p>
                        <p class="font-semibold">0929 209 0712</p>
                    </div>
                </div>
                
                <div class="hidden lg:block w-px h-12 bg-gray-300"></div>
                
                <div class="flex items-center space-x-3 text-gray-700">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-envelope text-blue-600 text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Email Us</p>
                        <p class="font-semibold">info@dimplestar.com</p>
                    </div>
                </div>
                
                <div class="hidden lg:block w-px h-12 bg-gray-300"></div>
                
                <div class="flex items-center space-x-3 text-gray-700">
                    <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-clock text-orange-600 text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Business Hours</p>
                        <p class="font-semibold">24/7 Service</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Information -->
                <div class="space-y-8">
                    <!-- Office Info Card -->
                    <div class="contact-card bg-white rounded-2xl shadow-xl p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-r from-primary-500 to-primary-600 rounded-2xl flex items-center justify-center mr-4">
                                <i class="fas fa-building text-white text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900">Main Office</h3>
                                <p class="text-gray-600">Visit us at our headquarters</p>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <i class="fas fa-map-marker-alt text-red-500 mt-1"></i>
                                <div>
                                    <p class="font-semibold text-gray-900">Address</p>
                                    <p class="text-gray-600">Block 1 lot 10, Southpoint Subd.<br>Brgy Banay-Banay, Cabuyao, Laguna</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3">
                                <i class="fas fa-phone text-green-500 mt-1"></i>
                                <div>
                                    <p class="font-semibold text-gray-900">Phone</p>
                                    <p class="text-gray-600">0929 209 0712</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3">
                                <i class="fas fa-envelope text-blue-500 mt-1"></i>
                                <div>
                                    <p class="font-semibold text-gray-900">Email</p>
                                    <p class="text-gray-600">info@dimplestar.com</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3">
                                <i class="fas fa-clock text-orange-500 mt-1"></i>
                                <div>
                                    <p class="font-semibold text-gray-900">Operating Hours</p>
                                    <p class="text-gray-600">24/7 - Always ready to serve you</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Services Card -->
                    <div class="contact-card bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl border border-blue-200 p-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-6">How Can We Help?</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-ticket-alt text-primary-500"></i>
                                <span class="text-gray-700">Booking Assistance</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-route text-green-500"></i>
                                <span class="text-gray-700">Route Information</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-clock text-orange-500"></i>
                                <span class="text-gray-700">Schedule Updates</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-headset text-blue-500"></i>
                                <span class="text-gray-700">Customer Support</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-comments text-purple-500"></i>
                                <span class="text-gray-700">Feedback</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-question-circle text-red-500"></i>
                                <span class="text-gray-700">General Inquiries</span>
                            </div>
                        </div>
                    </div>

                    <!-- Emergency Contact -->
                    <div class="contact-card bg-gradient-to-r from-red-500 to-red-600 rounded-2xl p-8 text-white">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-exclamation-triangle text-yellow-300 text-2xl mr-3 animate-bounce-gentle"></i>
                            <h3 class="text-xl font-bold">Emergency Contact</h3>
                        </div>
                        <p class="mb-4">For urgent assistance or emergencies during your travel:</p>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone"></i>
                            <span class="text-xl font-bold">0929 209 0712</span>
                        </div>
                        <p class="text-sm text-red-100 mt-2">Available 24/7 for emergency support</p>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="contact-card bg-white rounded-2xl shadow-xl p-8">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Send Us a Message</h3>
                        <p class="text-gray-600">Fill out the form below and we'll get back to you as soon as possible.</p>
                    </div>

                    <form class="space-y-6" action="messageexec.php" method="POST" id="contactForm">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                required
                                class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200"
                                placeholder="Enter your full name"
                            >
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                Email Address <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                required
                                class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200"
                                placeholder="example@email.com"
                            >
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">
                                Subject <span class="text-red-500">*</span>
                            </label>
                            <select 
                                id="subject" 
                                name="subject" 
                                required
                                class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200"
                            >
                                <option value="">Select a subject</option>
                                <option value="Booking Inquiry">Booking Inquiry</option>
                                <option value="Route Information">Route Information</option>
                                <option value="Schedule Update">Schedule Update</option>
                                <option value="Customer Feedback">Customer Feedback</option>
                                <option value="Complaint">Complaint</option>
                                <option value="General Inquiry">General Inquiry</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                                Message <span class="text-red-500">*</span>
                            </label>
                            <textarea 
                                id="message" 
                                name="message" 
                                rows="5" 
                                required
                                class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200 resize-none"
                                placeholder="Please describe your inquiry in detail..."
                            ></textarea>
                            <div class="mt-1 text-sm text-gray-500">
                                <span id="charCount">0</span>/500 characters
                            </div>
                        </div>

                        <!-- reCAPTCHA placeholder -->
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                            <div class="flex items-center space-x-3">
                                <input type="checkbox" id="recaptcha" class="w-4 h-4 text-primary-600">
                                <label for="recaptcha" class="text-sm text-gray-700">I'm not a robot</label>
                                <div class="ml-auto">
                                    <i class="fas fa-shield-alt text-green-500"></i>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-4">
                            <div class="flex items-center space-x-2 text-sm text-gray-500">
                                <i class="fas fa-lock"></i>
                                <span>Your information is secure with us</span>
                            </div>
                            <button 
                                type="submit" 
                                class="bg-gradient-to-r from-primary-600 to-primary-700 text-white px-8 py-3 rounded-lg font-semibold hover:from-primary-700 hover:to-primary-800 transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center space-x-2"
                                id="submitBtn"
                            >
                                <i class="fas fa-paper-plane"></i>
                                <span>Send Message</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Find Our Office</h2>
                <p class="text-xl text-gray-600">Visit us at our main office in Cabuyao, Laguna</p>
            </div>
            
            <!-- Map Placeholder -->
            <div class="map-container bg-gradient-to-br from-blue-100 to-purple-100 h-96 rounded-2xl flex items-center justify-center shadow-lg">
                <div class="map-overlay"></div>
                <div class="text-center z-10">
                    <i class="fas fa-map-marked-alt text-6xl text-primary-500 mb-4"></i>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Interactive Map</h3>
                    <p class="text-gray-600 mb-4">Block 1 lot 10, Southpoint Subd., Brgy Banay-Banay, Cabuyao, Laguna</p>
                    <a href="https://maps.google.com" target="_blank" class="bg-primary-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-700 transition-colors duration-200 inline-flex items-center space-x-2">
                        <i class="fas fa-external-link-alt"></i>
                        <span>Open in Google Maps</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
                <p class="text-xl text-gray-600">Quick answers to common questions</p>
            </div>
            
            <div class="space-y-4">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <button class="faq-toggle w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors duration-200">
                        <span class="font-semibold text-gray-900">How can I book a ticket?</span>
                        <i class="fas fa-chevron-down text-gray-400 transform transition-transform duration-200"></i>
                    </button>
                    <div class="faq-content hidden px-6 pb-4">
                        <p class="text-gray-600">You can book tickets through our website by clicking "Book Now" or by visiting any of our terminals. Online booking is available 24/7 for your convenience.</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <button class="faq-toggle w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors duration-200">
                        <span class="font-semibold text-gray-900">What are your operating hours?</span>
                        <i class="fas fa-chevron-down text-gray-400 transform transition-transform duration-200"></i>
                    </button>
                    <div class="faq-content hidden px-6 pb-4">
                        <p class="text-gray-600">We operate 24/7 with buses departing at scheduled times throughout the day. Our customer service is also available around the clock for assistance.</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <button class="faq-toggle w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors duration-200">
                        <span class="font-semibold text-gray-900">Can I cancel or modify my booking?</span>
                        <i class="fas fa-chevron-down text-gray-400 transform transition-transform duration-200"></i>
                    </button>
                    <div class="faq-content hidden px-6 pb-4">
                        <p class="text-gray-600">Yes, you can cancel or modify your booking up to 2 hours before departure. Please contact our customer service or visit your nearest terminal for assistance.</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <button class="faq-toggle w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors duration-200">
                        <span class="font-semibold text-gray-900">Do you offer group discounts?</span>
                        <i class="fas fa-chevron-down text-gray-400 transform transition-transform duration-200"></i>
                    </button>
                    <div class="faq-content hidden px-6 pb-4">
                        <p class="text-gray-600">Yes, we offer special group rates for 10 or more passengers. Contact us for more information about group bookings and corporate packages.</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <button class="faq-toggle w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors duration-200">
                        <span class="font-semibold text-gray-900">How long does it take to get a response to my message?</span>
                        <i class="fas fa-chevron-down text-gray-400 transform transition-transform duration-200"></i>
                    </button>
                    <div class="faq-content hidden px-6 pb-4">
                        <p class="text-gray-600">We typically respond to messages within 2-4 hours during business hours. For urgent matters, please call our hotline at 0929 209 0712.</p>
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
                
                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Info</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-map-marker-alt text-sm"></i>
                            <span class="text-sm">Cabuyao, Laguna</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-phone text-sm"></i>
                            <span class="text-sm">0929 209 0712</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-envelope text-sm"></i>
                            <span class="text-sm">info@dimplestar.com</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-clock text-sm"></i>
                            <span class="text-sm">24/7 Service</span>
                        </li>
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
        <a href="book.php" class="bg-gradient-to-r from-green-500 to-green-600 text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-300 animate-pulse-gentle">
            <i class="fas fa-ticket-alt text-lg"></i>
        </a>
    </div>

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-20 right-6 bg-gray-900 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg opacity-0 invisible transition-all duration-300 hover:bg-primary-600 z-40">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl p-8 max-w-md mx-4 animate-fade-in-up">
            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-check text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Message Sent!</h3>
                <p class="text-gray-600 mb-6">Thank you for contacting us. We'll get back to you within 2-4 hours.</p>
                <button onclick="closeModal()" class="bg-primary-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-primary-700 transition-colors duration-200">
                    Close
                </button>
            </div>
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
            
            // FAQ Toggle
            document.querySelectorAll('.faq-toggle').forEach(button => {
                button.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    const icon = this.querySelector('i');
                    
                    if (content.classList.contains('hidden')) {
                        content.classList.remove('hidden');
                        content.style.maxHeight = content.scrollHeight + 'px';
                        icon.style.transform = 'rotate(180deg)';
                    } else {
                        content.style.maxHeight = '0';
                        setTimeout(() => {
                            content.classList.add('hidden');
                        }, 300);
                        icon.style.transform = 'rotate(0deg)';
                    }
                });
            });
            
            // Character counter for message textarea
            const messageTextarea = document.getElementById('message');
            const charCount = document.getElementById('charCount');
            
            if (messageTextarea && charCount) {
                messageTextarea.addEventListener('input', function() {
                    const count = this.value.length;
                    charCount.textContent = count;
                    
                    if (count > 450) {
                        charCount.classList.add('text-red-500');
                    } else if (count > 400) {
                        charCount.classList.add('text-yellow-500');
                        charCount.classList.remove('text-red-500');
                    } else {
                        charCount.classList.remove('text-red-500', 'text-yellow-500');
                    }
                    
                    if (count >= 500) {
                        this.value = this.value.substring(0, 500);
                        charCount.textContent = '500';
                    }
                });
            }
            
            // Form submission
            const contactForm = document.getElementById('contactForm');
            const submitBtn = document.getElementById('submitBtn');
            
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    // Show loading state
                    const originalHTML = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i><span>Sending...</span>';
                    submitBtn.disabled = true;
                    
                    // Simulate form submission (replace with actual form submission)
                    setTimeout(() => {
                        showSuccessModal();
                        contactForm.reset();
                        document.getElementById('charCount').textContent = '0';
                        
                        // Reset button
                        submitBtn.innerHTML = originalHTML;
                        submitBtn.disabled = false;
                    }, 2000);
                });
            }
            
            // Input focus effects
            document.querySelectorAll('.form-input').forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('focused');
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
        });
        
        // Success modal functions
        function showSuccessModal() {
            document.getElementById('successModal').classList.remove('hidden');
        }
        
        function closeModal() {
            document.getElementById('successModal').classList.add('hidden');
        }
        
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('nav');
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-xl');
            } else {
                navbar.classList.remove('shadow-xl');
            }
        });
        
        // Form validation
        function validateForm() {
            const form = document.getElementById('contactForm');
            const inputs = form.querySelectorAll('input[required], textarea[required], select[required]');
            let isValid = true;
            
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('border-red-500');
                } else {
                    input.classList.remove('border-red-500');
                }
            });
            
            return isValid;
        }
        
        // Real-time validation
        document.querySelectorAll('input, textarea, select').forEach(field => {
            field.addEventListener('blur', function() {
                if (this.hasAttribute('required') && !this.value.trim()) {
                    this.classList.add('border-red-500');
                } else {
                    this.classList.remove('border-red-500');
                }
            });
        });
    </script>
</body>
</html>