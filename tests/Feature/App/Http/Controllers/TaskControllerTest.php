<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\TaskRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testAuthUserReturnsUserIfCredentialsAreValid()
    {
        $user = User::factory()->create();
        $credentials = [
            'email' => $user->email,
            'password' => 'password',
        ];
        $request = Request::create('', 'POST');
        $request->merge($credentials);
        $repository = new TaskRepository();
        $authUser = $repository->authUser($request);
        $this->assertEquals($user->id, $authUser->id);
    }


    public function testAuthUserReturnsNullIfCredentialsAreInvalid()
    {
        $credentials = [
            'email' => 'invalid-email@example.com',
            'password' => 'invalid-password',
        ];
        $request = Request::create('', 'POST');
        $request->merge($credentials);
        $repository = new TaskRepository();
        $authUser = $repository->authUser($request);
        $this->assertNull($authUser);
    }


    public function testSaveTaskSavesTaskToDatabase()
    {
        $user = User::factory()->create();
        $requestData = [
            'title' => 'Task Title',
            'task' => 'Task Description',
        ];
        $request = Request::create('usuario/{user}/tasks/criar', 'POST');
        $request->merge($requestData);
        $repository = new TaskRepository();
        $repository->saveTask($request, $user);
        $this->assertDatabaseHas('tasks', [
            'user_id' => $user->id,
            'title' => 'Task Title',
            'task' => 'Task Description',
        ]);
    }

}
