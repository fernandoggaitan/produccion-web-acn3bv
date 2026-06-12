<div>
    <h1 class="mb-5"> Soy un componente para tareas </h1>

    <form class="mb-5" wire:submit="add()">
        <flux:input wire:model="title" type="text" class="mb-1" placeholder="Ingrese el título de la tarea" />
        <flux:button type="submit"> Agregar </flux:button>
    </form>

    <form class="mb-5">
        <flux:input wire:model.live.debounce.1000ms="search" type="text" class="mb-1" placeholder="Ingrese la tarea a buscar" />
    </form>

    @if ($msj)
        <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            {{ $msj }}
        </div>
    @endif

    <ul>
        @foreach ($tasks as $t)
            @livewire(
                'TaskItem', 
                ['task' => $t], 
                key($t->id)
            )
        @endforeach
    </ul>
</div>
