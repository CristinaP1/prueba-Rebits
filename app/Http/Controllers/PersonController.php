<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Person::paginate(5);
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

        $persona = new Person;
        $persona->nombre = $request->nombreUsuario;
        $persona->apellido = $request->apellidoUsuario;
        $persona->correo = $request->correoUsuario;
        $persona->save();

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
        $persona = Person::findOrFail($id);
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

        $persona = Person::find($id);
        $persona->nombre = $request->nombreUsuario;
        $persona->apellido = $request->apellidoUsuario;
        $persona->correo = $request->correoUsuario;  
        $persona->save();

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
        $vehiculos = Vehicle::withTrashed()->where('person_id', $id)->get();
        return view('person.history',compact('vehiculos'));
    }

}
