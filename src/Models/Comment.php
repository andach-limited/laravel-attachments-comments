<?php

namespace Andach\LaravelAttachmentsComments\Models;

use App\Traits\BelongsToUser;
use App\Traits\PrimaryKeyUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use BelongsToUser;
    use HasFactory;
    use PrimaryKeyUUID;
    use SoftDeletes;

    protected $fillable = ['commentable_id', 'commentable_type', 'user_id', 'description'];

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getDisplayHtmlAttribute(): string
    {
        return '<x-chat name="' . $this->user->name . '" time="' . $this->created_at . '" userID="' . $this->user->id . '" picture="' . $this->user->image_url . '">' . $this->description . '</x-chat>';
    }
}
