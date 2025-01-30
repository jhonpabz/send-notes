<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Note;

new #[Layout('layouts.app')] class extends Component {
    public Note $note;
    
    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSentDate;
    public $noteIsPublished;

    public function mount(Note $note)
    {
        $this->authorize('update',$note);
        $this->fill($note);
        $this->noteTitle = $note->title;
        $this->noteBody = $note->body;
        $this->noteRecipient = $note->recipient;
        $this->noteSentDate = $note->sent_date;
        $this->noteIsPublished = $note->is_published;
    }

    public function saveNote()
    {
        $validate = $this->validate([
            'noteTitle' => ['required', 'string', 'min:5'],
            'noteBody' => ['required', 'string', 'min:20'],
            'noteRecipient' => ['required', 'email'],
            'noteSentDate' => ['required', 'date'],
            'noteIsPublished' => ['required', 'boolean'],
        ]);

        $this->note->update([
            'title' => $this->noteTitle,
            'body' => $this->noteBody,
            'recipient' => $this->noteRecipient,
            'sent_date' => $this->noteSentDate,
            'is_published' => $this->noteIsPublished,
        ]);

        $this->dispatch('note-saved');

        // return $this->redirect(route('notes.index'), navigate: true); //Redirect to notes page when note saved
    }
}; ?>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <form wire:submit='saveNote' class="space-y-4">
                <x-input wire:model="noteTitle" label="Note Title" />
                <x-textarea wire:model="noteBody" label="Your Note" placeholder="Share all your thoughts.." />
                <x-input wire:model="noteRecipient" label="Recipient" placeholder="email@gmail.com" type="email" />
                <x-input wire:model="noteSentDate" type="date" label="Sent Date" />
                <x-checkbox label="Note Published" wire:model='noteIsPublished' />
                <div class="pt-4">
                    <x-button class="mr-4 text-white bg-rose-500" type='submit' spinner="saveNote">Save Note</x-button>
                    <x-button href="{{route('notes.index')}}"  flat negative>Go back to notes</x-button>
                </div>
                <x-action-message on="note-saved" />
                <x-errors />
            </form>
        </div>
    </div>

