<?php

use Illuminate\Database\Seeder;
use Inicio\Models\Area\AreaModel;
use Inicio\Models\Documento\DocumentoModel;
//use Inicio\Models\User;
use Inicio\User;

class UsersTableSeeder extends Seeder{
    
    public function run(){
        factory(User::class,20)->create();
        factory(AreaModel::class,25)->create();
        factory(DocumentoModel::class,30)->create();
    }
}
