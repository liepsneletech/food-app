<section>
    <header>
        <h2 class="text-lg font-medium">
            {{ __('Pakeisti slaptažodį') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Būkite tikri, kad jūsų slaptažodis yra pakankamai saugus.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="space-y-2">
            <x-form.label for="current_password" :value="__('Dabartinis slaptažodis')" />

            <x-form.input id="current_password" name="current_password" type="password" class="block w-full"
                autocomplete="current-password" />

            <x-form.error :messages="$errors->updatePassword->get('current_password')" />
        </div>

        <div class="space-y-2">
            <x-form.label for="password" :value="__('Naujas slaptažodis')" />

            <x-form.input id="password" name="password" type="password" class="block w-full"
                autocomplete="new-password" />

            <x-form.error :messages="$errors->updatePassword->get('password')" />
        </div>

        <div class="space-y-2">
            <x-form.label for="password_confirmation" :value="__('Patvirtinti naują slaptažodį')" />

            <x-form.input id="password_confirmation" name="password_confirmation" type="password" class="block w-full"
                autocomplete="new-password" />

            <x-form.error :messages="$errors->updatePassword->get('password_confirmation')" />
        </div>

        <div class="flex items-center gap-4">
            <button class="secondary-btn">
                {{ __('Išsaugoti') }}
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">
                    {{ __('Išsaugota.') }}
                </p>
            @endif
        </div>
    </form>
</section>
