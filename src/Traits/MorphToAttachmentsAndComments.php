<?php

namespace App\Traits;

use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;

trait MorphToAttachmentsAndComments
{
    use MorphToAttachments;
    use MorphToComments;

    // Automatically work out whether a comment or attachment needs to be added based on $request information.
    public function addAttachmentAndComment(string $newComment, ?UploadedFile $newAttachment = null): void
    {
        if ($newAttachment) {
            $this->addAttachment($newComment, $newAttachment);
        } else {
            $this->addComment($newComment);
        }
    }

    public function attachmentsAndComments(): array
    {
        $attachments = $this->addDisplayHtmlToCollection($this->attachments()->get());
        $comments    = $this->addDisplayHtmlToCollection($this->comments()->get());

        $return = array_merge($comments, $attachments);

        usort($return, function ($a, $b) {
            $dateA = DateTime::createFromFormat('Y-m-d\TH:i:s.u\Z', $a['created_at']);
            $dateB = DateTime::createFromFormat('Y-m-d\TH:i:s.u\Z', $b['created_at']);
            return $dateA <=> $dateB;
        });

        return $return;
    }

    private function addDisplayHtmlToCollection(Collection $collection): array
    {
        $collectionWithFullName = $collection->map(function ($item) {
            $item->display_html = $item->display_html;
            return $item;
        });

        return $collectionWithFullName->toArray();
    }
}
