<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::latest()->get();

        return view('vehicles.index', compact('vehicles'));
    }

    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        return view('vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        abort_unless($vehicle->user_id === auth()->id(), 403);

        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        abort_unless($vehicle->user_id === auth()->id(), 403);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'type' => ['required', 'in:auto,moto,barca,motoscafo'],
            'price' => ['required', 'integer', 'min:0'],
            'city' => ['required', 'string', 'max:80'],
        ]);

        $vehicle->update($data);

        return redirect()->route('vehicles.show', $vehicle)->with('success', 'Annuncio aggiornato!');
    }

    public function home()
    {
        $latest = Vehicle::latest()->take(3)->get();

        return view('home', compact('latest'));
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'type' => ['required', 'in:auto,moto,barca,motoscafo'],
            'price' => ['required', 'integer', 'min:0'],
            'city' => ['required', 'string', 'max:80'],
        ]);

        Vehicle::create([
            'user_id' => auth()->id(),
            'title' => $data['title'],
            'type' => $data['type'],
            'price' => $data['price'],
            'city' => $data['city'],
            'views' => 0,
        ]);

        return redirect()->route('vehicles.index')->with('success', 'Annuncio pubblicato!');
    }

    // cestino dati” unico
    private function demoVehicles(): array
    {
        return [
            ['id' => 1, 'user_id' => 1, 'type' => 'auto', 'title' => 'Fiat Panda', 'price' => 4500, 'city' => 'Milano', 'views' => 120],
            ['id' => 2, 'user_id' => 2, 'type' => 'moto', 'title' => 'Yamaha MT-07', 'price' => 6200, 'city' => 'Verona', 'views' => 98],
            ['id' => 3, 'user_id' => 3, 'type' => 'motoscafo', 'title' => 'Motoscafo 5m', 'price' => 8900, 'city' => 'Venezia', 'views' => 45],
            ['id' => 4, 'user_id' => 4, 'type' => 'barca', 'title' => 'Barca Cabinata', 'price' => 15900, 'city' => 'Trieste', 'views' => 12],
            ['id' => 5, 'user_id' => 5, 'type' => 'auto', 'title' => 'BMW Serie 1', 'price' => 9900, 'city' => 'Padova', 'views' => 33],
            ['id' => 6, 'user_id' => 6, 'type' => 'moto', 'title' => 'Honda SH 300', 'price' => 3700, 'city' => 'Treviso', 'views' => 21],
        ];
    }
}
