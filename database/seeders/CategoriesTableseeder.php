<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'name' => '買い物',
            'deadline' => '10/1',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'user_id' => '1',
            'name' => '勉強',
            'deadline' => '10/2',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'user_id' => '1',
            'name' => '読書',
            'deadline' => '10/3',
        ];
        DB::table('categories')->insert($param);

    }
}
