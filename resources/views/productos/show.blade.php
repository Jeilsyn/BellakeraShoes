<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detalles del Producto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Detalles del Producto</h1>
                    <p><strong>ID:</strong> {{ $producto->id }}</p>
                    <p><strong>Modelo:</strong> {{ $producto->modelo }}</p>
                    <p><strong>Marca:</strong> {{ $producto->marca }}</p>
                    <p><strong>Año:</strong> {{ $producto->año }}</p>
                    <p><strong>Stock:</strong> {{ $producto->stock }}</p>

                    <a href="{{ route('productos.index') }}" class="bg-blue-500 text-white p-2 rounded">Volver</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
