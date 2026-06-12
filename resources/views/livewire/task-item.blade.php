<li class="mb-5">

    <div wire:loading> 
       Modificando tarea. Por favor espere...
    </div>

    <div wire:loading.remove>
        <input 
            type="checkbox" 
            @checked($completed) 
            wire:change="change()"
        />
        @if($completed)
            <span class="line-through text-green-700"> Resuelta </span>
        @else
            <span class=" text-red-700"> No resuelta </span>
        @endif
        <flux:input wire:model="title" type="text" class="mb-1" />
        <flux:button type="button" wire:click="update()"> Modificar </flux:button>
        <flux:button type="button" wire:click="delete()"> Eliminar </flux:button>
    </div>
</li>