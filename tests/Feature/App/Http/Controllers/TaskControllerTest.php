<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;


class TaskControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function testUserCanCreateTask()
    {
        //Prepare
        $data = [
            'title' => 'ir pra academia',
            'task' => 'lembrar de ir na academia as 8 horas'
        ];

        //Act
        $result = $this->post('usuario/{id}/tasks', $data);

        //Assert
        $result->assertStatus(201);

    }
}
