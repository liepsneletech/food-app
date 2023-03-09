<x-front-layout>
    <div class="min-h-[86vh] bg-[url('/public/assets/img/hero-bg.jpg')] bg-cover bg-no-repeat bg-fixed py-20">
        <x-auth-card>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-5" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="grid gap-4">
                    <!-- Email Address -->
                    <div class="space-y-2">
                        <x-form.label for="email" :value="__('El. paštas')" />

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <i class="fa-solid fa-envelope text-sm"></i>
                            </x-slot>

                            <x-form.input withicon id="email" class="block w-full" type="email" name="email"
                                :value="old('email')" placeholder="{{ __('El. paštas') }}" autofocus />
                        </x-form.input-with-icon-wrapper>
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <x-form.label for="password" :value="__('Slaptažodis')" />

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <i class="fa-solid fa-lock text-sm"></i>
                            </x-slot>

                            <x-form.input withicon id="password" class="block w-full" type="password" name="password"
                                autocomplete="current-password" placeholder="{{ __('Slaptažodis') }}" />
                        </x-form.input-with-icon-wrapper>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="text-cyan-500 border-gray-300 rounded focus:border-cyan-300 focus:ring focus:ring-cyan-500"
                                name="remember">

                            <span class="ml-2 text-sm text-gray-600">
                                {{ __('Prisiminti duomenis') }}
                            </span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-cyan-600 hover:underline" href="{{ route('password.request') }}">
                                {{ __('Pamiršote slaptažodį?') }}
                            </a>
                        @endif
                    </div>

                    <div>
                        <button class="secondary-btn">
                            <span>{{ __('Prisijungti') }}</span>
                        </button>
                    </div>

                    @if (Route::has('register'))
                        <p class="text-sm text-gray-600">
                            {{ __('Neturite paskyros?') }}
                            <a href="{{ route('register') }}" class="text-cyan-600 hover:underline">
                                {{ __('Registruotis') }}
                            </a>
                        </p>
                    @endif
                </div>
            </form>
        </x-auth-card>
    </div>
</x-front-layout>
