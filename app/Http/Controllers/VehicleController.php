<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    public function home()
    {
        $latest = Vehicle::latest()->take(3)->get();

        return view('home', compact('latest'));
    }

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
            'user_id' => Auth::id(),
            'title' => $data['title'],
            'type' => $data['type'],
            'price' => $data['price'],
            'city' => $data['city'],
            'views' => 0,
        ]);

        return redirect()->route('vehicles.index')
            ->with('success', 'Annuncio pubblicato!');
    }

    public function edit(Vehicle $vehicle)
    {
        if (! $this->isOwner($vehicle)) {
            return redirect()
                ->route('vehicles.index')
                ->with('error', 'Non puoi modificare questo annuncio.');
        }

        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        if (! $this->isOwner($vehicle)) {
            return redirect()
                ->route('vehicles.index')
                ->with('error', 'Non puoi modificare questo annuncio.');
        }

        $data = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'type' => ['required', 'in:auto,moto,barca,motoscafo'],
            'price' => ['required', 'integer', 'min:0'],
            'city' => ['required', 'string', 'max:80'],
        ]);

        $vehicle->update($data);

        return redirect()
            ->route('vehicles.show', $vehicle->id)
            ->with('success', 'Annuncio aggiornato!');
    }

    public function destroy(Vehicle $vehicle)
    {
        if (! $this->isOwner($vehicle)) {
            return redirect()
                ->route('vehicles.index')
                ->with('error', 'Non puoi cancellare questo annuncio.');
        }

        $vehicle->delete();

        return redirect()
            ->route('vehicles.index')
            ->with('success', 'Annuncio cancellato!');
    }

    private function isOwner(Vehicle $vehicle): bool
    {
        return Auth::check() && (int) $vehicle->user_id === (int) Auth::id();
    }
}
