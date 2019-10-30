<?php

use App\Type;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type1 = Type::create([
            'name' => 'Garderie'
        ]);

        $type2 = Type::create([
            'name' => 'Jardin d\'enfant'
        ]);

        $type3 = Type::create([
            'name' => 'Primaire'
        ]);

        $type4 = Type::create([
            'name' => 'Collège'
        ]);

        $type5 = Type::create([
            'name' => 'Lycéé d\'enseignement technique'
        ]);

        $type6 = Type::create([
            'name' => 'Lycée d\'enseignement général'
        ]);

        $type7 = Type::create([
            'name' => 'Ecole spécialisée'
        ]);

        $type8 = Type::create([
            'name' => 'Centre de formation professionnel'
        ]);

        $type9 = Type::create([
            'name' => 'Centre d\'Alphabétisation'
        ]);

        $type10 = Type::create([
            'name' => 'BT'
        ]);

        $type11 = Type::create([
            'name' => 'BTS'
        ]);

        $type12 = Type::create([
            'name' => 'Université'
        ]);
    }
}
