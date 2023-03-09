<section>
    <header>
        <h2 class="text-lg font-medium">
            {{ __('Paskyros informacija') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Atnaujinkite savo paskyros informaciją ir el. pašto adresą.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="space-y-2">
            <x-form.label for="name" :value="__('Vardas')" />

            <x-form.input id="name" name="name" type="text" class="block w-full" :value="old('name', $user->name)" required
                autofocus autocomplete="name" />

            <x-form.error :messages="$errors->get('name')" />
        </div>

        <div class="space-y-2">
            <x-form.label for="email" :value="__('El. paštas')" />

            <x-form.input id="email" name="email" type="email" class="block w-full" :value="old('email', $user->email)" required
                autocomplete="email" />

            <x-form.error :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-700">
                        {{ __('Jūsų el. paštas yra nepatvirtintas.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Paspauskite, kad būtų pakartotinai nusiųstas patvirtinimo el. laiškas.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Nauja patvirtinimo nuoroda buvo nusiųsta į jūsų el. paštą.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button class="secondary-btn">
                {{ __('Išsaugoti') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">
                    {{ __('Išsaugota.') }}
                </p>
            @endif
        </div>
    </form>
</section>
