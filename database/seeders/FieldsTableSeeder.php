<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '北里大学東病院(守衛室)',
        ];
        DB::table('fields')->insert($param);

        $param = [
            'name' => '北里大学東病院(誘導)',
        ];
        DB::table('fields')->insert($param);

        $param = [
            'name' => '相模女子大学',
        ];
        DB::table('fields')->insert($param);
    }
}
