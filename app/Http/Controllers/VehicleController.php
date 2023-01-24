<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Person;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehicle::paginate(5);
        return view('vehicle.index', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personas = Person::all();
        return view('vehicle.create', compact('personas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $validated = $request->validate([
            'duenio' => 'required',
            'marcaVehiculo' => 'required',
            'modeloVehiculo' => 'required',
            'anioVehiculo' => 'required|digits_between:4,4',
            'precioVehiculo' => 'required',
        ]);

        try {
            $vehiculo = new Vehicle();
            $vehiculo->marca = $request->marcaVehiculo;
            $vehiculo->modelo = $request->modeloVehiculo;
            $vehiculo->anio = $request->anioVehiculo;
            $vehiculo->precio = $request->precioVehiculo;
    
            $persona = Person::find($request->duenio);
            $vehiculo->person()->associate($persona);
    
            $vehiculo->save();
        } catch (\Throwable $th) {
            Log::info('Error en store de contralador de vehiculo');
            Log::error($th);
            return redirect()->route('vehiculos.index')->with('success', 'El vehiculo ha sido creado exitosamente');
        }

        return redirect()->route('vehiculos.index')->with('success', 'El vehiculo ha sido creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personas = Person::all();
        $vehiculo = Vehicle::findOrFail($id);
        return view('vehicle.edit',compact('vehiculo', 'personas'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'duenio' => 'required',
            'marcaVehiculo' => 'required',
            'modeloVehiculo' => 'required',
            'anioVehiculo' => 'required|digits_between:4,4',
            'precioVehiculo' => 'required',
        ]);

        try {
            $vehiculo = Vehicle::find($id);
            $vehiculo->marca = $request->marcaVehiculo;
            $vehiculo->modelo = $request->modeloVehiculo;
            $vehiculo->anio = $request->anioVehiculo;  
            $vehiculo->precio = $request->precioVehiculo;  
    
            $persona = Person::find($request->duenio);
            $vehiculo->person()->associate($persona);
    
            $vehiculo->save();
        } catch (\Throwable $th) {
            Log::info('Error en update de contralador de vehiculo');
            Log::error($th);
            return redirect()->route('vehiculos.index')->with('success', 'El vehiculo ha sido actualizado exitosamente');
          
        }
        return redirect()->route('vehiculos.index')->with('success', 'El vehiculo ha sido actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehiculo = Vehicle::findOrFail($id);
        $vehiculo->delete();
        return redirect()->route('vehiculos.index')->with('success', 'El vehiculo ha sido eliminado exitosamente');
    }
}
