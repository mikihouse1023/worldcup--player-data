<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // 自動インクリメントの主キー
            $table->integer('country_id')->default(0); // 国ID、デフォルトは0
            $table->string('email', 100)->unique(); // メールアドレス、ユニーク制約を追加
            $table->string('password', 100); // パスワード
            $table->integer('role')->default(1); // ロール、デフォルトは1
            $table->timestamps(); // created_at と updated_at のカラムを追加
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

