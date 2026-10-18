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
        Schema::create('tblBookAuthor', function (Blueprint $table) {
            $table->unsignedBigInteger('BookID');
            $table->unsignedBigInteger('AuthorID');
            $table->date('AuthorDate')->nullable();
            $table->text('Remark')->nullable();
            $table->timestamps();

            $table->primary(['BookID', 'AuthorID']);

            $table->foreign('BookID')
                ->references('BookID')
                ->on('tblBook')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('AuthorID')
                ->references('AuthorID')
                ->on('tblAuthor')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblBookAuthor');
    }
};

