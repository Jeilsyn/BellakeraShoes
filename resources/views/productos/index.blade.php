<x-app-layout> 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Lista de Productos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
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
                                        <form action="{{ route('productos.updateStock', $producto->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="number" name="stock" value="{{ $producto->stock }}" min="0">
                                            <button type="submit" class="btn btn-sm btn-warning">Actualizar Stock</button>
                                        </form>
                                    </td>
                                    <td>
                                        <!-- Botón Editar -->
                                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-primary">Editar</a>

                                        <!-- Formulario de eliminación con confirmación -->
                                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Botón para crear nuevo producto -->
                    <a href="{{ route('productos.create') }}" class="btn btn-primary mt-4">Nuevo Producto</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
