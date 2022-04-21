<?php

namespace Database\Seeders;

use App\Models\Transportadora;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransportadoraSeeder extends Seeder
{

    public function run()
    {
        Transportadora::create(['nome' => 'Transportadora 1']);
        Transportadora::create(['nome' => 'Transportadora 2']);
        Transportadora::create(['nome' => 'Transportadora 3']);
        Transportadora::create(['nome' => 'Transportadora 4']);
        Transportadora::create(['nome' => 'Transportadora 5']);
    }
}
