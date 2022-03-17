<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        $roles = [
            [
                'name' =>'admin',
                'guard_name' =>'web',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'name' => 'user',
                'guard_name' =>'web',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ]
        ];
        DB::table('roles')->insert($roles);
    }
}
