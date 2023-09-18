<?php

namespace Andach\LaravelAttachmentsComments\Traits;

use Auth;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait MorphToComments
{
    public function addComment(string $newComment): void
    {
        $this->comments()->create([
            'user_id' => Auth::id(),
            'description' => $newComment,
        ]);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany('Andach\LaravelAttachmentsComments\Models\Comment', 'commentable');
    }
}
