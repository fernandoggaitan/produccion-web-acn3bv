<x-layouts.app :title="__('Lista de cursos')">

    <h1 class="mb-3"> {{ $title }} </h1>

    @if (session('status'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <x-botones.enlace href="{{ route('courses.create') }}"> Agregar curso nuevo </x-botones.enlace>

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
                    <th scope="col" class="px-6 py-3" colspan="2">
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
                            <x-botones.enlace> Ver </x-botones.enlace>
                        </td>
                        <td class="px-6 py-4">
                            <x-botones.enlace> Editar </x-botones.enlace>
                        </td>
                    </tr>
                @endforeach            
            </tbody>
        </table>

        {{ $courses->links() }}

    </div>

</x-layouts.app>