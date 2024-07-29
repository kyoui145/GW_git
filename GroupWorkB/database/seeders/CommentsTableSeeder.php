<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('comments')->insert([
            'books_id'=>1,
            'users_id'=>1,
            'comment'=>'sample',
            'rating'=>5,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('comments')->insert([
            'books_id'=>1,
            'users_id'=>2,
            'comment'=>'aaaaaaaaaaaaaaaaaaaaaaaa',
            'rating'=>4,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('comments')->insert([
            'books_id'=>2,
            'users_id'=>1,
            'comment'=>'11111111111111111111111111',
            'rating'=>5,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('comments')->insert([
            'books_id'=>2,
            'users_id'=>1,
            'comment'=>'22222222222222222222222222',
            'rating'=>3,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('comments')->insert([
            'books_id'=>2,
            'users_id'=>2,
            'comment'=>'３３３３３３３３３３３３３３３３３３',
            'rating'=>4,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('comments')->insert([
            'books_id'=>2,
            'users_id'=>2,
            'comment'=>'44',
            'rating'=>1,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        // DB::table('comments')->insert([
        //     ''=>,
        // ]);
    }
}
