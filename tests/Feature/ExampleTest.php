<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
    // Ir al inicio
    public function irInicio(){
        // es necesario registrarte
        $response = $this->post('/login', [
            'email' => 'hector@hector.com',
            'password' => 'secret',
        ]);
        $response = $this->get('/home');
        $response->assertStatus(302);
    }
    /** @test */
     public function crearDibujo(){
        $this->withoutMiddleware();

        $response = $this->post('/login', [
            'email' => 'hector@hector.com',
            'password' => 'secret',
        ]);
        // crear el comentario
        $response = $this->post('/dibujo/crear',[
          'user_id' => 1,
          'title' => 'Testing',
          'description' => 'Descripcion de test',
          'draw' => 'test',
          'image' => 'test'
        ]);
        $response->assertStatus(200);
      }
    /** @test */
    public function crearComentario(){
        // es necesario registrarte
        $this->withoutMiddleware();

        $response = $this->post('/login', [
            'email' => 'hector@hector.com',
            'password' => 'secret',
        ]);
        // crear el comentario
        $response = $this->post('/comentario/1/post',[
          'user_id' => 1,
          'text' => 'Creado des de testing',
          'draw_id' => 1,
          'like' => 1,
          'dislike' => 1
        ]);
        $response->assertStatus(302);
      }
    /** @test */
    public function seguirPersona(){
        // es necesario registrarte
        $response = $this->post('/login', [
            'email' => 'hector@hector.com',
            'password' => 'secret',
        ]);
        $response = $this->get('/perfil/2/follow');
        $response->assertStatus(302);
      }
}
