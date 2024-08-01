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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('fullname', 50);
            $table->string('email')->unique(); // unique rằng buộc duy nhất cho email không được trùng nhau
            $table->date('birthday');
            $table->string('address', 150);
            $table->foreignId('department_id')->constrained(); // tạo dàng buộc khóa ngoại bằng foreignId

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
