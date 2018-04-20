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

    public function testCreateUser()
    {

		$dados = [
			'name' => 'Teste',
			'email' => 'teste03@email.com',
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


}
