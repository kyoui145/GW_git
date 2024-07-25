<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('books_id');
            $table->unsignedBigInteger('users_id');
            $table->string('comment');
            $table->integer('rating');
            $table->timestamps();
            //リレーションシップ（外部参照制約）の設定
            //外部キー「books_id」はテーブル「books」の「id」列を参照する
            $table->foreign('books_id')->references('id')->on('books');
             //外部キー「users_id」はテーブル「users」の「id」列を参照する
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
