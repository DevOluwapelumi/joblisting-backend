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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
                $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
                $table->string('title');
                $table->text('requirement');
                $table->string('location');
                $table->string('jobType');
                $table->decimal('salary', 10, 2);
                $table->text('description');
                $table->string('companyName');
                $table->string('email');
                $table->string('phone');
                $table->text('address');
                $table->string('companyLocation');
                $table->text('additionalInfo')->nullable();
                $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
