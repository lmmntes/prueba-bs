    <form wire:submit='send'>
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 ">
            <div class="w-full">
                <label for="categ" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria</label>
                <select id="categ" wire:model.live='cat' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value="" selected hidden>Seleccionar Categoria</option>
                    @foreach ($cats as $item )
                    <option value="{{$item->id}}" >{{$item->nombre}}</option>
                    @endforeach
                </select>
            </div >
            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Producto</label>
                <select id="name" wire:model.live='producto' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option selected="">Seleccionar Producto</option>
                    @foreach ($productos as $item )
                    <option value="{{$item->id}}" >{{$item->nombre}}</option>
                    @endforeach                                     
                </select>                                
            </div>                                
            <div class="grid md:grid-cols-2 md:gap-6">                                
                <div class="w-full">
                    <label for="precio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                    <input readonly wire:model='precio' type="number" name="precio" id="precio" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                </div>   
                <div class="w-full">
                    <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descuento</label>
                    <label class="p-2.5 inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="desc" value="" class="sr-only peer"  @if ($descuento==1) checked @endif disabled>
                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                    </label>
                </div>   
            </div>
            <div class="w-full">
                <label for="cant" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad</label>
                <input wire:model='cant' type="number" name="cant" id="cant" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
            </div>                               
        </div>
        <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
            Agregar Producto
        </button>
    </form>
