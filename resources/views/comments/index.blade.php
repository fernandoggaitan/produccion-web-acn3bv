<x-layouts.app :title="__('Comentarios de los usuarios')">
    <ul>
        @foreach ($comments as $c)
            <li class="mb-5">
                <div>
                    <span class="text-gray-400"> 
                    {{ $c->created_at->format('d/m/Y H:i:s') }} 
                    </span>
                    <span class="font-bold"> 
                        {{ $c->user->name }}
                    </span>
                    dice:
                </div>
                {{ $c->comment }}
            </li>
        @endforeach
    </ul>
    {{ $comments->links() }}
</x-layouts.app>