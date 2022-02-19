<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'category_id' => '1',
            'name' => '肉',
        ];
        DB::table('todo')->insert($param);

        $param = [
            'category_id' => '1',
            'name' => '魚',
        ];
        DB::table('todo')->insert($param);

        $param = [
            'category_id' => '2',
            'name' => 'PHP',
        ];
        DB::table('todo')->insert($param);


        $param = [
            'category_id' => '2',
            'name' => 'AWS',
        ];
        DB::table('todo')->insert($param);


        $param = [
            'category_id' => '3',
            'name' => '小説',
        ];
        DB::table('todo')->insert($param);


        $param = [
            'category_id' => '3',
            'name' => '技術書',
        ];
        DB::table('todo')->insert($param);


    }
}
