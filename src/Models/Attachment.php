<?php

namespace Andach\LaravelAttachmentsComments\Models;

use App\Traits\BelongsToUser;
use App\Traits\PrimaryKeyUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use BelongsToUser;
    use HasFactory;
    use PrimaryKeyUUID;
    use SoftDeletes;

    protected $fillable = ['attachable_id', 'attachable_type', 'user_id', 'description', 'file_path'];

    public function attachable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getDisplayHtmlAttribute(): string
    {
        $return = '';

        if ($this->description) {
            $return .= '<x-chat name="' . $this->user->name . '" time="' . $this->created_at . '" userID="' . $this->user->id . '" picture="' . $this->user->image_url . '">' . $this->description . '</x-chat>';
        }

        return $return . '<x-chat-attachment name="' . $this->user->name . '" time="' . $this->created_at . '" userID="' . $this->user->id . '" picture="' . $this->user->image_url . '" attachmentUrl="' . $this->href . '"></x-chat>';
    }

    public function getHrefAttribute(): string
    {
        return '/storage/' . e($this->file_path);
    }
}
