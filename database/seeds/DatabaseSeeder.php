<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \App\model\Usuario::create([
        	"nome_usuario"=>"Root",
        	"email_usuario"=>"root@root.com",
        	"senha_usuario"=> password_hash("masterkey", PASSWORD_DEFAULT)
        ]);
    }
}
