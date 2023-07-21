<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')->constrained();
          
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
          
            $table->date('dob')->nullable();//date of birth
            $table->enum('year', ['first','second','third','fourth'])->default('first');  
          
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
