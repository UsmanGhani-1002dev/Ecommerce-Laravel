<x-app-layout>


    <div class="relative bg-sky-700 text-white h-64 flex items-center justify-center bg-cover bg-center" style="background-image: url('assets/images/page-banner.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="relative z-10 text-center">
            <h2 class="text-4xl font-bold mb-2">Forgot Password</h2>
            <ul class="flex justify-center space-x-2 text-sm">
                <li><a href="{{ route('home.index') }}" class="hover:text-primary">Home</a></li>
                <li>/</li>
                <li class="text-primary">Forgot Password</li>
            </ul>
        </div>
    </div>


    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="flex justify-center">
                <div class="w-full lg:w-1/2">
                    <div class="bg-gray-50 border rounded-lg p-8 shadow-sm">
                        <h4 class="text-2xl font-bold text-center mb-2">Create New Account</h4>
                        <p class="text-center text-sm mb-8 text-gray-500">
                            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                        </p>
                        
                        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                            @csrf
                            
                            <div>
                                <input type="email" placeholder="Email Address *" id="email" name="email" :value="old('email')" class="w-full border p-3 rounded focus:outline-none focus:border-primary transition" required autocomplete="username" />
                                @error('email')
                                    <p class="text-sm text-red-600 mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>
     
                            <div class="pt-4">
                                <button type="submit" class="w-full bg-primary text-white font-medium py-3 rounded hover:bg-secondary transition shadow-lg">
                                    Email Password Reset Link
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form> --}}
</x-app-layout>
