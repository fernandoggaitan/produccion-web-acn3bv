<x-layouts.app :title="__('Lista de cursos')">

    <h1 class="mb-3"> {{ $title }} </h1>

    @if (session('status'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <x-botones.enlace href="{{ route('courses.create') }}"> Agregar curso nuevo </x-botones.enlace>

    <form action="{{ route('courses.index') }}" method="GET" class="my-5">
        <div class="mb-5">
            <label for="search" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Curso a buscar </label>
            <input type="text" value="{{ $search }}" name="search" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese el título o descripción del curso" />
        </div>
        <x-botones.btn-success type="submit"> Buscar </x-botones.btn-success>
        <x-botones.enlace href="{{ route('courses.index') }}"> Limpiar búsqueda </x-botones.enlace>
    </form>

    <div class="relative overflow-x-auto mt-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Título
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                    <th scope="col" class="px-6 py-3" colspan="3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $c)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $c->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $c->price }}
                        </td>
                        <td class="px-6 py-4">
                            <x-botones.enlace href="{{ route('courses.show', $c) }}"> Ver </x-botones.enlace>
                        </td>
                        <td class="px-6 py-4">
                            <x-botones.enlace href="{{ route('courses.edit', $c) }}"> Editar </x-botones.enlace>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('courses.destroy', $c) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-botones.btn-danger type="submit"> Eliminar </x-botones.btn-danger>
                            </form>
                        </td>
                    </tr>
                @endforeach            
            </tbody>
        </table>

        {{ $courses->appends( ['search' => $search] )->links() }}

    </div>

</x-layouts.app>