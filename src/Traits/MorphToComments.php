<?php

namespace App\Traits;

use Auth;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait MorphToComments
{
    public function addComment(string $newComment): void
    {
        $this->comments()->create([
            'user_id'     => Auth::id(),
            'description' => $newComment,
        ]);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }
}
