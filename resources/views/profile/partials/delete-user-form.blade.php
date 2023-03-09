<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium">
            {{ __('Ištrinti paskyrą') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ištrynus savo paskyrą, bus ištrinti ir visi su ja susiję duomenys.') }}
        </p>
    </header>

    <button class="primary-btn py-1.5" x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        {{ __('Ištrinti paskyrą') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium">
                {{ __('Ar tikrai norite ištrinti paskyrą?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Ištrynus savo paskyrą, bus ištrinti ir visi su ja susiję duomenys.') }}
            </p>

            <div class="mt-6 space-y-6">
                <x-form.label for="delete-user-password" value="Password" class="sr-only" />

                <x-form.input id="delete-user-password" name="password" type="password" class="block w-3/4"
                    placeholder="Slaptažodis" />

                <x-form.error :messages="$errors->userDeletion->get('password')" />
            </div>

            <div class="mt-6 flex justify-start gap-4">
                <button type="button" class="secondary-btn" x-on:click="$dispatch('close')">
                    {{ __('Atšaukti') }}
                </button>

                <button class="primary-btn py-1.5">
                    {{ __('Ištrinti paskyrą') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
