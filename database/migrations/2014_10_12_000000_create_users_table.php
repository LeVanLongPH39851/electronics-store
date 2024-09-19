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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_code', 20)->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone', 20)->nullable();
            $table->text('image')->nullable();
            $table->string('address')->nullable();
            $table->enum('status', ['active', 'banned'])->default('active');
            $table->string('show_password');
            //Tạo khóa ngoại với bảng roles, nếu xóa roles thì tất cả users sẽ bị xóa khi có role_id = id của roles bị xóa
            $table->integer('role_id')->references('id')->on('roles')->onDelete('cascade'); 
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes(); //Sử dụng xóa mềm
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