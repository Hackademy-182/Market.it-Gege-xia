<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = $this->demoVehicles();

        return view('vehicles.index', compact('vehicles'));
    }

    public function show($id)
    {
        $vehicles = collect($this->demoVehicles())->keyBy('id');

        abort_unless($vehicles->has($id), 404);

        $vehicle = $vehicles[$id];

        return view('vehicles.show', compact('vehicle'));
    }

    public function home()
    {
        $latest = array_slice($this->demoVehicles(), 0, 3);

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

        return redirect()->route('vehicles.index')->with('success', 'Annuncio inviato (demo).');
    }

    // cestino dati” unico
    private function demoVehicles(): array
    {
        return [
            ['id' => 1, 'type' => 'auto', 'title' => 'Fiat Panda', 'price' => 4500, 'city' => 'Milano', 'views' => 120],
            ['id' => 2, 'type' => 'moto', 'title' => 'Yamaha MT-07', 'price' => 6200, 'city' => 'Verona', 'views' => 98],
            ['id' => 3, 'type' => 'motoscafo', 'title' => 'Motoscafo 5m', 'price' => 8900, 'city' => 'Venezia', 'views' => 45],
            ['id' => 4, 'type' => 'barca', 'title' => 'Barca Cabinata', 'price' => 15900, 'city' => 'Trieste', 'views' => 12],
            ['id' => 5, 'type' => 'auto', 'title' => 'BMW Serie 1', 'price' => 9900, 'city' => 'Padova', 'views' => 33],
            ['id' => 6, 'type' => 'moto', 'title' => 'Honda SH 300', 'price' => 3700, 'city' => 'Treviso', 'views' => 21],
        ];
    }
}
