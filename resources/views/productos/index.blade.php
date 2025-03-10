<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Lista de Productos
        </h2>
    </x-slot>

    <div class="py-12">



        <div class="p-6 text-black-900 dark:text-black-100">
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif



            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-black-900 dark:text-gray-100">
                        <h1>Lista de Productos</h1>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table border="1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Modelo</th>
                                    <th>Marca</th>
                                    <th>Año</th>
                                    <th>Stock</th>
                                    <th>Acciones</th> <!-- Nueva columna -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                    <tr>
                                        <td>{{ $producto->id }}</td>
                                        <td>{{ $producto->modelo }}</td>
                                        <td>{{ $producto->marca }}</td>
                                        <td>{{ $producto->año }}</td>
                                        <td>
                                            <!-- Formulario para actualizar solo el stock -->
                                            <form action="{{ route('productos.updateStock', $producto->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="number" name="stock" value="{{ $producto->stock }}" min="0">
                                                <button type="submit" class="btn btn-sm btn-warning">Actualizar
                                                    Stock</button>
                                            </form>

                                        </td>
                                        <td>
                                            <!-- Botón Editar -->
                                            <a href="{{ route('productos.edit', $producto->id) }}"
                                                class="btn btn-sm btn-primary">Editar</a>

                                            <!-- Formulario de eliminación con confirmación -->
                                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST"
                                                style="display:inline;"
                                                onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('productos.show', $producto->id) }}"
                                                class="bg-blue-500 text-white p-2 rounded">
                                                Ver Detalles
                                            </a>
                                        </td>
                                        <td><a href="{{ route('bills.create') }}" class="bg-yellow-500 text-white p-2 rounded">
    Registrar Venta
</a>
</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Botón para crear nuevo producto -->
                        <a href="{{ route('productos.create') }}" class="btn btn-primary mt-4">Nuevo Producto</a>

                        <a href="{{ route('bills.index') }}" class="bg-green-500 text-white p-2 rounded">
                            Ver Ventas
                        </a>

                    </div>
                </div>
            </div>
        </div>
</x-app-layout>