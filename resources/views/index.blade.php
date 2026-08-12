<x-app-layout>

    {{-- ============================================================
         Local styles for this page (marquee + subtle animations)
    ============================================================ --}}
    <style>
        @keyframes laayat-marquee {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .laayat-marquee-track {
            display: inline-flex;
            white-space: nowrap;
            animation: laayat-marquee 30s linear infinite;
        }
        @keyframes laayat-fade-up {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>

    {{-- ============================================================
         HERO — Editorial Split Campaign
    ============================================================ --}}
    <section class="w-full bg-[#f4f1ec] overflow-hidden">

        {{-- ---------- MOBILE / TABLET HERO (single image, editorial) ---------- --}}
        <div class="lg:hidden relative w-full h-[86vh] min-h-[540px] max-h-[760px] overflow-hidden bg-[#e4dac6]">
            <img src="{{ asset('assets/images/hero/hero_fashion_female.png') }}"
                 alt="New Season Collection"
                 class="absolute inset-0 w-full h-full object-cover object-[50%_20%]" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/25 to-black/25"></div>

            <div class="relative z-10 h-full flex flex-col justify-end items-center text-center px-6 pb-12">
                <span class="text-white/90 text-[11px] font-medium tracking-[0.4em] uppercase mb-4 drop-shadow">
                    New Season &nbsp;·&nbsp; 2026
                </span>
                <h1 class="font-syne text-white text-5xl sm:text-6xl font-extrabold leading-[0.95] tracking-tight mb-8 drop-shadow-[0_2px_20px_rgba(0,0,0,0.4)]">
                    Autumn Edit
                </h1>

                <a href="{{ route('home.index') }}"
                   class="w-full max-w-xs inline-flex items-center justify-center gap-3 bg-white text-[#1a1a1a] px-8 py-4 text-xs font-bold tracking-[0.2em] uppercase shadow-xl active:scale-[0.98] transition-transform">
                    Explore the Collection
                    <i class="ri-arrow-right-up-line text-base"></i>
                </a>

                <div class="grid grid-cols-2 gap-3 w-full max-w-xs mt-3">
                    <a href="{{ route('home.index') }}"
                       class="inline-flex items-center justify-center gap-2 border border-white/60 text-white px-4 py-3.5 text-[11px] font-bold tracking-[0.15em] uppercase backdrop-blur-sm active:bg-white active:text-[#1a1a1a] transition-colors">
                        Women
                    </a>
                    <a href="{{ route('home.index') }}"
                       class="inline-flex items-center justify-center gap-2 border border-white/60 text-white px-4 py-3.5 text-[11px] font-bold tracking-[0.15em] uppercase backdrop-blur-sm active:bg-white active:text-[#1a1a1a] transition-colors">
                        Men
                    </a>
                </div>
            </div>
        </div>

        {{-- ---------- DESKTOP HERO (two-panel split campaign) ---------- --}}
        <div class="hidden lg:grid relative w-full grid-cols-2 h-[88vh] min-h-[600px] max-h-[920px]">

            <!-- Panel 1 : Women -->
            <a href="{{ route('home.index') }}"
               class="group relative block overflow-hidden bg-[#e4dac6]">
                <img src="{{ asset('assets/images/hero/hero_fashion_female.png') }}"
                     alt="Women's New Season Collection"
                     class="absolute inset-0 w-full h-full object-cover object-top transition-transform duration-[1200ms] ease-out group-hover:scale-105" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/55 via-black/5 to-black/10"></div>
                <div class="relative z-10 h-full flex flex-col justify-end items-start p-14">
                    <span class="text-white/75 text-[11px] font-medium tracking-[0.35em] uppercase mb-3">The Collection</span>
                    <h2 class="font-syne text-white text-5xl xl:text-6xl font-bold tracking-tight leading-none mb-6">Women</h2>
                    <span class="inline-flex items-center gap-3 text-white text-xs font-semibold tracking-[0.2em] uppercase">
                        <span class="relative pb-1">
                            Shop Women
                            <span class="absolute left-0 -bottom-0.5 h-px w-full bg-white/50 origin-left scale-x-100 group-hover:scale-x-0 transition-transform duration-500"></span>
                            <span class="absolute left-0 -bottom-0.5 h-px w-full bg-white origin-right scale-x-0 group-hover:scale-x-100 transition-transform duration-500 delay-100"></span>
                        </span>
                        <i class="ri-arrow-right-line text-base transition-transform duration-500 group-hover:translate-x-1.5"></i>
                    </span>
                </div>
            </a>

            <!-- Panel 2 : Men -->
            <a href="{{ route('home.index') }}"
               class="group relative block overflow-hidden bg-[#dbe3eb] border-l border-white/40">
                <img src="{{ asset('assets/images/hero/hero_fashion_male.png') }}"
                     alt="Men's New Season Collection"
                     class="absolute inset-0 w-full h-full object-cover object-top transition-transform duration-[1200ms] ease-out group-hover:scale-105" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/55 via-black/5 to-black/10"></div>
                <div class="relative z-10 h-full flex flex-col justify-end items-start p-14">
                    <span class="text-white/75 text-[11px] font-medium tracking-[0.35em] uppercase mb-3">The Collection</span>
                    <h2 class="font-syne text-white text-5xl xl:text-6xl font-bold tracking-tight leading-none mb-6">Men</h2>
                    <span class="inline-flex items-center gap-3 text-white text-xs font-semibold tracking-[0.2em] uppercase">
                        <span class="relative pb-1">
                            Shop Men
                            <span class="absolute left-0 -bottom-0.5 h-px w-full bg-white/50 origin-left scale-x-100 group-hover:scale-x-0 transition-transform duration-500"></span>
                            <span class="absolute left-0 -bottom-0.5 h-px w-full bg-white origin-right scale-x-0 group-hover:scale-x-100 transition-transform duration-500 delay-100"></span>
                        </span>
                        <i class="ri-arrow-right-line text-base transition-transform duration-500 group-hover:translate-x-1.5"></i>
                    </span>
                </div>
            </a>

            <!-- Centered Editorial Overlay -->
            <div class="pointer-events-none absolute inset-0 z-20 flex flex-col items-center justify-center text-center px-6">
                <div class="pointer-events-auto max-w-xl">
                    <span class="inline-block text-white/90 text-xs font-medium tracking-[0.4em] uppercase mb-6 drop-shadow">
                        New Season &nbsp;·&nbsp; 2026
                    </span>
                    <h1 class="font-syne text-white text-6xl xl:text-7xl font-extrabold leading-[0.95] tracking-tight mb-8 drop-shadow-[0_2px_20px_rgba(0,0,0,0.35)]">
                        Autumn Edit
                    </h1>
                    <a href="{{ route('home.index') }}"
                       class="inline-flex items-center gap-3 bg-white text-[#1a1a1a] px-10 py-4 text-xs font-bold tracking-[0.2em] uppercase shadow-xl hover:bg-primary hover:text-white transition-colors duration-300">
                        Explore the Collection
                        <i class="ri-arrow-right-up-line text-base"></i>
                    </a>
                </div>
            </div>

        </div>
    </section>

    {{-- ============================================================
         ANNOUNCEMENT MARQUEE
    ============================================================ --}}
    <div class="bg-[#1a1a1a] text-white overflow-hidden py-3.5">
        <div class="laayat-marquee-track text-[11px] font-medium tracking-[0.3em] uppercase">
            @php $ticker = ['Complimentary shipping over $150', 'Easy 30-day returns', 'New arrivals every week', 'Ethically crafted essentials', 'Members get early access']; @endphp
            @for ($i = 0; $i < 2; $i++)
                @foreach ($ticker as $item)
                    <span class="mx-8 inline-flex items-center gap-8">{{ $item }} <span class="text-primary">✦</span></span>
                @endforeach
            @endfor
        </div>
    </div>

    {{-- ============================================================
         SHOP BY CATEGORY — Editorial Tiles
    ============================================================ --}}
    <section class="py-20 lg:py-28 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between mb-12 gap-4">
                <div>
                    <span class="text-primary text-xs font-semibold tracking-[0.3em] uppercase">Curated for you</span>
                    <h2 class="font-syne text-3xl sm:text-4xl font-bold text-[#1a1a1a] tracking-tight mt-3">Shop by Category</h2>
                </div>
                <a href="{{ route('home.index') }}" class="text-sm font-semibold text-[#1a1a1a] tracking-wide border-b-2 border-primary pb-1 hover:text-primary transition-colors self-start sm:self-auto">
                    View all categories
                </a>
            </div>

            @php
                $categories = [
                    ['title' => 'Women',      'sub' => '248 styles', 'img' => 'assets/images/hero/hero_fashion_female.png', 'span' => 'lg:col-span-2'],
                    ['title' => 'Men',        'sub' => '186 styles', 'img' => 'assets/images/hero/hero_fashion_male.png',   'span' => 'lg:col-span-1'],
                    ['title' => 'Accessories','sub' => '94 styles',  'img' => 'assets/images/banner/banner-05.jpg',          'span' => 'lg:col-span-1'],
                    ['title' => 'New In',     'sub' => 'Just landed', 'img' => 'assets/images/banner/banner-06.jpg',          'span' => 'lg:col-span-2'],
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-5">
                @foreach ($categories as $cat)
                    <a href="{{ route('home.index') }}"
                       class="group relative overflow-hidden rounded-2xl bg-gray-100 h-[340px] sm:h-[420px] {{ $cat['span'] }} block">
                        <img src="{{ asset($cat['img']) }}" alt="{{ $cat['title'] }}"
                             class="absolute inset-0 w-full h-full object-cover object-top transition-transform duration-[900ms] ease-out group-hover:scale-105" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        <div class="absolute inset-0 p-7 flex flex-col justify-end">
                            <span class="text-white/70 text-[11px] tracking-[0.25em] uppercase mb-1">{{ $cat['sub'] }}</span>
                            <div class="flex items-center justify-between">
                                <h3 class="font-syne text-white text-2xl sm:text-3xl font-bold tracking-tight">{{ $cat['title'] }}</h3>
                                <span class="w-11 h-11 rounded-full bg-white/15 backdrop-blur-md border border-white/30 flex items-center justify-center text-white group-hover:bg-white group-hover:text-[#1a1a1a] transition-colors duration-300">
                                    <i class="ri-arrow-right-up-line text-lg"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================================================
         NEW ARRIVALS — Product Grid
    ============================================================ --}}
    <section class="py-20 lg:py-24 bg-[#f4f1ec]">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-primary text-xs font-semibold tracking-[0.3em] uppercase">Fresh off the rail</span>
                <h2 class="font-syne text-3xl sm:text-4xl font-bold text-[#1a1a1a] tracking-tight mt-3">New Arrivals</h2>
                <p class="text-gray-500 mt-4 leading-relaxed">Considered pieces designed to last — the latest additions to the La-Ayat wardrobe.</p>
            </div>

            @php
                $newArrivals = [
                    ['name' => 'Oversized Wool Blazer',  'price' => 189, 'old' => null, 'badge' => 'New',  'img' => 'assets/images/product/product-01.jpg', 'swatches' => ['#2b2b2b','#b5764b','#d9cbb3']],
                    ['name' => 'Pleated Midi Skirt',     'price' => 95,  'old' => 130,  'badge' => '-27%', 'img' => 'assets/images/product/product-02.jpg', 'swatches' => ['#1a1a1a','#7d8a99']],
                    ['name' => 'Ribbed Knit Sweater',    'price' => 78,  'old' => null, 'badge' => 'New',  'img' => 'assets/images/product/product-03.jpg', 'swatches' => ['#e4dac6','#915c37','#2b2b2b']],
                    ['name' => 'Tailored Linen Trousers','price' => 110, 'old' => null, 'badge' => null,   'img' => 'assets/images/product/product-04.jpg', 'swatches' => ['#d9cbb3','#3a3a3a']],
                ];
            @endphp

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
                @foreach ($newArrivals as $p)
                    <div class="group">
                        <div class="relative overflow-hidden rounded-xl bg-white aspect-[3/4]">
                            <a href="{{ route('home.index') }}" class="block w-full h-full">
                                <img src="{{ asset($p['img']) }}" alt="{{ $p['name'] }}"
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
                            </a>
                            @if ($p['badge'])
                                <span class="absolute top-3 left-3 {{ str_contains($p['badge'], '%') ? 'bg-primary' : 'bg-[#1a1a1a]' }} text-white text-[10px] font-bold tracking-widest uppercase px-3 py-1.5 rounded-full">{{ $p['badge'] }}</span>
                            @endif

                            <!-- Wishlist -->
                            <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/90 backdrop-blur flex items-center justify-center text-[#1a1a1a] hover:bg-primary hover:text-white transition-colors shadow-sm">
                                <i class="ri-heart-line text-base"></i>
                            </button>

                            <!-- Quick add -->
                            <div class="absolute inset-x-3 bottom-3 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                                <a href="{{ route('home.index') }}" class="flex items-center justify-center gap-2 w-full bg-[#1a1a1a] text-white text-xs font-semibold tracking-[0.15em] uppercase py-3 rounded-lg hover:bg-primary transition-colors">
                                    <i class="ri-shopping-bag-line"></i> Add to Bag
                                </a>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="flex items-center gap-1.5 mb-2">
                                @foreach ($p['swatches'] as $sw)
                                    <span class="w-3.5 h-3.5 rounded-full border border-black/10" style="background: {{ $sw }}"></span>
                                @endforeach
                            </div>
                            <h4 class="text-sm font-semibold text-[#1a1a1a]">
                                <a href="{{ route('home.index') }}" class="hover:text-primary transition-colors">{{ $p['name'] }}</a>
                            </h4>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="text-[#1a1a1a] font-bold">${{ number_format($p['price'], 2) }}</span>
                                @if ($p['old'])
                                    <span class="text-gray-400 line-through text-sm">${{ number_format($p['old'], 2) }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-14">
                <a href="{{ route('home.index') }}" class="inline-flex items-center gap-3 border-2 border-[#1a1a1a] text-[#1a1a1a] px-10 py-4 text-xs font-bold tracking-[0.2em] uppercase hover:bg-[#1a1a1a] hover:text-white transition-colors duration-300">
                    View All New In <i class="ri-arrow-right-line"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- ============================================================
         EDITORIAL CAMPAIGN — Full-width Split
    ============================================================ --}}
    <section class="w-full bg-[#1a1a1a] overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-2 items-stretch min-h-[520px]">
            <div class="relative order-2 lg:order-1 flex items-center">
                <img src="{{ asset('assets/images/hero/hero_fashion_female.png') }}" alt="The Autumn Edit"
                     class="w-full h-full object-cover object-top max-h-[300px] lg:max-h-none" />
            </div>
            <div class="order-1 lg:order-2 flex flex-col justify-center px-8 sm:px-14 lg:px-20 py-16 lg:py-24">
                <span class="text-primary text-xs font-semibold tracking-[0.35em] uppercase mb-5">The Signature Edit</span>
                <h2 class="font-syne text-white text-4xl sm:text-5xl xl:text-6xl font-extrabold leading-[1.02] tracking-tight mb-6">
                    Timeless pieces,<br/> thoughtfully made
                </h2>
                <p class="text-gray-400 leading-relaxed max-w-md mb-9">
                    Natural fabrics, considered cuts and a palette built to layer. Discover the essentials our community keeps coming back for.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('home.index') }}" class="inline-flex items-center gap-3 bg-white text-[#1a1a1a] px-9 py-4 text-xs font-bold tracking-[0.2em] uppercase hover:bg-primary hover:text-white transition-colors duration-300">
                        Shop the Edit
                    </a>
                    <a href="{{ route('home.index') }}" class="inline-flex items-center gap-3 border border-white/30 text-white px-9 py-4 text-xs font-bold tracking-[0.2em] uppercase hover:bg-white hover:text-[#1a1a1a] transition-colors duration-300">
                        Our Story
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         TRENDING NOW — Swiper Carousel (uses .featured-slider JS)
    ============================================================ --}}
    <section class="py-20 lg:py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <span class="text-primary text-xs font-semibold tracking-[0.3em] uppercase">Most loved</span>
                    <h2 class="font-syne text-3xl sm:text-4xl font-bold text-[#1a1a1a] tracking-tight mt-3">Trending Now</h2>
                </div>
                <div class="flex space-x-2">
                    <button class="feat-prev w-11 h-11 rounded-full border border-gray-300 hover:bg-[#1a1a1a] hover:border-[#1a1a1a] hover:text-white transition flex items-center justify-center"><i class="ri-arrow-left-line text-xl"></i></button>
                    <button class="feat-next w-11 h-11 rounded-full border border-gray-300 hover:bg-[#1a1a1a] hover:border-[#1a1a1a] hover:text-white transition flex items-center justify-center"><i class="ri-arrow-right-line text-xl"></i></button>
                </div>
            </div>

            @php
                $trending = [
                    ['name' => 'Silk Slip Dress',      'price' => 145, 'img' => 'assets/images/product/product-05.jpg'],
                    ['name' => 'Cropped Denim Jacket', 'price' => 120, 'img' => 'assets/images/product/product-06.jpg'],
                    ['name' => 'Cashmere Turtleneck',  'price' => 165, 'img' => 'assets/images/product/product-07.jpg'],
                    ['name' => 'Relaxed Cotton Shirt', 'price' => 68,  'img' => 'assets/images/product/product-08.jpg'],
                    ['name' => 'Wide-Leg Trousers',    'price' => 98,  'img' => 'assets/images/product/product-09.jpg'],
                    ['name' => 'Quilted Overshirt',    'price' => 135, 'img' => 'assets/images/product/product-10.jpg'],
                ];
            @endphp

            <div class="swiper-container featured-slider overflow-hidden">
                <div class="swiper-wrapper pb-2">
                    @foreach ($trending as $p)
                        <div class="swiper-slide">
                            <div class="group">
                                <div class="relative overflow-hidden rounded-xl bg-gray-100 aspect-[3/4]">
                                    <a href="{{ route('home.index') }}"><img src="{{ asset($p['img']) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700" alt="{{ $p['name'] }}"></a>
                                    <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/90 backdrop-blur flex items-center justify-center text-[#1a1a1a] hover:bg-primary hover:text-white transition-colors shadow-sm">
                                        <i class="ri-heart-line text-base"></i>
                                    </button>
                                    <div class="absolute inset-x-3 bottom-3 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                                        <a href="{{ route('home.index') }}" class="flex items-center justify-center gap-2 w-full bg-[#1a1a1a] text-white text-xs font-semibold tracking-[0.15em] uppercase py-3 rounded-lg hover:bg-primary transition-colors">
                                            <i class="ri-shopping-bag-line"></i> Add to Bag
                                        </a>
                                    </div>
                                </div>
                                <div class="mt-4 text-center">
                                    <h4 class="text-sm font-semibold text-[#1a1a1a]"><a href="{{ route('home.index') }}" class="hover:text-primary transition-colors">{{ $p['name'] }}</a></h4>
                                    <p class="text-[#1a1a1a] font-bold mt-1">${{ number_format($p['price'], 2) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         SEASON SALE — Countdown (keeps existing countdown JS IDs)
    ============================================================ --}}
    <section class="py-20 lg:py-24 bg-[#e4dac6] overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-7">
                    <span class="text-secondary text-xs font-semibold tracking-[0.3em] uppercase">Limited time</span>
                    <h2 class="font-syne text-4xl sm:text-5xl font-extrabold text-[#1a1a1a] tracking-tight leading-tight">
                        End of Season <span class="text-primary">Up to 40% Off</span>
                    </h2>
                    <p class="text-[#5b5147] leading-relaxed max-w-md">
                        Final markdowns on select styles from the current collection. Once they're gone, they're gone.
                    </p>

                    <div class="flex space-x-3 sm:space-x-4 text-center" id="countdown-timer">
                        @foreach (['days' => 'Days', 'hours' => 'Hrs', 'minutes' => 'Mins', 'seconds' => 'Secs'] as $id => $label)
                            <div class="bg-white/80 backdrop-blur p-4 rounded-xl shadow-sm w-[70px] sm:w-20">
                                <span class="block text-2xl sm:text-3xl font-extrabold text-[#1a1a1a] font-syne" id="{{ $id }}">00</span>
                                <span class="text-[10px] text-gray-500 uppercase tracking-widest">{{ $label }}</span>
                            </div>
                        @endforeach
                    </div>

                    <a href="{{ route('home.index') }}" class="inline-flex items-center gap-3 bg-[#1a1a1a] text-white px-10 py-4 text-xs font-bold tracking-[0.2em] uppercase hover:bg-primary transition-colors duration-300">
                        Shop the Sale <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
                <div class="relative">
                    <div class="absolute inset-0 bg-white/40 rounded-full blur-3xl scale-90"></div>
                    <img src="{{ asset('assets/images/hero/hero_fashion_male.png') }}" alt="Season Sale"
                         class="relative z-10 w-full max-w-sm mx-auto rounded-2xl object-cover shadow-2xl" />
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         LOOKBOOK — Two-up Editorial Tiles
    ============================================================ --}}
    <section class="py-20 lg:py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-5">
                @php
                    $lookbook = [
                        ['eyebrow' => 'For Her', 'title' => "The Women's Edit", 'img' => 'assets/images/banner/banner-05.jpg'],
                        ['eyebrow' => 'For Him', 'title' => "The Men's Edit",   'img' => 'assets/images/banner/banner-06.jpg'],
                    ];
                @endphp
                @foreach ($lookbook as $look)
                    <div class="relative group overflow-hidden rounded-2xl h-[380px] sm:h-[460px]">
                        <img src="{{ asset($look['img']) }}" alt="{{ $look['title'] }}"
                             class="w-full h-full object-cover transition-transform duration-[900ms] group-hover:scale-105" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/55 via-black/10 to-transparent"></div>
                        <div class="absolute inset-0 flex flex-col justify-end p-8 sm:p-10">
                            <span class="text-white/75 text-[11px] tracking-[0.3em] uppercase mb-2">{{ $look['eyebrow'] }}</span>
                            <h3 class="font-syne text-white text-2xl sm:text-3xl font-bold tracking-tight mb-5">{{ $look['title'] }}</h3>
                            <a href="{{ route('home.index') }}" class="inline-flex items-center gap-2 self-start bg-white text-[#1a1a1a] px-7 py-3 text-[11px] font-bold tracking-[0.2em] uppercase hover:bg-primary hover:text-white transition-colors duration-300">
                                Discover <i class="ri-arrow-right-up-line"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================================================
         BRAND VALUES
    ============================================================ --}}
    <section class="py-16 bg-[#f4f1ec] border-y border-black/5">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                @php
                    $values = [
                        ['icon' => 'ri-truck-line',      'title' => 'Free Shipping',      'text' => 'On all orders over $150'],
                        ['icon' => 'ri-leaf-line',       'title' => 'Ethically Made',     'text' => 'Responsibly sourced fabrics'],
                        ['icon' => 'ri-arrow-go-back-line','title' => 'Easy Returns',     'text' => '30-day hassle-free returns'],
                        ['icon' => 'ri-shield-check-line','title' => 'Secure Checkout',   'text' => 'Encrypted & protected payment'],
                    ];
                @endphp
                @foreach ($values as $v)
                    <div class="flex flex-col items-center text-center sm:flex-row sm:text-left sm:items-start gap-4">
                        <span class="shrink-0 w-12 h-12 rounded-full bg-white flex items-center justify-center text-primary text-2xl shadow-sm">
                            <i class="{{ $v['icon'] }}"></i>
                        </span>
                        <div>
                            <h4 class="font-syne font-bold text-[#1a1a1a]">{{ $v['title'] }}</h4>
                            <p class="text-sm text-gray-500 mt-1">{{ $v['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================================================
         NEWSLETTER
    ============================================================ --}}
    <section class="py-20 lg:py-28 bg-[#1a1a1a]">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto text-center">
                <span class="text-primary text-xs font-semibold tracking-[0.3em] uppercase">Join the list</span>
                <h2 class="font-syne text-3xl sm:text-4xl font-extrabold text-white tracking-tight mt-4 mb-4">
                    Be first to the new season
                </h2>
                <p class="text-gray-400 leading-relaxed mb-9">
                    Sign up for early access to collections, private sales and style notes — straight to your inbox.
                </p>
                <form action="{{ route('home.index') }}" method="GET" class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
                    <input type="email" name="email" required placeholder="Enter your email address"
                           class="flex-1 bg-white/5 border border-white/20 text-white placeholder-gray-500 px-5 py-4 rounded-lg text-sm focus:outline-none focus:border-primary focus:bg-white/10 transition" />
                    <button type="submit" class="bg-primary text-white px-8 py-4 text-xs font-bold tracking-[0.2em] uppercase rounded-lg hover:bg-white hover:text-[#1a1a1a] transition-colors duration-300 whitespace-nowrap">
                        Subscribe
                    </button>
                </form>
                <p class="text-gray-600 text-xs mt-5">By subscribing you agree to our Privacy Policy. Unsubscribe anytime.</p>
            </div>
        </div>
    </section>

    {{-- ============================================================
         INSTAGRAM / LOOKBOOK FEED
    ============================================================ --}}
    <section class="py-20 lg:py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <span class="text-primary text-xs font-semibold tracking-[0.3em] uppercase">@laayat</span>
                <h2 class="font-syne text-3xl sm:text-4xl font-bold text-[#1a1a1a] tracking-tight mt-3">Styled by You</h2>
                <p class="text-gray-500 mt-4">Tag <span class="font-semibold text-[#1a1a1a]">#WearLaAyat</span> to be featured.</p>
            </div>

            @php
                $feed = [
                    'assets/images/product/product-11.jpg',
                    'assets/images/product/product-12.jpg',
                    'assets/images/product/product-13.jpg',
                    'assets/images/product/product-01.jpg',
                    'assets/images/product/product-05.jpg',
                    'assets/images/product/product-08.jpg',
                ];
            @endphp

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
                @foreach ($feed as $img)
                    <a href="{{ route('home.index') }}" class="group relative overflow-hidden rounded-xl aspect-square block bg-gray-100">
                        <img src="{{ asset($img) }}" alt="Instagram feed"
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                        <div class="absolute inset-0 bg-[#1a1a1a]/0 group-hover:bg-[#1a1a1a]/40 transition-colors duration-300 flex items-center justify-center">
                            <i class="ri-instagram-line text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

</x-app-layout>
