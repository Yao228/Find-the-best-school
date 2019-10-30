<?php

use App\Ville;
use App\Quartier;
use Illuminate\Database\Seeder;

class QuartiersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $ville1 = Ville::create([
            'name' => 'Lomé'
        ]);

        $ville2 = Ville::create([
            'name' => 'Kara'
        ]);

        $ville3 = Ville::create([
            'name' => 'Sokodé'
        ]);
        $ville4 = Ville::create([
            'name' => 'Kpalimé'
        ]);

        $quartier1 = Quartier::create([
            'name' => 'Adidogomé',
            'ville_id' => $ville1->id
        ]);

        $quartier2 = Quartier::create([
            'name' => 'Totsi',
            'ville_id' => $ville1->id
        ]);

        $quartier1 = Quartier::create([
            'name' => 'Zanguéra',
            'ville_id' => $ville1->id
        ]);

        $quartier1 = Quartier::create([
            'name' => 'Avédji',
            'ville_id' => $ville1->id
        ]);
    }
}
