<x-layouts.app title="Annunci">
    <h1>Annunci</h1>

    <ul>
        @foreach ($vehicles as $v)
            <li>
                <a href="{{ route('vehicles.show', $v['id']) }}">
                    {{ $v['title'] }} — € {{ $v['price'] }} — {{ $v['city'] }}
                </a>
            </li>
        @endforeach
    </ul>
</x-layouts.app>
