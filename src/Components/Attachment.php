<?php

namespace Andach\LaravelAttachmentsComments\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Attachment extends Component
{
    public string $attachmentImage = '';

    /**
     * Create a new component instance.
     */
    public function __construct(public string $name, public string $time, public string $picture, public string $attachmentUrl, public string $userID = '')
    {
        $this->attachmentImage = '<i class="fa-solid fa-file-circle-question" style="width: 100px; height: 100px; display: inline-block; font-size: 100px;"></i>';

        $fileExtension = pathinfo($attachmentUrl, PATHINFO_EXTENSION);

        // Determine what kind of content to display based on the file extension
        if ('pdf' === strtolower($fileExtension)) {
            $this->attachmentImage = '<i class="fas fa-file-pdf" style="width: 100px; height: 100px; display: inline-block; font-size: 100px;"></i>';
        } elseif (in_array(strtolower($fileExtension), ['doc', 'docx'])) {
            $this->attachmentImage = '<i class="fas fa-file-word" style="width: 100px; height: 100px; display: inline-block; font-size: 100px;"></i>';
        } elseif (in_array(strtolower($fileExtension), ['png', 'jpg', 'jpeg'])) {
            $this->attachmentImage = '<img class="rounded-lg shadow-md mb-1" src="' . $attachmentUrl . '" width="240" height="180" alt="Chat image">';
        }

        $this->attachmentImage = '<a href="' . $this->attachmentUrl . '">' . $this->attachmentImage . '</a>';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.chat-attachment');
    }
}
