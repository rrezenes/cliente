<?php

use Illuminate\Database\Seeder;

use cliente\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
    }
}

class UserTableSeeder extends Seeder {

    public function run()
    {
        User::create
        ([
        	'name' => 'Renan',
        	'email'=> 'renan@email.com',
        	'password'=> '$2a$04$C8K4o1F2unrlDGAb7rcnXOD1igTmU4REoY/ZC2ePSbHYS3u3JiC4q',
        	'active'=> true,
        ]);
        User::create
        ([
        	'name' => 'José',
        	'email'=> 'jose@email.com',
        	'password'=> '$2a$04$C8K4o1F2unrlDGAb7rcnXOD1igTmU4REoY/ZC2ePSbHYS3u3JiC4q',
        	'active'=> true,
        ]);
        User::create
        ([
        	'name' => 'João',
        	'email'=> 'joao@email.com',
        	'password'=> '$2a$04$C8K4o1F2unrlDGAb7rcnXOD1igTmU4REoY/ZC2ePSbHYS3u3JiC4q',
        	'active'=> false,
        ]);
        User::create
        ([
        	'name' => 'Nair',
        	'email'=> 'nair@email.com',
        	'password'=> '$2a$04$C8K4o1F2unrlDGAb7rcnXOD1igTmU4REoY/ZC2ePSbHYS3u3JiC4q',
        	'active'=> true,
        ]);
    }
}
