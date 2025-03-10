<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nueva Venta
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white-900">
                    <h1>Registrar Venta</h1>

                    <form action="{{ route('bills.store') }}" method="POST">
                        @csrf
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="products[]" value="{{ $producto->id }}">
                                            {{ $producto->modelo }} - {{ $producto->marca }}
                                        </td>
                                        <td>
                                            <input type="number" name="quantities[]" min="1" value="1">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="submit" class="bg-green-500 text-black p-2 rounded mt-4">Registrar Venta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
