<?php

use App\Lesexamen;
use Illuminate\Database\Seeder;

class LesexamensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $examen1 = Lesexamen::create([
            'name' => 'CEDP'
        ]);

        $examen2 = Lesexamen::create([
            'name' => 'BEPC'
        ]);

        $examen3 = Lesexamen::create([
            'name' => 'BAC I'
        ]);

        $examen4 = Lesexamen::create([
            'name' => 'BAC II'
        ]);
        $examen5 = Lesexamen::create([
            'name' => 'LICENCE'
        ]);
        $examen5 = Lesexamen::create([
            'name' => 'MASTER I'
        ]);
        $examen5 = Lesexamen::create([
            'name' => 'MASTER II'
        ]);
        $examen5 = Lesexamen::create([
            'name' => 'DOCTORAT'
        ]);
    }
}
