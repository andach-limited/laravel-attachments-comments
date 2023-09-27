<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table): void {
            if (config('attachments-comments.id_type') === 'uuid') {
                $table->uuid('id')->nullable();
            } else {
                $table->unsignedBigInteger('id')->nullable();
            }

            if (config('attachments-comments.linkable_type') === 'uuid') {
                $table->uuid('attachable_id')->nullable();
            } else {
                $table->unsignedBigInteger('attachable_id')->nullable();
            }
            $table->string('attachable_type');

            if (config('attachments-comments.user_id_type') === 'uuid') {
                $table->uuid('user_id')->nullable();
            } else {
                $table->unsignedBigInteger('user_id')->nullable();
            }

            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->text('file_path');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('comments', function (Blueprint $table): void {
            if (config('attachments-comments.id_type') === 'uuid') {
                $table->uuid('id')->nullable();
            } else {
                $table->unsignedBigInteger('id')->nullable();
            }

            if (config('attachments-comments.linkable_type') === 'uuid') {
                $table->uuid('commentable_id')->nullable();
            } else {
                $table->unsignedBigInteger('commentable_id')->nullable();
            }
            $table->string('commentable_type');

            if (config('attachments-comments.user_id_type') === 'uuid') {
                $table->uuid('user_id')->nullable();
            } else {
                $table->unsignedBigInteger('user_id')->nullable();
            }

            $table->string('name')->nullable();
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
