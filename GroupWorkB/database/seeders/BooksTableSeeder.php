<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            'title'=>'book01',
            'author'=>'author01',
            'publisher'=>'publisher01',
            'ISBN'=>123456,
            'book_url'=>'sample01url',
            'created_at'=>now(),
            'updated_at'=>now()

        ]);
        DB::table('books')->insert([
            'title'=>'book02',
            'author'=>'author02',
            'publisher'=>'publisher02',
            'ISBN'=>1234567,
            'book_url'=>'sample03url',
            'created_at'=>now(),
            'updated_at'=>now()

        ]);
        DB::table('books')->insert([
            'title'=>'book03',
            'author'=>'author03',
            'publisher'=>'publisher03',
            'ISBN'=>12345678,
            'book_url'=>'sample03url',
            'created_at'=>now(),
            'updated_at'=>now()

        ]);
        // DB::table('books')->insert([
        //     ''=>,
        // ]);
    }
}
