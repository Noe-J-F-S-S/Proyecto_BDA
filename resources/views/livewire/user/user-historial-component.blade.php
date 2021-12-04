<div>
    <div class="container mt-10 mb-10">
        <!-- component -->
        <table class="table-auto w-full">
            <thead class="text-2xl font-semibold uppercase text-gray-400 bg-gray-50">
                <tr>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-left">ID</div>
                    </th>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-left">User ID</div>
                    </th>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-left">Subtotal</div>
                    </th>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-center">Tax</div>
                    </th>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-center">Total</div>
                    </th>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-center">First Name</div>
                    </th>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-center">Last Name</div>
                    </th>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-center">Email</div>
                    </th>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-center">Acción</div>
                    </th>
                </tr>
            </thead>
            <tbody class="text-2xl divide-y divide-gray-100">
            @foreach($tabla as $fila => $campos)
                <tr>
                    <td class="p-2 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="font-medium text-gray-800">{{ $campos['id'] }}</div>
                        </div>
                    </td>
                    <td class="p-2 whitespace-nowrap">
                        <div class="text-left">{{ $campos['user_id'] }}</div>
                    </td>
                    <td class="p-2 whitespace-nowrap">
                        <div class="text-left font-medium text-green-500">{{ $campos['subtotal'] }}</div>
                    </td>
                    <td class="p-2 whitespace-nowrap">
                        <div class="text-center font-medium">{{ $campos['tax'] }}</div>
                    </td>
                    <td class="p-2 whitespace-nowrap">
                        <div class="text-center font-medium">{{ $campos['total'] }}</div>
                    </td>
                    <td class="p-2 whitespace-nowrap">
                        <div class="text-center font-medium">{{ $campos['firstname'] }}</div>
                    </td>
                    <td class="p-2 whitespace-nowrap">
                        <div class="text-center font-medium">{{ $campos['lastname'] }}</div>
                    </td>
                    <td class="p-2 whitespace-nowrap">
                        <div class="text-center font-medium">{{ $campos['email'] }}</div>
                    </td>
                    <td>
                    <div>
                        <div class="text-center">@livewire('boton-detalle-factura',['idOrder'=>$campos['id']],key($campos['id'].'det'))</div>
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </div>
</div>
