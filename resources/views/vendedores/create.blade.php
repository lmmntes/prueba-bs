<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vendedores') }}
        </h2>
    </x-slot>   

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-full">
                    <div class=" mx-auto max-w-4xl ">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Agregar Vendedor</h2>
                        <form id="createForm">
                            @csrf
                            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                <div>
                                    <label  for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                                    <input required wire:model="nombre" name="nombre" type="text" value="" id="nombre"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                </div>                    
                                <div>
                                    <label for="cedula" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cedula</label>
                                    <input required wire:model="cedula" name="cedula" type="number" value=""  id="cedula" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                              
                            </div>
                            <div class="flex items-center space-x-4">
                                <button  type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    Crear
                                </button>                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

<script>           
    $("#createForm").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var actionUrl = form.attr('action');

        $.ajax({
            type: "POST",
            url: "{{route('vendedores.store')}}",
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
                Livewire.navigate("{{route('vendedores.index')}}");
            }
        });

    });            
</script>