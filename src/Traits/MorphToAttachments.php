<?php

namespace Andach\LaravelAttachmentsComments\Traits;

use Auth;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Http\UploadedFile;
use Ramsey\Uuid\Uuid;

trait MorphToAttachments
{
    public function addAttachment(?string $newComment, UploadedFile $newAttachment): void
    {
        $uuid = Uuid::uuid4();
        $path = $newAttachment->storeAs('public/attachments', $uuid.'.'.$newAttachment->getClientOriginalExtension());
        $path = str_replace('public/', '', $path);

        $this->attachments()->create([
            'id' => $uuid,
            'user_id' => Auth::id(),
            'description' => $newComment,
            'file_path' => $path,
        ]);
    }

    public function attachments(): MorphMany
    {
        return $this->morphMany('Andach\LaravelAttachmentsComments\Models\Attachment', 'attachable');
    }

    public function deleteAttachment(string $name): void
    {
        $attachment = $this->attachments()->where('description', $name)->first();
        $attachment?->delete();
    }

    public function hasAttachment(string $name): bool
    {
        return $this->attachments()->where('description', $name)->exists();
    }
}
