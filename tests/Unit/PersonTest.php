<?php

namespace Tests\Unit;

use App\Models\Person;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class PersonTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_index(){
        $response = $this->get('/personas');
        $response->assertStatus(200);
    }

    public function test_create(){
        $response = $this->get('/personas/create');
        $response->assertStatus(200);
    }

    public function test_edit(){
        $persona = new Person;
        $persona->nombre = 'Macarena';
        $persona->apellido = 'Rosales';
        $persona->correo = 'macarena@gmail.com';
        $persona->save();

        $response = $this->get('/personas/30/edit');
        $response->assertStatus(302);
    }

    public function test_destroy(){
        $persona = new Person;
        $persona->nombre = 'Macarena';
        $persona->apellido = 'Rosales';
        $persona->correo = 'macarena@gmail.com';
        $persona->save();

        $vehiculo = new Vehicle;
        $vehiculo->marca = 'marca';
        $vehiculo->modelo = 'modelo';
        $vehiculo->anio = '2010';  
        $vehiculo->precio = '4000000';

        $vehiculo->person()->associate($persona);

        $vehiculo->save();

        $response = $this->delete('/personas/'.$persona->id);

        $this->assertSoftDeleted($persona);
        $response->assertStatus(302);
    }

    public function test_store_completo(){
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/personas', [
            'nombreUsuario' => 'Javiera',
            'apellidoUsuario' => 'Quinteros',
            'correoUsuario' => 'javiera@gmail.com']);
 
        $response->assertStatus(302);
    }

    public function test_store_vacio(){
        $response = $this->post('/personas');
        $response->assertSessionHasErrors(['nombreUsuario', 'apellidoUsuario', 'correoUsuario']);
        $response->assertStatus(302);
    }

    public function test_history(){
        $persona = new Person;
        $persona->nombre = 'Macarena';
        $persona->apellido = 'Rosales';
        $persona->correo = 'macarena@gmail.com';
        $persona->save();

        $response = $this->get('/historial/'.$persona->id);
        $response->assertStatus(200);
    }

    public function test_history_id_falso(){
        $response = $this->get('/historial/30');
        $response->assertStatus(302);
    }

}
