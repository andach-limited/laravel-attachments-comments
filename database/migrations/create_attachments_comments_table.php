<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table): void {
            $table->uuid('id')->primary();
            $table->uuid('attachable_id');
            $table->string('attachable_type');

            if (config('yourpackage.user_id_type') === 'uuid') {
                $table->uuid('user_id');
            } else {
                $table->unsignedBigInteger('user_id');
            }

            $table->text('description');
            $table->text('file_path');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('comments', function (Blueprint $table): void {
            $table->uuid('id')->primary();
            $table->uuid('commentable_id');
            $table->string('commentable_type');

            if (config('yourpackage.user_id_type') === 'uuid') {
                $table->uuid('user_id');
            } else {
                $table->unsignedBigInteger('user_id');
            }

            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
