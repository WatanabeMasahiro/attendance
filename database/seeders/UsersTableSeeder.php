<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '(株)パンダdeサービス',
            'email' => 'panda@panda',
            'password' => 'panda123',
            'passpage' => 'p1234567',
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '(株)ライオンdeサービス',
            'email' => 'lion@lion',
            'password' => 'lion1234',
            'passpage' => 'l1234567',
        ];
        DB::table('users')->insert($param);
    }
}
