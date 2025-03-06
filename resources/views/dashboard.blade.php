<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Bienvenido al Dashboard</h1>

                <p class="text-gray-600 dark:text-gray-300">
                    Aquí puedes gestionar tu perfil y usuarios.
                </p>

                <div class="mt-4">
                        <a href="{{ route('productos.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
                            Ver Productos
                        </a>
                    </div>

            </div>
        </div>
    </div>
</x-app-layout>
