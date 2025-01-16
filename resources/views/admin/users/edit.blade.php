<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edytuj użytkownika: {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white ">
                <div class="main">
                    <!-- Formularz edycji użytkownika -->
                    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="form">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="tyt">Imię</label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="tyt">Email</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="role" class="tyt">Rola</label>
                            <select name="role" id="role" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Użytkownik</option>
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="nauczyciel" {{ $user->role === 'nauczyciel' ? 'selected' : '' }}>Nauczyciel</option>
                                <option value="dyrektor" {{ $user->role === 'dyrektor' ? 'selected' : '' }}>Dyrektor</option>

                            </select>
                        </div>

                        <!-- Przycisk zapisywania -->
                        <button type="submit" class="btn btn-primary btn-sm">
                            Zapisz zmiany
                        </button>
                    </form>

                    <!-- Formularz usuwania użytkownika -->
                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Czy na pewno chcesz usunąć tego użytkownika? \nTo działanie jest nieodwracalne!');" class="mt-4">
                        @csrf
                        @method('DELETE')

                        <!-- Przycisk usuwania -->
                        <button type="submit" class="btn btn-danger btn-sm">
                            Usuń użytkownika
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
