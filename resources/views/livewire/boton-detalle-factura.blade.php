<div>
    <x-jet-danger-button wire:click="$emitSelf('cargar')" class="text-xl">
        <h1>
            Detalle de Boleta
        </h1>


    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            <h1>Detalle de Boleta</h1>

        </x-slot>
        <x-slot name="content">
            <div class="mb-4" style="display: flex; justify-content: center;">

                <!-- component -->
                <table>
                    <thead class="text-3xl font-semibold uppercase text-gray-400 bg-gray-50">
                        <tr>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Producto</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Nº Boleta</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Precio</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Cantidad</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-3xl divide-y divide-gray-100">
                    @foreach($tabla as $fila => $campos)
                        <tr>
                            <td class="p-2 whitespace-nowrap">
                                <div class="flex items-center">
                                        <img class="rounded-full" src="{{asset('assets/images/products')}}/{{$campos['image']}}" width="100px" height="100px" alt="Alex Shatov">

                                    <div class="font-medium text-gray-800">{{$campos['name']}}</div>
                                </div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-left">{{$campos['order_id']}}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-left font-medium text-green-500">{{$campos['price']}}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="font-medium text-center">{{$campos['quantity']}}</div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-danger-button wire:click="$set('open',false)" class="text-2xl">
                Volver
            </x-jet-danger-button>

        </x-slot>

    </x-jet-dialog-modal>
</div>

