<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Terminals - Dimple Star Transport</title>
    <meta name="description" content="Find Dimple Star Transport terminal locations. Espana Terminal in Manila and San Jose Terminal in Occidental Mindoro with maps and contact information.">
    
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
                        'slide-in-left': 'slideInLeft 0.8s ease-out',
                        'bounce-gentle': 'bounceGentle 2s infinite',
                        'scale-in': 'scaleIn 0.5s ease-out',
                        'pulse-slow': 'pulse 3s infinite',
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
                        slideInLeft: {
                            '0%': { opacity: '0', transform: 'translateX(-30px)' },
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
        .terminal-card {
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .map-container {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        .map-container iframe {
            transition: transform 0.3s ease;
        }
        .map-container:hover iframe {
            transform: scale(1.02);
        }
        .contact-badge {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }
        .location-badge {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
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
                        <a href="terminal.php" class="bg-primary-100 text-primary-700 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Terminals</a>
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
                <a href="about.php" class="text-gray-600 hover:bg-gray-100 hover:text-primary-600 block px-3 py-2 rounded-md text-base font-medium">About Us</a>
                <a href="terminal.php" class="bg-primary-100 text-primary-700 block px-3 py-2 rounded-md text-base font-medium">Terminals</a>
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
                <h1 class="text-4xl sm:text-5xl font-bold mb-4 animate-fade-in-up">Our Terminals</h1>
                <p class="text-xl text-blue-100 max-w-3xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s;">
                    Conveniently located terminals to serve your travel needs across Manila and Mindoro
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

    <!-- Terminals Overview -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                <!-- Quick Stats -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-xl border border-blue-100">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-map-marker-alt text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">2 Strategic Locations</h3>
                    </div>
                    <p class="text-gray-700">Serving Metro Manila and Occidental Mindoro with convenient terminal locations</p>
                </div>
                
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-6 rounded-xl border border-green-100">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-clock text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Daily Operations</h3>
                    </div>
                    <p class="text-gray-700">Operating daily to ensure reliable transportation services for all passengers</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Terminal Locations -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Espana Terminal -->
            <div class="mb-20 animate-fade-in-up">
                <div class="terminal-card rounded-2xl p-8 hover:shadow-2xl transition-all duration-300">
                    <!-- Terminal Header -->
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
                        <div class="mb-4 lg:mb-0">
                            <div class="flex items-center mb-4">
                                <div class="location-badge w-14 h-14 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-building text-white text-2xl"></i>
                                </div>
                                <div>
                                    <h2 class="text-3xl font-bold text-gray-900">Espana Terminal</h2>
                                    <p class="text-gray-600">Manila, Metro Manila</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Contact Info -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <div class="contact-badge text-white px-4 py-3 rounded-xl shadow-lg">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-phone text-lg"></i>
                                    <div>
                                        <div class="text-sm font-medium">Primary</div>
                                        <div class="font-bold">+63.02.985.1451</div>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-badge text-white px-4 py-3 rounded-xl shadow-lg">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-mobile-alt text-lg"></i>
                                    <div>
                                        <div class="text-sm font-medium">Mobile</div>
                                        <div class="font-bold">+63.908.926.9163</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Map and Details -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Map -->
                        <div class="lg:col-span-2">
                            <div class="map-container">
                                <iframe 
                                    width="100%" 
                                    height="350" 
                                    frameborder="0" 
                                    scrolling="no" 
                                    marginheight="0" 
                                    marginwidth="0" 
                                    src="https://maps.google.com.ph/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Dimple+Star,+836BAntipoloStSampaloc,521,Manila,&amp;aq=0&amp;oq=Metro+Manila&amp;sll=14.6125312,120.9948033&amp;sspn=0.011772,0.021136&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Dimple+Star&amp;ll=14.6125312,120.9948033&amp;spn=0.011772,0.021136&amp;z=14&amp;output=embed"
                                    loading="lazy">
                                </iframe>
                            </div>
                            <div class="mt-4 text-center">
                                <a href="https://www.google.com/maps/place/Dimple+Star/@14.6125312,120.9948033,770m/data=!3m2!1e3!4b1!4m2!3m1!1s0x3397b60300001d5d:0xd30645794daddf84?hl=en;z=14" 
                                   target="_blank" 
                                   class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium shadow-md">
                                    <i class="fas fa-external-link-alt mr-2"></i>
                                    View Larger Map
                                </a>
                            </div>
                        </div>

                        <!-- Terminal Info -->
                        <div class="space-y-6">
                            <!-- Address -->
                            <div class="bg-gradient-to-br from-gray-50 to-blue-50 p-6 rounded-xl">
                                <div class="flex items-start mb-3">
                                    <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mr-3 mt-1">
                                        <i class="fas fa-map-marker-alt text-white"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-2">Address</h4>
                                        <p class="text-gray-700 leading-relaxed">
                                            836B Antipolo Street, Sampaloc<br>
                                            Manila, Metro Manila<br>
                                            Philippines
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Services -->
                            <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-6 rounded-xl">
                                <div class="flex items-start mb-3">
                                    <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-bus text-white"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-3">Services Available</h4>
                                        <ul class="space-y-2 text-gray-700">
                                            <li class="flex items-center">
                                                <i class="fas fa-check text-green-500 mr-2"></i>
                                                Ticket Booking
                                            </li>
                                            <li class="flex items-center">
                                                <i class="fas fa-check text-green-500 mr-2"></i>
                                                Waiting Area
                                            </li>
                                            <li class="flex items-center">
                                                <i class="fas fa-check text-green-500 mr-2"></i>
                                                Information Desk
                                            </li>
                                            <li class="flex items-center">
                                                <i class="fas fa-check text-green-500 mr-2"></i>
                                                Restroom Facilities
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Routes -->
                            <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-6 rounded-xl">
                                <div class="flex items-start mb-3">
                                    <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-route text-white"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-3">Primary Routes</h4>
                                        <div class="space-y-2">
                                            <span class="inline-block bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-medium">Manila ↔ Mindoro</span>
                                            <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">Express Services</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="flex items-center justify-center mb-20">
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent flex-1"></div>
                <div class="mx-4 p-3 bg-white rounded-full shadow-md">
                    <i class="fas fa-bus text-primary-500 text-xl"></i>
                </div>
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent flex-1"></div>
            </div>

            <!-- San Jose Terminal -->
            <div class="animate-slide-in-right">
                <div class="terminal-card rounded-2xl p-8 hover:shadow-2xl transition-all duration-300">
                    <!-- Terminal Header -->
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
                        <div class="mb-4 lg:mb-0">
                            <div class="flex items-center mb-4">
                                <div class="location-badge w-14 h-14 rounded-full flex items-center justify-center mr-4" style="background: linear-gradient(135deg, #059669 0%, #047857 100%);">
                                    <i class="fas fa-mountain text-white text-2xl"></i>
                                </div>
                                <div>
                                    <h2 class="text-3xl font-bold text-gray-900">San Jose Terminal</h2>
                                    <p class="text-gray-600">Occidental Mindoro</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Contact Info -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <div class="contact-badge text-white px-4 py-3 rounded-xl shadow-lg" style="background: linear-gradient(135deg, #059669 0%, #047857 100%);">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-phone text-lg"></i>
                                    <div>
                                        <div class="text-sm font-medium">Primary</div>
                                        <div class="font-bold">+63.02.6684151</div>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-badge text-white px-4 py-3 rounded-xl shadow-lg" style="background: linear-gradient(135deg, #059669 0%, #047857 100%);">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-mobile-alt text-lg"></i>
                                    <div>
                                        <div class="text-sm font-medium">Mobile</div>
                                        <div class="font-bold">+63.921.568.6449</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Map and Details -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Map -->
                        <div class="lg:col-span-2">
                            <div class="map-container">
                                <iframe 
                                    width="100%" 
                                    height="350" 
                                    frameborder="0" 
                                    scrolling="no" 
                                    marginheight="0" 
                                    marginwidth="0" 
                                    src="https://maps.google.com.ph/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Dimple+Star+Transport,+BonifacioSt,SanJose,OccidentalMindoro,&amp;aq=0&amp;oq=&amp;sll=12.3540632,121.0618653&amp;sspn=0.011772,0.021136&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Dimple+Star+Transport&amp;ll=12.3540632,121.0618653&amp;spn=0.011772,0.021136&amp;z=14&amp;output=embed"
                                    loading="lazy">
                                </iframe>
                            </div>
                            <div class="mt-4 text-center">
                                <a href="https://www.google.com/maps/place/Dimple+Star+Transport/@14.6143711,120.9841972,458m/data=!3m2!1e3!4b1!4m2!3m1!1s0x3397b5fe6f7ebf6b:0xc34baa5ed38261eb?hl=en;z=14" 
                                   target="_blank" 
                                   class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200 font-medium shadow-md">
                                    <i class="fas fa-external-link-alt mr-2"></i>
                                    View Larger Map
                                </a>
                            </div>
                        </div>

                        <!-- Terminal Info -->
                        <div class="space-y-6">
                            <!-- Address -->
                            <div class="bg-gradient-to-br from-gray-50 to-green-50 p-6 rounded-xl">
                                <div class="flex items-start mb-3">
                                    <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center mr-3 mt-1">
                                        <i class="fas fa-map-marker-alt text-white"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-2">Address</h4>
                                        <p class="text-gray-700 leading-relaxed">
                                            Bonifacio Street<br>
                                            San Jose, Occidental Mindoro<br>
                                            Philippines
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Services -->
                            <div class="bg-gradient-to-br from-emerald-50 to-teal-50 p-6 rounded-xl">
                                <div class="flex items-start mb-3">
                                    <div class="w-10 h-10 bg-emerald-500 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-bus text-white"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-3">Services Available</h4>
                                        <ul class="space-y-2 text-gray-700">
                                            <li class="flex items-center">
                                                <i class="fas fa-check text-emerald-500 mr-2"></i>
                                                Ticket Booking
                                            </li>
                                            <li class="flex items-center">
                                                <i class="fas fa-check text-emerald-500 mr-2"></i>
                                                Waiting Area
                                            </li>
                                            <li class="flex items-center">
                                                <i class="fas fa-check text-emerald-500 mr-2"></i>
                                                Information Desk
                                            </li>
                                            <li class="flex items-center">
                                                <i class="fas fa-check text-emerald-500 mr-2"></i>
                                                Restroom Facilities
                                            </li>
                                            <li class="flex items-center">
                                                <i class="fas fa-check text-emerald-500 mr-2"></i>
                                                Local Transportation Links
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Routes -->
                            <div class="bg-gradient-to-br from-teal-50 to-cyan-50 p-6 rounded-xl">
                                <div class="flex items-start mb-3">
                                    <div class="w-10 h-10 bg-teal-500 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-route text-white"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-3">Primary Routes</h4>
                                        <div class="space-y-2">
                                            <span class="inline-block bg-teal-100 text-teal-800 px-3 py-1 rounded-full text-sm font-medium">Mindoro ↔ Manila</span>
                                            <span class="inline-block bg-emerald-100 text-emerald-800 px-3 py-1 rounded-full text-sm font-medium">Provincial Services</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Information -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Terminal Information</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Everything you need to know for a smooth travel experience
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Operating Hours -->
                <div class="text-center p-8 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-clock text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Operating Hours</h3>
                    <p class="text-gray-600 mb-4">Our terminals operate daily to serve your travel needs</p>
                    <div class="text-lg font-semibold text-blue-600">24/7 Service Available</div>
                </div>

                <!-- Safety Measures -->
                <div class="text-center p-8 bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-shield-alt text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Safety Measures</h3>
                    <p class="text-gray-600 mb-4">Your safety is our priority with comprehensive security protocols</p>
                    <div class="text-lg font-semibold text-green-600">24/7 Security</div>
                </div>

                <!-- Accessibility -->
                <div class="text-center p-8 bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-wheelchair text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Accessibility</h3>
                    <p class="text-gray-600 mb-4">Wheelchair accessible facilities and assistance available</p>
                    <div class="text-lg font-semibold text-purple-600">Full Access</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mt-16 text-center">
                <div class="inline-flex flex-col sm:flex-row gap-4">
                    <a href="book.php" class="bg-gradient-to-r from-primary-600 to-primary-700 text-white px-8 py-4 rounded-xl text-lg font-semibold hover:from-primary-700 hover:to-primary-800 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-ticket-alt mr-2"></i>Book Your Trip Now
                    </a>
                    <a href="routeschedule.php" class="bg-gradient-to-r from-gray-600 to-gray-700 text-white px-8 py-4 rounded-xl text-lg font-semibold hover:from-gray-700 hover:to-gray-800 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-route mr-2"></i>View Schedules
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Support -->
    <section class="py-16 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-headset text-2xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Need Assistance?</h3>
                <p class="text-gray-600 mb-8">
                    Our customer service team is ready to help you with terminal information, 
                    directions, or any questions about your journey.
                </p>
                <div class="flex flex-col sm:flex-row justify-center items-center gap-6">
                    <div class="flex items-center bg-green-50 px-6 py-3 rounded-xl border border-green-200">
                        <i class="fas fa-phone text-green-600 text-lg mr-3"></i>
                        <div>
                            <div class="text-sm text-gray-600">Call us at</div>
                            <div class="font-bold text-gray-900">0929 209 0712</div>
                        </div>
                    </div>
                    <div class="text-gray-400">or</div>
                    <a href="contact.php" class="bg-primary-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-primary-700 transition-colors duration-200">
                        <i class="fas fa-envelope mr-2"></i>Send us a Message
                    </a>
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
                        <li><a href="about.php" class="text-gray-400 hover:text-white transition-colors duration-200">About Us</a></li>
                        <li><a href="routeschedule.php" class="text-gray-400 hover:text-white transition-colors duration-200">Routes & Schedules</a></li>
                        <li><a href="book.php" class="text-gray-400 hover:text-white transition-colors duration-200">Book Now</a></li>
                        <li><a href="contact.php" class="text-gray-400 hover:text-white transition-colors duration-200">Contact Us</a></li>
                    </ul>
                </div>
                
                <!-- Terminal Locations -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Our Terminals</h3>
                    <ul class="space-y-2">
                        <li class="text-gray-400">Espana Terminal, Manila</li>
                        <li class="text-gray-400">San Jose Terminal, Mindoro</li>
                        <li><a href="tel:+63029851451" class="text-gray-400 hover:text-white transition-colors duration-200">+63.02.985.1451</a></li>
                        <li><a href="tel:+63026684151" class="text-gray-400 hover:text-white transition-colors duration-200">+63.02.668.4151</a></li>
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
            
            // Enhanced scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animationPlayState = 'running';
                        entry.target.classList.add('animate-in');
                    }
                });
            }, observerOptions);
            
            // Observe all animated elements
            document.querySelectorAll('.animate-fade-in-up, .animate-slide-in-right, .animate-slide-in-left, .animate-scale-in').forEach(el => {
                el.style.animationPlayState = 'paused';
                observer.observe(el);
            });
            
            // Navbar scroll effect
            const navbar = document.querySelector('nav');
            let lastScrollTop = 0;
            
            window.addEventListener('scroll', function() {
                let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                if (scrollTop > 100) {
                    navbar.classList.add('shadow-xl', 'bg-white');
                } else {
                    navbar.classList.remove('shadow-xl');
                }
                
                lastScrollTop = scrollTop;
            });
            
            // Enhanced card hover effects
            const terminalCards = document.querySelectorAll('.terminal-card');
            
            terminalCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px) scale(1.01)';
                    this.style.boxShadow = '0 25px 50px rgba(0, 0, 0, 0.15)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                    this.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.1)';
                });
            });
            
            // Map interaction enhancements
            const mapContainers = document.querySelectorAll('.map-container');
            
            mapContainers.forEach(container => {
                const iframe = container.querySelector('iframe');
                
                container.addEventListener('mouseenter', function() {
                    this.style.boxShadow = '0 20px 40px rgba(0, 0, 0, 0.15)';
                });
                
                container.addEventListener('mouseleave', function() {
                    this.style.boxShadow = '0 15px 35px rgba(0, 0, 0, 0.1)';
                });
            });
            
            // Phone number click tracking
            document.querySelectorAll('a[href^="tel:"]').forEach(tel => {
                tel.addEventListener('click', function() {
                    console.log('Phone number clicked:', this.href);
                });
            });
            
            // Smooth scrolling for internal links
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
            
            // Loading states for external links
            document.querySelectorAll('a[href^="http"]').forEach(link => {
                link.addEventListener('click', function(e) {
                    if (this.target === '_blank') {
                        const originalText = this.innerHTML;
                        this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Opening...';
                        
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
                const rate = scrolled * -0.3;
                heroSection.style.transform = `translateY(${rate}px)`;
            }
        });
        
        // Progressive enhancement for map loading
        function optimizeMapLoading() {
            const iframes = document.querySelectorAll('iframe[src*="maps.google"]');
            
            iframes.forEach(iframe => {
                // Add loading placeholder
                const placeholder = document.createElement('div');
                placeholder.className = 'absolute inset-0 bg-gray-200 flex items-center justify-center';
                placeholder.innerHTML = '<i class="fas fa-map text-4xl text-gray-400"></i>';
                
                iframe.parentNode.style.position = 'relative';
                iframe.parentNode.appendChild(placeholder);
                
                iframe.onload = function() {
                    placeholder.style.opacity = '0';
                    setTimeout(() => placeholder.remove(), 300);
                };
            });
        }
        
        // Initialize map optimization
        window.addEventListener('load', optimizeMapLoading);
    </script>
</body>
</html>