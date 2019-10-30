<?php

use App\Statut;
use Illuminate\Database\Seeder;

class StatutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statut1 = Statut::create([
            'name' => 'Publique'
        ]);

        $statut2 = Statut::create([
            'name' => 'Privée'
        ]);

        $statut2 = Statut::create([
            'name' => 'Confessionelle'
        ]);

    }
}
