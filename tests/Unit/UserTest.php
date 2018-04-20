<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use cliente\User;

class UserTest extends TestCase
{
	//Faz todo o processo e depois da um rollback na base de dados
	use DatabaseTransactions; 

	public function testListAllUsers()
	{
		$response = $this->json('GET', 'api/users');

		$response
			->assertStatus(200)
			->assertJsonStructure([
    			'*' => [
    				'id',
        			'name',
        			'email',
        			'active'
				]
			]);
	}

    public function testCreateUser()
    {

		$dados = [
			'name' => 'Teste Novo',
			'email' => 'teste_novo@email.com',
			'password' => 'teste',
			'active' => '1'
		];

		$response = $this->json('POST', 'api/users', $dados);

		$response
			->assertStatus(201)
			->assertJsonStructure(
    			[
    				'id',
        			'name',
        			'email',
        			'active'
				]
			);

		$this->assertDatabaseHas('users', 
			[
				'name' => $dados['name'],
				'email' => $dados['email'],
				'active' => $dados['active']
			]
		);
    }

    public function testFindUser()
    {

    	$user = User::first();

		$response = $this->get('api/users/'.$user->id);

		$response
			->assertStatus(200)
			->assertJsonStructure(
    			[
    				'id',
        			'name',
        			'email',
        			'active'
				]
			);

    }

    public function testUpdateUser()
    {

    	$user = User::first();

		$dados = [
			'name' => 'Teste Update',
			'email' => 'teste_update@email.com',
			'password' => 'update',
			'active' => '1'
		];

		$response = $this->json('PUT', 'api/users/'.$user->id, $dados);

		$response
			->assertStatus(200)
			->assertJsonStructure(
    			[
    				'id',
        			'name',
        			'email',
        			'active'
				]
			);

		$this->assertDatabaseHas('users', 
			[
				'name' => $dados['name'],
				'email' => $dados['email'],
				'active' => $dados['active']
			]
		);
    }



}
