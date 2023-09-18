<?php

namespace Andach\LaravelAttachmentsComments\Models;

use Andach\LaravelPrimaryKeyUuid\Traits\PrimaryKeyUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use PrimaryKeyUUID;
    use SoftDeletes;

    protected $fillable = ['attachable_id', 'attachable_type', 'user_id', 'description', 'file_path'];

    public function attachable(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getDisplayHtmlAttribute(): string
    {
        $return = '';

        if ($this->description) {
            $return .= '<x-andach-chat name="' . $this->user->name . '" time="' . $this->created_at . '" userID="' . $this->user->id . '" picture="' . $this->user->image_url . '">' . $this->description . '</x-chat>';
        }

        return $return . '<x-andach-chat-attachment name="' . $this->user->name . '" time="' . $this->created_at . '" userID="' . $this->user->id . '" picture="' . $this->user->image_url . '" attachmentUrl="' . $this->href . '"></x-chat>';
    }

    public function getHrefAttribute(): string
    {
        return '/storage/' . e($this->file_path);
    }
}
