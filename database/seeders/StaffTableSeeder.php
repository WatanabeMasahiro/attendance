<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '秋山 正敏',
        ];
        DB::table('staff')->insert($param);

        $param = [
            'name' => '山岸 大樹',
        ];
        DB::table('staff')->insert($param);

        $param = [
            'name' => '渡辺 昌寛',
        ];
        DB::table('staff')->insert($param);
    }
}
