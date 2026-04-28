<x-layouts.app :title="__('Dashboard')">

    <h1> {{ $title }} </h1>
    <ul>
        @foreach($courses as $c)
            <li> {{ $c->title }} </li>
        @endforeach
    </ul>

</x-layouts.app>