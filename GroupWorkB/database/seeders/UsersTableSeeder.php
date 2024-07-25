<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //総務部社員01
        DB::table('users')->insert([
            'name'=>'guser01',
            'password'=>'guser01pass',
            'role'=>2,
            'address'=>'sample@mail',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        //一般社員01
        DB::table('users')->insert([
            'name'=>'user01',
            'password'=>'user01pass',
            'role'=>1,
            'address'=>'sample@mail',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        // DB::table('')->insert([
        //     ''=>,
        // ]);
    }
}
