<x-layouts.app :title="__($course->title)">
        
    <div href="#" class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> {{ $course->title }} </h5>
        <p class="mb-5 font-normal text-gray-700 dark:text-gray-400"> {{ $course->description }} </p>
        <x-botones.enlace href="{{ route('courses.index') }}"> Volver a cursos </x-botones.enlace>
    </div>

</x-layouts.app>