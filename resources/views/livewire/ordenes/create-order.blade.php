<div class="max-w-full">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <form wire:submit='save' >
        <div class="grid grid-cols-3 gap-4 space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
            <div class="flex items-center ">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Orden de compra</label>                
            </div>
            <div class="flex items-center ">
                <label for="cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cliente:</label>
                <input required wire:model='nombre' value="" readonly id="cliente" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            </div>            
            <div class="flex items-center ">
                <label for="vendedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vendedor:</label> 
                <select wire:model='vendedor' required id="vendedor" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                    <option value="" selected hidden>Seleccionar</option>
                    @foreach ($vendedores as $item )
                    <option value={{$item->id}} >{{$item->nombre}}</option>
                    @endforeach
                </select>               
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>                    
                    <th scope="col" class="px-6 py-3">
                        Producto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cantidad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descuento
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Subtotal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Borrar
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="ps-3">
                            <div class="text-base font-semibold">{{$item->nombre}}</div>
                        </div>  
                    </th>
                    <td class="px-6 py-4">
                        {{$item->cant}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->precio}}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            @if ($item->descuento==1)  
                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Si
                            @else
                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> No
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        {{$item->subtotal}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->total}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
                    </td>
                </tr>                       
                @endforeach                             
            </tbody>
            <tfoot class="text-xs font-semibold text-right uppercase text-gray-400 bg-gray-50">
                <tr>
                    <td colspan="7" class="border px-4 py-2">
                        Subtotal: {{ $subtotal }}
                    </td>                    
                </tr>
                <tr>
                    <td colspan="7" class="border px-4 py-2">
                        Total: {{ $total }}
                    </td>
                </tr>
            </tfoot>
        </table>
        <input required wire:model='id_cliente' hidden type="number">
        <input required wire:model='items' hidden type="text">
        <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">Crear Orden</button>

    </form>
    </div>
</div>