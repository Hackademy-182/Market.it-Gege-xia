<x-layouts.app :title="$vehicle['title']">
    <a href="{{ route('vehicles.index') }}">← Torna alla lista</a>

    <h1>{{ $vehicle['title'] }}</h1>
    <p>Tipo: {{ $vehicle['type'] }}</p>
    <p>Prezzo: € {{ $vehicle['price'] }}</p>
    <p>Città: {{ $vehicle['city'] }}</p>
    <p>Visite: {{ $vehicle['views'] }}</p>
</x-layouts.app>
