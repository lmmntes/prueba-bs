<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input wire:model.live="search" type="text" id="table-search" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar Producto">
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>                    
                <th scope="col" class="px-6 py-3">
                    Subtotal
                </th>
                <th scope="col" class="px-6 py-3">
                    IVA
                </th>                                    
                <th scope="col" class="px-6 py-3">
                    Total
                </th> 
                <th scope="col" class="px-6 py-3">
                    Fecha
                </th>  
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{$item->subtotal}}</div>
                    </div>  
                </th>                                    
                <td class="px-6 py-4">
                    {{$item->iva}}
                </td>
                <td class="px-6 py-4">
                    {{$item->total}}
                </td> 
                <td class="px-6 py-4">
                    {{$item->created_at}}
                </td>                                   
                
            </tr>                       
            @endforeach                             
        </tbody>
        @if ($data->hasPages())
        <tfoot class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
            <tr>
                <td colspan="9" class="border px-4 py-2">
                    {{ $data->links() }}
                </td>
            </tr>
        </tfoot>
        @endif  
    </table>
    
</div> 
