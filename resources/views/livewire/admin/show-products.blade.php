<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                
                <div>

                    <x-slot name="header">
                        <div class="flex items-center">
                            <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                                Lista de productos
                            </h2>
                
                            <x-button-enlace class="ml-auto" color="gray" href="{{-- {{route('admin.products.create')}} --}}">
                                Agregar producto
                            </x-button-enlace> 
                        </div>
                    </x-slot>
                
                
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="container py-12">
                
                        <x-table-responsive>
                
                            <div class="px-6 py-4">
                
                                <x-jet-input type="text" 
                                    wire:model="search" 
                                    class="w-full"
                                    placeholder="Ingrese el nombre del procucto que quiere buscar" />
                
                            </div>
                
                            @if ($products->count())
                                
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Nombre
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Categoría
                                                
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Estado
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Precio
                                            </th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Editar</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                
                                        @foreach ($products as $product)
                
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                            @if ($product->image)
                                                                <img class="h-10 w-10 rounded-full object-cover"
                                                                    src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                                            @else
                                                                <img class="h-10 w-10 rounded-full object-cover"
                                                                    src="https://claudiorigollet.cl/image/default_small.jpg" alt="">
                                                            @endif
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $product->name }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                
                                                    <div class="text-sm text-gray-900">
                                                         {{ $product->subcategory->category->name }}
                                                    </div>
                
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @switch($product->quantity > 10)
                                                        @case(0)
                                                            <span
                                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                {{$product->quantity}}
                                                            </span>
                                                        @break
                                                        @case(2)
                                                            <span
                                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                {{$product->quantity}}
                                                            </span>
                                                        @break
                                                        @default
                
                                                    @endswitch
                
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    $ {{$product->price}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="{{-- {{route('dashboard.products.edit', $product)}} --}}" class="hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Edit</a>
                                                    <a href="{{-- {{route('dashboard.products.destroy', $product->id)}} --}}" class="hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Eliminar</a>
                                                </td>
                                            </tr>
                
                                        @endforeach
                                        <!-- More people... -->
                                    </tbody>
                                </table>
                
                            @else
                                <div class="px-6 py-4">
                                    No hay ningún registro coincidente
                                </div>
                            @endif
                
                           {{--  @if ($products->hasPages())
                                
                                <div class="px-6 py-4">
                                    {{ $products->links() }}
                                </div>
                                
                            @endif --}}
                                
                
                        </x-table-responsive>
                    </div>
                
                
                </div>




                
            </div>
        </div>
    </div>
</div>
