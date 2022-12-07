<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

     public function test_register()
    {
        $response = $this->post('/register', [
            'name'=>'arya2s3',
            'email'=>'isokebsos@gmail.com',
            'password'=>'123456789',
            'password_confirmation'=>'123456789',
            'role'=>'admin'


        ]);
        $response->assertRedirect('/home');
    }

    // public function test_login()
    // {
    //     $response = $this->post('/login',[
    //         'email'=>'isokebos@gmail.com',
    //         'password'=>'123456789',
    //     ]);

    //     $response->assertRedirect('/home')
    // }

}
