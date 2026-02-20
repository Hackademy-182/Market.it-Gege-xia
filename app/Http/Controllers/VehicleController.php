<?php

namespace App\Http\Controllers;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = [
            ['id' => 1, 'type' => 'auto', 'title' => 'Fiat Panda', 'price' => 4500, 'city' => 'Milano'],
            ['id' => 2, 'type' => 'moto', 'title' => 'Yamaha MT-07', 'price' => 6200, 'city' => 'Verona'],
            ['id' => 3, 'type' => 'barca', 'title' => 'Motoscafo 5m', 'price' => 8900, 'city' => 'Venezia'],
        ];

        return view('vehicles.index', compact('vehicles'));
    }

    public function show($id)
    {
        $vehicles = [
            1 => ['id' => 1, 'type' => 'auto', 'title' => 'Fiat Panda', 'price' => 4500, 'city' => 'Milano', 'views' => 120],
            2 => ['id' => 2, 'type' => 'moto', 'title' => 'Yamaha MT-07', 'price' => 6200, 'city' => 'Verona', 'views' => 98],
            3 => ['id' => 3, 'type' => 'barca', 'title' => 'Motoscafo 5m', 'price' => 8900, 'city' => 'Venezia', 'views' => 45],
        ];

        abort_unless(isset($vehicles[$id]), 404);

        $vehicle = $vehicles[$id];

        return view('vehicles.show', compact('vehicle'));
    }
}
