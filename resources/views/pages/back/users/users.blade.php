<x-back-layout>
    <div class="bg-gray-100 min-h-screen">
        <div class="container">
            <div class="flex flex-col gap-5 rounded-lg p-1 md:p-6 drop-shadow-sm w-full">
                <div class="grid grid-cols-1 items-center mb-6">
                    <h1 class="primary-heading justify-self-center col-start-1 col-end-2 row-start-1 row-end-2">
                        Vartotojai
                    </h1>
                </div>

                @foreach ($users as $user)
                    <div
                        class="grid grid-cols-1 lg:grid-cols-4 items-center justify-between gap-5 border-l-8 border-cyan-600 bg-white px-6 py-3 rounded-lg">
                        <p class="font-bold">{{ $user->name }}</p>
                        <p>Rolė: {{ $user->role == 1 ? 'Klientas' : 'Adminas' }} </p>
                        <p>{{ $user->email }}</p>
                        <div class="flex gap-3 justify-self-end">
                            <form action="{{ route('admin-users-delete', $user) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="gray-btn py-2 text-sm">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
</x-back-layout>
