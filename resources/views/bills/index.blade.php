<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Facturas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900">
                    <h1>Lista de Ventas</h1>

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                                <th>Productos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bills as $bill)
                                <tr>
                                    <td>{{ $bill->id }}</td>
                                    <td>{{ $bill->user->name }}</td>
                                    <td>{{ $bill->date }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($bill->products as $product)
                                                <li>{{ $product->modelo }} (x{{ $product->pivot->quantity }})</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a href="{{ route('bills.create') }}" class="bg-blue-500 text-red p-2 rounded mt-4 inline-block">Registrar Venta</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
