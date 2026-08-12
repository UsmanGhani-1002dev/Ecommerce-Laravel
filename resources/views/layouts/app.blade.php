<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'LA-AYAT') }}</title>

        <link href="{{ asset('favicon.ico') }}" rel="shortcut icon" type="image/x-icon" />
        <!-- Google Fonts: Syne & Outfit -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Syne:wght@500;600;700;800&display=swap" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>
        
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: '#B5764B',
                            secondary: '#915c37',
                        },
                        fontFamily: {
                            sans: ['"Outfit"', 'sans-serif'],
                            syne: ['"Syne"', 'sans-serif'],
                        },
                        container: {
                            center: true,
                            padding: '1rem',
                            screens: {
                                xl: '1200px',
                            },
                        }
                    }
                }
            }
        </script>
        
        <!-- Icons: RemixIcon & FontAwesome 6 -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
        <link rel="stylesheet" href="{{ asset('assets/css/plugins/pe-icon-7-stroke.css') }}" />
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
        
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-600 antialiased">

        <header class="hidden lg:block bg-white/90 backdrop-blur sticky top-0 z-50 border-b border-black/5">
            <div class="container mx-auto">
                <div class="grid grid-cols-3 items-center py-5">

                    <!-- Left: Primary Nav -->
                    <nav>
                        <ul class="flex items-center gap-9 text-[13px] font-semibold tracking-[0.12em] uppercase text-[#1a1a1a]">
                            <li><a href="{{ route('home.index') }}" class="relative hover:text-primary transition-colors after:absolute after:left-0 after:-bottom-1.5 after:h-px after:w-0 after:bg-primary hover:after:w-full after:transition-all after:duration-300">Women</a></li>
                            <li><a href="{{ route('home.index') }}" class="relative hover:text-primary transition-colors after:absolute after:left-0 after:-bottom-1.5 after:h-px after:w-0 after:bg-primary hover:after:w-full after:transition-all after:duration-300">Men</a></li>
                            <li><a href="{{ route('home.index') }}" class="relative hover:text-primary transition-colors after:absolute after:left-0 after:-bottom-1.5 after:h-px after:w-0 after:bg-primary hover:after:w-full after:transition-all after:duration-300">New In</a></li>
                            <li><a href="{{ route('home.index') }}" class="relative text-primary hover:opacity-70 transition-opacity">Sale</a></li>
                        </ul>
                    </nav>

                    <!-- Center: Logo -->
                    <div class="flex justify-center">
                        <a href="{{ route('home.index') }}" class="font-syne text-2xl font-extrabold tracking-[0.15em] text-[#1a1a1a]">
                            LA·AYAT
                        </a>
                    </div>

                    <!-- Right: Actions -->
                    <div class="flex justify-end items-center gap-6 text-[#1a1a1a]">
                        <div class="relative group">
                            <button class="text-xl hover:text-primary transition-colors" aria-label="Search"><i class="ri-search-line"></i></button>
                            <div class="absolute right-0 mt-3 w-72 bg-white border border-black/5 shadow-xl p-3 rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                                <form class="flex items-center gap-2">
                                    <input type="text" placeholder="Search the store..." class="w-full bg-gray-100 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-primary transition" />
                                    <button class="w-10 h-10 shrink-0 bg-[#1a1a1a] text-white rounded-lg flex items-center justify-center hover:bg-primary transition-colors"><i class="ri-search-line"></i></button>
                                </form>
                            </div>
                        </div>

                        <a href="wishlist.php" class="text-xl hover:text-primary transition-colors" aria-label="Wishlist"><i class="ri-heart-line"></i></a>

                        <a href="cart.php" class="text-xl hover:text-primary transition-colors relative" aria-label="Cart">
                            <i class="ri-shopping-bag-line"></i>
                            <span class="absolute -top-2 -right-2 bg-primary text-white text-[10px] font-bold rounded-full w-4.5 h-4.5 min-w-[18px] h-[18px] flex items-center justify-center">3</span>
                        </a>

                        <div class="relative group pl-1">
                            <button class="flex items-center hover:text-primary transition-colors">
                                @auth
                                    <span class="flex items-center justify-center w-9 h-9 bg-[#1a1a1a] text-white rounded-full font-bold uppercase text-sm">
                                        {{ strtoupper(Auth::user()->name[0]) }}
                                    </span>
                                @else
                                    <span class="text-xl"><i class="ri-user-line"></i></span>
                                @endauth
                            </button>
                            <ul class="absolute right-0 mt-3 w-48 bg-white border border-black/5 shadow-xl py-2 rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                                @guest
                                    <li><a href='{{ route('login') }}' class="block px-4 py-2.5 hover:bg-gray-50 text-sm text-[#1a1a1a]">Sign In</a></li>
                                    <li><a href='{{ route('register') }}' class="block px-4 py-2.5 hover:bg-gray-50 text-sm text-[#1a1a1a]">Create Account</a></li>
                                @else
                                    <li class="px-4 pb-2 mb-1 border-b border-gray-100 text-xs text-gray-400 uppercase tracking-wider">Hi, {{ Auth::user()->name }}</li>
                                    <li><a href='{{ Auth::user()->utype == 'ADM' ? route('admin.index') : route('user.index') }}' class="block px-4 py-2.5 hover:bg-gray-50 text-sm text-[#1a1a1a]">My Account</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2.5 hover:bg-gray-50 text-sm text-[#1a1a1a]">Sign Out</a>
                                        <form action="{{ route('logout') }}" id="logout-form" method="POST" class="hidden">
                                            @csrf
                                        </form>
                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </header>
    
        <header class="lg:hidden bg-white/95 backdrop-blur shadow-sm sticky top-0 z-50 border-b border-black/5">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center mb-4">
                <button id="mobile-menu-btn" class="text-2xl text-[#1a1a1a] focus:outline-none" aria-label="Menu">
                    <i class="ri-menu-line"></i>
                </button>

                <a href="{{ route('home.index') }}" class="font-syne text-xl font-extrabold tracking-[0.15em] text-[#1a1a1a]">
                    LA·AYAT
                </a>

                <div class="flex items-center space-x-5 text-[#1a1a1a]">
                    <a href="wishlist.php" class="text-xl hover:text-primary transition-colors" aria-label="Wishlist">
                        <i class="ri-heart-line"></i>
                    </a>

                    <a href="cart.php" class="text-xl hover:text-primary transition-colors relative" aria-label="Cart">
                        <i class="ri-shopping-bag-line"></i>
                        <span class="absolute -top-2 -right-2 bg-primary text-white text-[10px] font-bold rounded-full min-w-[16px] h-4 flex items-center justify-center px-1">3</span>
                    </a>

                    <div class="relative">
                        <button id="mobile-avatar-button" class="text-xl hover:text-primary transition-colors focus:outline-none" aria-label="Account">
                            <i class="ri-user-line"></i>
                        </button>

                        <ul id="avatar-submenu-mobile" class="absolute right-0 mt-3 w-44 bg-white border border-black/5 shadow-xl py-2 rounded-xl hidden z-[100]">
                            @guest
                                <li><a href="{{ route('login') }}" class="block px-4 py-2.5 hover:bg-gray-50 text-sm text-[#1a1a1a]">Sign In</a></li>
                                <li><a href="{{ route('register') }}" class="block px-4 py-2.5 hover:bg-gray-50 text-sm text-[#1a1a1a]">Create Account</a></li>
                            @else
                                <li><a href="{{ Auth::user()->utype == 'ADM' ? route('admin.index') : route('user.index') }}" class="block px-4 py-2.5 hover:bg-gray-50 text-sm text-[#1a1a1a]">My Account</a></li>
                                <li class="border-t border-gray-50 mt-1">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();" class="block px-4 py-2.5 hover:bg-gray-50 text-sm font-semibold text-primary">Sign Out</a>
                                    <form action="{{ route('logout') }}" id="logout-form-mobile" method="POST" class="hidden">@csrf</form>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>

            <div class="pb-2">
                <form action="shop.php" method="GET" class="relative">
                    <input type="text" name="q" placeholder="Search the store..."
                           class="w-full bg-gray-100 border-none px-4 py-3 rounded-lg text-sm focus:ring-2 focus:ring-primary focus:bg-white transition-all outline-none">
                    <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary">
                        <i class="ri-search-line"></i>
                    </button>
                </form>
            </div>
        </div>
        </header>

        <div id="mobile-sidebar" class="fixed inset-y-0 left-0 w-72 bg-white shadow-2xl transform -translate-x-full transition-transform duration-300 z-[60] flex flex-col">
            <div class="p-5 flex justify-between items-center border-b border-black/5">
                <span class="font-syne font-extrabold text-lg tracking-[0.15em] text-[#1a1a1a]">LA·AYAT</span>
                <button id="close-menu-btn" class="text-2xl text-[#1a1a1a]" aria-label="Close menu"><i class="ri-close-line"></i></button>
            </div>
            <nav class="p-5 flex-1">
                <ul class="space-y-1 text-[15px] font-semibold tracking-wide text-[#1a1a1a]">
                    <li><a href="{{ route('home.index') }}" class="flex items-center justify-between py-3 border-b border-gray-50 hover:text-primary transition-colors">Women <i class="ri-arrow-right-s-line text-gray-300"></i></a></li>
                    <li><a href="{{ route('home.index') }}" class="flex items-center justify-between py-3 border-b border-gray-50 hover:text-primary transition-colors">Men <i class="ri-arrow-right-s-line text-gray-300"></i></a></li>
                    <li><a href="{{ route('home.index') }}" class="flex items-center justify-between py-3 border-b border-gray-50 hover:text-primary transition-colors">New In <i class="ri-arrow-right-s-line text-gray-300"></i></a></li>
                    <li><a href="{{ route('home.index') }}" class="flex items-center justify-between py-3 border-b border-gray-50 text-primary transition-colors">Sale <i class="ri-arrow-right-s-line text-primary/40"></i></a></li>
                    <li><a href="contact.php" class="flex items-center justify-between py-3 border-b border-gray-50 hover:text-primary transition-colors">Contact <i class="ri-arrow-right-s-line text-gray-300"></i></a></li>
                </ul>
            </nav>
            <div class="p-5 border-t border-black/5">
                <div class="flex items-center gap-5 text-xl text-[#1a1a1a]">
                    <a href="#" class="hover:text-primary transition-colors"><i class="ri-instagram-line"></i></a>
                    <a href="#" class="hover:text-primary transition-colors"><i class="ri-facebook-circle-line"></i></a>
                    <a href="#" class="hover:text-primary transition-colors"><i class="ri-twitter-x-line"></i></a>
                </div>
            </div>
        </div>
        <div id="menu-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-[55]"></div>
    
        
        <!-- Main Content Start -->
    
        {{ $slot }}
    
        <!-- Main Content End -->
    
        <footer class="bg-[#1a1a1a] text-gray-300 pt-20 pb-8">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-2 lg:grid-cols-5 gap-10 lg:gap-8">

                    <!-- Brand -->
                    <div class="col-span-2 lg:col-span-2 lg:pr-10">
                        <a href="{{ route('home.index') }}" class="font-syne text-2xl font-extrabold tracking-[0.15em] text-white">LA·AYAT</a>
                        <p class="text-sm text-gray-400 leading-relaxed mt-5 max-w-xs">
                            Considered, ethically-made clothing for a modern wardrobe — timeless pieces designed to be worn and loved for years.
                        </p>
                        <div class="flex space-x-3 mt-7">
                            <a href="#" aria-label="Instagram" class="w-10 h-10 rounded-full border border-white/15 flex items-center justify-center text-white hover:bg-primary hover:border-primary transition-colors"><i class="ri-instagram-line"></i></a>
                            <a href="#" aria-label="Facebook" class="w-10 h-10 rounded-full border border-white/15 flex items-center justify-center text-white hover:bg-primary hover:border-primary transition-colors"><i class="ri-facebook-circle-line"></i></a>
                            <a href="#" aria-label="Twitter" class="w-10 h-10 rounded-full border border-white/15 flex items-center justify-center text-white hover:bg-primary hover:border-primary transition-colors"><i class="ri-twitter-x-line"></i></a>
                            <a href="#" aria-label="Pinterest" class="w-10 h-10 rounded-full border border-white/15 flex items-center justify-center text-white hover:bg-primary hover:border-primary transition-colors"><i class="ri-pinterest-line"></i></a>
                        </div>
                    </div>

                    <!-- Shop -->
                    <div>
                        <h4 class="text-white font-syne font-bold text-sm mb-6 tracking-[0.15em] uppercase">Shop</h4>
                        <ul class="space-y-3.5 text-sm">
                            <li><a href="{{ route('home.index') }}" class="hover:text-primary transition-colors">New In</a></li>
                            <li><a href="{{ route('home.index') }}" class="hover:text-primary transition-colors">Women</a></li>
                            <li><a href="{{ route('home.index') }}" class="hover:text-primary transition-colors">Men</a></li>
                            <li><a href="{{ route('home.index') }}" class="hover:text-primary transition-colors">Accessories</a></li>
                            <li><a href="{{ route('home.index') }}" class="hover:text-primary transition-colors">Sale</a></li>
                        </ul>
                    </div>

                    <!-- Help -->
                    <div>
                        <h4 class="text-white font-syne font-bold text-sm mb-6 tracking-[0.15em] uppercase">Help</h4>
                        <ul class="space-y-3.5 text-sm">
                            <li><a href="#" class="hover:text-primary transition-colors">Shipping &amp; Delivery</a></li>
                            <li><a href="#" class="hover:text-primary transition-colors">Returns &amp; Exchanges</a></li>
                            <li><a href="#" class="hover:text-primary transition-colors">Size Guide</a></li>
                            <li><a href="#" class="hover:text-primary transition-colors">Track Your Order</a></li>
                            <li><a href="#" class="hover:text-primary transition-colors">FAQ</a></li>
                        </ul>
                    </div>

                    <!-- About -->
                    <div>
                        <h4 class="text-white font-syne font-bold text-sm mb-6 tracking-[0.15em] uppercase">About</h4>
                        <ul class="space-y-3.5 text-sm">
                            <li><a href="about.php" class="hover:text-primary transition-colors">Our Story</a></li>
                            <li><a href="#" class="hover:text-primary transition-colors">Sustainability</a></li>
                            <li><a href="#" class="hover:text-primary transition-colors">Stores</a></li>
                            <li><a href="#" class="hover:text-primary transition-colors">Careers</a></li>
                            <li><a href="contact.php" class="hover:text-primary transition-colors">Contact Us</a></li>
                        </ul>
                    </div>
                </div>

                <div class="border-t border-white/10 mt-16 pt-8 flex flex-col md:flex-row justify-between items-center gap-5">
                    <p class="text-xs text-gray-500 tracking-wide">&copy; 2026 LA·AYAT. All rights reserved.</p>
                    <div class="flex items-center gap-6 text-xs text-gray-500">
                        <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                        <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                    </div>
                    <img src="{{ asset('assets/images/payment.png') }}" alt="Accepted payment methods" class="h-6 opacity-70" />
                </div>
            </div>
        </footer>
    
        <button id="back-to-top" class="fixed bottom-8 right-8 bg-[#1a1a1a] text-white w-12 h-12 rounded-full shadow-xl hover:bg-primary transition-colors hidden items-center justify-center z-50">
            <i class="ri-arrow-up-line text-xl"></i>
        </button>
    
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

        <script>
        document.addEventListener("DOMContentLoaded", function() {
            
            // --- Helper: Select Element ---
            const $ = (id) => document.getElementById(id);
            const $$ = (selector) => document.querySelectorAll(selector);

            // --- 1. UI Toggles (Mobile Menu & Avatar) ---
            const toggleUI = (btnId, menuId, overlayId = null) => {
                const btn = $(btnId);
                const menu = $(menuId);
                const overlay = overlayId ? $(overlayId) : null;

                if (!btn || !menu) return;

                const toggle = () => {
                    menu.classList.toggle('-translate-x-full');
                    menu.classList.toggle('hidden'); // For avatar type menus
                    if (overlay) overlay.classList.toggle('hidden');
                };

                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    toggle();
                });

                // Specific for mobile sidebar close button
                if ($(btnId === 'mobile-menu-btn' ? 'close-menu-btn' : null)) {
                    $('close-menu-btn').addEventListener('click', toggle);
                }

                // Close when clicking outside
                document.addEventListener('click', (e) => {
                    if (!menu.contains(e.target) && !btn.contains(e.target)) {
                        menu.classList.add('-translate-x-full');
                        menu.classList.add('hidden');
                        if (overlay) overlay.classList.add('hidden');
                    }
                });
            };

            toggleUI('mobile-menu-btn', 'mobile-sidebar', 'menu-overlay');
            toggleUI('mobile-avatar-button', 'avatar-submenu-mobile');

            // --- 2. Back to Top Button ---
            const backToTopBtn = $('back-to-top');
            if (backToTopBtn) {
                window.addEventListener('scroll', () => {
                    const isVisible = window.scrollY > 300;
                    backToTopBtn.classList.toggle('hidden', !isVisible);
                    backToTopBtn.classList.toggle('flex', isVisible);
                });

                backToTopBtn.addEventListener('click', () => {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            }

            // --- 3. Swiper Initializations (Unified Logic) ---
            const initSwiper = (selector, options) => {
                if (document.querySelector(selector)) return new Swiper(selector, options);
            };

            // Hero
            initSwiper('.main-slider', {
                loop: true,
                pagination: { el: '.swiper-pagination', clickable: true },
                autoplay: { delay: 5000 },
            });

            // Product/Category Sliders (Common Breakpoints)
            const productBreakpoints = {
                640: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                1024: { slidesPerView: 4 }
            };

            initSwiper('.category-slider', { 
                slidesPerView: 2, spaceBetween: 20, loop: true, 
                breakpoints: { ...productBreakpoints, 1024: { slidesPerView: 6 } } 
            });

            initSwiper('.brand-slider', { 
                slidesPerView: 2, spaceBetween: 20, loop: true, 
                breakpoints: { ...productBreakpoints, 1024: { slidesPerView: 5 } } 
            });

            initSwiper('.featured-slider', { 
                slidesPerView: 1, spaceBetween: 20, 
                navigation: { nextEl: '.feat-next', prevEl: '.feat-prev' },
                breakpoints: productBreakpoints 
            });

            initSwiper('.related-slider', { 
                slidesPerView: 1, spaceBetween: 20, 
                navigation: { nextEl: '.related-next', prevEl: '.related-prev' },
                breakpoints: productBreakpoints 
            });

            // Gallery Thumbs logic
            const galleryThumbs = initSwiper('.gallery-thumbs', {
                spaceBetween: 10, slidesPerView: 4, freeMode: true, watchSlidesProgress: true,
            });

            initSwiper('.gallery-top', {
                spaceBetween: 10,
                navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
                thumbs: { swiper: galleryThumbs }
            });

            // --- 4. Tabs Logic ---
            $$('.tab-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    $$('.tab-btn').forEach(b => b.classList.remove('active'));
                    $$('.tab-content').forEach(c => c.classList.add('hidden'));
                    
                    btn.classList.add('active');
                    const target = $(btn.getAttribute('data-target'));
                    if (target) target.classList.remove('hidden');
                });
            });

            // --- 5. Countdown Timer ---
            const countdownContainer = $('countdown-timer');
            if (countdownContainer) {
                const targetDate = new Date("2025-12-31T00:00:00").getTime();
                const updateTimer = () => {
                    const distance = targetDate - new Date().getTime();
                    if (distance < 0) {
                        countdownContainer.innerHTML = "EXPIRED";
                        return clearInterval(timerInterval);
                    }
                    const timeMap = {
                        days: Math.floor(distance / 864e5),
                        hours: Math.floor((distance % 864e5) / 36e5),
                        minutes: Math.floor((distance % 36e5) / 6e4),
                        seconds: Math.floor((distance % 6e4) / 1000)
                    };
                    Object.keys(timeMap).forEach(unit => {
                        const el = $(unit);
                        if (el) el.innerText = String(timeMap[unit]).padStart(2, '0');
                    });
                };
                const timerInterval = setInterval(updateTimer, 1000);
                updateTimer();
            }
        });

        // --- 6. Global Functions ---
        function updateQty(amount) {
            const input = document.getElementById('qty-input');
            if (!input) return;
            let val = parseInt(input.value) + amount;
            input.value = val < 1 ? 1 : val;
        }
        </script>
    
    </body>


    {{-- <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body> --}}
</html>
