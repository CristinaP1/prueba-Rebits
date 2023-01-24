<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Person::paginate(10);
        return view('person.index', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person.create');
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
            'nombreUsuario' => 'required|alpha|max:60',
            'apellidoUsuario' => 'required|alpha|max:60',
            'correoUsuario' => 'required|email',
        ]);

        try {
            $persona = new Person;
            $persona->nombre = $request->nombreUsuario;
            $persona->apellido = $request->apellidoUsuario;
            $persona->correo = $request->correoUsuario;
            $persona->save();
        } catch (\Throwable $th) {
            Log::info('Error en store de contralador de persona');
            Log::error($th);
            return redirect()->route('personas.index')->with('error', 'Se ha producido un error en el sistema');
        }

        return redirect()->route('personas.index')->with('success', 'La persona ha sido creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $persona = Person::findOrFail($id);
        } catch (\Throwable $th) {
            return redirect()->route('personas.index')->with('error', 'La persona no ha sido encontrada');
        }
        return view('person.edit',compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombreUsuario' => 'required|alpha|max:60',
            'apellidoUsuario' => 'required|alpha|max:60',
            'correoUsuario' => 'required|email',
        ]);

        try {
            $persona = Person::find($id);
            $persona->nombre = $request->nombreUsuario;
            $persona->apellido = $request->apellidoUsuario;
            $persona->correo = $request->correoUsuario;  
            $persona->save();
        } catch (\Throwable $th) {
            Log::info('Error en update de contralador de persona');
            Log::error($th);
            return redirect()->route('personas.index')->with('success', 'La persona ha sido actualizada exitosamente');
        }

        return redirect()->route('personas.index')->with('success', 'La persona ha sido actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illumñinate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Person::findOrFail($id);

        foreach($persona->vehicles as $vehiculo){
            $vehiculo->delete();
        }

        $persona->delete();
        return redirect()->route('personas.index')->with('success', 'La persona ha sido eliminada exitosamente');
    }

    /**
     * View vehicle history
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function history($id){
        try {
            $persona = Person::findOrfail($id);
            $vehiculos = Vehicle::withTrashed()->where('person_id', $id)->paginate(10);
        } catch (\Throwable $th) {
            return redirect()->route('personas.index')->with('error', 'La persona no ha sido encontrada');
        }
        return view('person.history',compact('vehiculos', 'persona'));
    }

}
