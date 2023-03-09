<x-front-layout>
    <div class="min-h-[86vh] bg-[url('/public/assets/img/hero-bg.jpg')] bg-cover bg-no-repeat bg-fixed py-6">
        <x-auth-card>
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="grid gap-4">
                    <!-- Name -->
                    <div class="space-y-2">
                        <x-form.label for="name" :value="__('Vardas')" />

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <i class="fa-solid fa-user text-sm"></i>
                            </x-slot>

                            <x-form.input withicon id="name" class="block w-full" type="text" name="name"
                                :value="old('name')" autofocus placeholder="{{ __('Vardas') }}" />
                        </x-form.input-with-icon-wrapper>
                    </div>

                    <!-- Email Address -->
                    <div class="space-y-2">
                        <x-form.label for="email" :value="__('El. paštas')" />

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <i class="fa-solid fa-envelope text-sm"></i>
                            </x-slot>

                            <x-form.input withicon id="email" class="block w-full" type="email" name="email"
                                :value="old('email')" placeholder="{{ __('El. paštas') }}" />
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
                                autocomplete="new-password" placeholder="{{ __('Slaptažodis') }}" />
                        </x-form.input-with-icon-wrapper>
                    </div>

                    <!-- Confirm Password -->
                    <div class="space-y-2">
                        <x-form.label for="password_confirmation" :value="__('Patvirtinti slaptažodį')" />

                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <i class="fa-solid fa-lock text-sm"></i>
                            </x-slot>

                            <x-form.input withicon id="password_confirmation" class="block w-full" type="password"
                                name="password_confirmation" placeholder="{{ __('Patvirtinti slaptažodį') }}" />
                        </x-form.input-with-icon-wrapper>
                    </div>

                    <div>
                        <button class="secondary-btn flex items-center gap-2">
                            <span>{{ __('Registruotis') }}</span>
                        </button>
                    </div>

                    <p class="text-sm text-gray-600">
                        {{ __('Jau turite paskyrą?') }}
                        <a href="{{ route('login') }}" class="text-cyan-600 hover:underline">
                            {{ __('Prisijunkite') }}
                        </a>
                    </p>
                </div>
            </form>
        </x-auth-card>
    </div>
</x-front-layout>
