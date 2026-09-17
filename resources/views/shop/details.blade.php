<x-app-layout>

<!-- Main Content Start -->

    <div class="relative bg-sky-700 text-white h-64 flex items-center justify-center bg-cover bg-center" style="background-image: url({{asset('assets/images/page-banner.jpg')}});">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="relative z-10 text-center">
            <h2 class="text-4xl font-bold mb-2">Product Details</h2>
            <ul class="flex justify-center space-x-2 text-sm">
                <li><a href="{{ route('home.index') }}" class="hover:text-primary">Home</a></li>
                <li>/</li>
                <li class="text-primary">Product Details</li>
            </ul>
        </div>
    </div>

    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-12">
                
                <div class="w-full lg:w-1/2 overflow-hidden">
                    <div class="swiper-container gallery-top mb-4 rounded border bg-gray-50">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="{{ asset('uploads/products/thumbnails/'.$product->image) }}" class="w-full h-auto object-cover" alt="{{ $product->name }}"></div>
                            @if($product->images_gallery) 
                                @foreach (explode(',', $product->images_gallery) as $image)
                                    <div class="swiper-slide"><img src="{{ asset('uploads/products/'.$image) }}" class="w-full h-auto object-cover" alt="{{ $product->name }}"></div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide cursor-pointer border rounded overflow-hidden opacity-50 hover:opacity-100 transition">
                                <img src="{{ asset('uploads/products/thumbnails/'.$product->image) }}" class="w-full" alt="{{ $product->name }}">
                            </div>
                            @if($product->images_gallery)
                                @foreach (explode(',', $product->images_gallery) as $images)
                                    <div class="swiper-slide cursor-pointer border rounded overflow-hidden opacity-50 hover:opacity-100 transition">
                                        <img src="{{ asset('uploads/products/'.$images) }}" class="w-full" alt="{{ $product->name }}">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
    
                <div class="w-full lg:w-1/2">
                    <h2 class="text-3xl font-bold mb-4">{{ $product->name }}</h2>
                    
                    <div class="flex items-center space-x-4 mb-4">
                        @if ($product->sale_price)
                            <span class="text-2xl text-primary font-bold">{{ $product->sale_price }}</span>
                            <span class="text-xl text-gray-400 line-through">{{ $product->regular_price }}</span>
                        @else
                            <span class="text-2xl text-primary font-bold">{{ $product->regular_price }}</span>
                        @endif
                    </div>
    
                    <div class="flex items-center mb-6 space-x-4">
                        <div class="text-yellow-400 text-sm">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <a href="#reviews" class="text-sm text-gray-500 hover:text-primary">( 1 Customer Review )</a>
                    </div>
    
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        {{ $product->short_description }}
                    </p>
    
                    <div class="flex flex-wrap items-center gap-4 mb-8">
                        <div class="flex border rounded">
                            <button class="qty-btn px-3 py-2 hover:bg-gray-100" onclick="updateQty(-1)">-</button>
                            <input type="number" id="qty-input" value="1" class="w-12 text-center focus:outline-none" readonly>
                            <button class="qty-btn px-3 py-2 hover:bg-gray-100" onclick="updateQty(1)">+</button>
                        </div>
    
                        <button class="bg-sky-700 text-white px-8 py-3 rounded hover:bg-primary transition font-medium">Add To Cart</button>
                        
                        <div class="flex space-x-2">
                            <a href="#" class="w-10 h-10 flex items-center justify-center border rounded hover:bg-primary hover:text-white transition"><i class="fa-regular fa-heart text-xl"></i></a>
                            <a href="#" class="w-10 h-10 flex items-center justify-center border rounded hover:bg-primary hover:text-white transition"><i class="fa-solid fa-shuffle text-xl"></i></a>
                        </div>
                    </div>
    
                    <div class="space-y-2 text-sm text-gray-600 border-t pt-6">
                        <p><span class="font-bold text-gray-800 w-24 inline-block">SKU:</span> {{ $product->SKU }}</p>
                        <p><span class="font-bold text-gray-800 w-24 inline-block">Categories:</span> <a href="#" class="hover:text-primary">{{ $product->category->name }}</a></p>
                        <p><span class="font-bold text-gray-800 w-24 inline-block">Brands:</span> <a href="#" class="hover:text-primary">{{ $product->brand->name }}</a></p>
                        <div class="flex items-center">
                            <span class="font-bold text-gray-800 w-24 inline-block">Share:</span>
                            <div class="flex space-x-4">
                                <a href="#" class="hover:text-primary"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#" class="hover:text-primary"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#" class="hover:text-primary"><i class="fa-brands fa-pinterest-p"></i></a>
                                <a href="#" class="hover:text-primary"><i class="fa-brands fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 bg-gray-50" id="details-tabs">
        <div class="container mx-auto px-4">
            <div class="flex justify-center border-b mb-8 overflow-x-auto">
                <button class="tab-btn px-6 py-3 font-medium text-gray-600 hover:text-primary transition" data-target="info">Information</button>
                <button class="tab-btn active px-6 py-3 font-medium text-gray-600 hover:text-primary transition" data-target="desc">Description</button>
                <button class="tab-btn px-6 py-3 font-medium text-gray-600 hover:text-primary transition" data-target="review">Reviews (03)</button>
            </div>

            <div class="max-w-4xl mx-auto">
                <div id="info" class="tab-content hidden space-y-4">
                    <h4 class="font-bold text-lg">Information</h4>
                    <p>{!! $product->information !!}</p>
                </div>

                <div id="desc" class="tab-content">
                    <p class="leading-relaxed">{!! $product->description !!}</p>
                </div>

                <div id="review" class="tab-content hidden">
                    <div class="space-y-6 mb-10">
                        <div class="flex gap-4">
                            <img src="assets/images/author/author-1.png" class="w-16 h-16 rounded-full" alt="User">
                            <div>
                                <h6 class="font-bold">Rosie Silva <span class="text-xs font-normal text-gray-500 ml-2">11/20/2023</span></h6>
                                <div class="text-yellow-400 text-xs my-1">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </div>
                                <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse deleniti itaque velit explicabo at eum incidunt vel reprehenderit.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <img src="assets/images/author/author-2.png" class="w-16 h-16 rounded-full" alt="User">
                            <div>
                                <h6 class="font-bold">Aidyn Cody <span class="text-xs font-normal text-gray-500 ml-2">11/20/2023</span></h6>
                                <div class="text-yellow-400 text-xs my-1">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                                </div>
                                <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse deleniti itaque velit explicabo at eum incidunt vel reprehenderit.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded border">
                        <h3 class="text-xl font-bold mb-4">Add a review</h3>
                        <form class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" placeholder="Enter your name" class="w-full border p-3 rounded focus:border-primary outline-none">
                                <input type="email" placeholder="john.smith@example.com" class="w-full border p-3 rounded focus:border-primary outline-none">
                            </div>
                            <div>
                                <label class="block mb-2 font-medium">Rating:</label>
                                <div class="text-gray-400 hover:text-yellow-400 cursor-pointer text-lg inline-block transition">
                                    <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                                </div>
                            </div>
                            <textarea placeholder="Write your comments here" class="w-full border p-3 rounded h-32 focus:border-primary outline-none"></textarea>
                            <button class="bg-sky-700 text-white px-6 py-2 rounded hover:bg-primary transition">Submit Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-end mb-8">
                <h2 class="text-2xl font-bold">Related Products</h2>
                <div class="flex space-x-2">
                    <button class="related-prev w-10 h-10 rounded-full border hover:bg-primary hover:text-white transition flex items-center justify-center">
                        <i class="fa-solid fa-angle-left text-xl"></i>
                    </button>
                    <button class="related-next w-10 h-10 rounded-full border hover:bg-primary hover:text-white transition flex items-center justify-center">
                        <i class="fa-solid fa-angle-right text-xl"></i>
                    </button>
                </div>
            </div>
    
            <div class="swiper-container related-slider overflow-hidden">
                <div class="swiper-wrapper">
                    @forelse($relatedProducts as $relatedProduct)
                        <div class="swiper-slide">
                            <div class="group">
                                <div class="relative overflow-hidden rounded-xl bg-gray-100 aspect-[3/4]">
                                    <a href="{{ route('shop.productDetails', $relatedProduct->slug) }}">
                                        <img src="{{ asset('uploads/products/thumbnails/' . $relatedProduct->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700" alt="{{ $relatedProduct->name }}">
                                    </a>

                                    <!-- Wishlist -->
                                    <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/90 backdrop-blur flex items-center justify-center text-[#1a1a1a] hover:bg-primary hover:text-white transition-colors shadow-sm">
                                        <i class="ri-heart-line text-base"></i>
                                    </button>

                                    <div class="absolute inset-x-3 bottom-3 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                                        <a href="{{ route('home.index') }}" class="flex items-center justify-center gap-2 w-full bg-[#1a1a1a] text-white text-xs font-semibold tracking-[0.15em] uppercase py-3 rounded-lg hover:bg-primary transition-colors">
                                            <i class="ri-shopping-bag-line"></i> Add to Bag
                                        </a>
                                    </div>
                                </div>
                                <div class="mt-4 text-left">
                                    <h4 class="text-lg font-semibold text-[#1a1a1a]">
                                        <a href="{{ route('shop.productDetails', $relatedProduct->slug) }}" class="hover:text-primary transition-colors">{{ $relatedProduct->name }}</a>
                                    </h4>
                                    <p class="text-[#1a1a1a] font-bold mt-1">
                                        @if ($relatedProduct->sale_price)
                                            <span class="text-[#1a1a1a] font-bold">${{ number_format($relatedProduct->sale_price, 2) }}</span>
                                            <span class="text-gray-400 line-through text-sm">${{ number_format($relatedProduct->regular_price, 2) }}</span>
                                           @else
                                            <span class="text-[#1a1a1a] font-bold">${{ number_format($relatedProduct->regular_price, 2) }}</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">No related products found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content End -->

</x-app-layout>