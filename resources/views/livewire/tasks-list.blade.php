<div>
    <h1 class="mb-5"> Soy un componente para tareas </h1>

    <p> Cantidad de veces que se renderizó el componente: {{ $renderizados }} </p>

    <form class="mb-5" wire:submit="add()">
        <flux:input wire:model="title" type="text" class="mb-1" placeholder="Ingrese el título de la tarea" />
        <flux:button type="submit"> Agregar </flux:button>
    </form>

    <form class="mb-5">
        <flux:input wire:model.live.debounce.1000ms="search" type="text" class="mb-1" placeholder="Ingrese la tarea a buscar" />
    </form>

    <ul wire:poll>
        @foreach ($tasks as $t)
            <li class="mb-3">
                <input 
                    type="checkbox" 
                    @checked($t->completed) 
                    wire:change="change({{$t}})"
                />
                @if($t->completed)
                    <span class="line-through text-green-700"> {{ $t->title }} </span>
                @else
                    <span class=" text-red-700"> {{ $t->title }} </span>
                @endif
            </li>
        @endforeach
    </ul>
</div>
