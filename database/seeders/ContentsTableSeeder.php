<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'staff_field_id' => 1,
            'punchIn' => false,
            'punchOut' => true,
            'remarks' => 'コレはテストです。',
        ];
        DB::table('contents')->insert($param);

        $param = [
            'staff_field_id' => 1,
            'punchIn' => true,
            'punchOut' => false,
            'remarks' => 'コレはテストです。',
        ];
        DB::table('contents')->insert($param);

        $param = [
            'staff_field_id' => 2,
            'punchIn' => 0,
            'punchOut' => 1,
            'remarks' => 'コレはテストです。',
        ];
        DB::table('contents')->insert($param);
    }
}
