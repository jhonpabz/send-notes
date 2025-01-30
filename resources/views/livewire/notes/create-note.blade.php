<?php

use Livewire\Volt\Component;

new class extends Component {
    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSentDate;

    public function submit()
    {
        $validate = $this->validate([
            'noteTitle' => ['required', 'string', 'min:5'],
            'noteBody' => ['required', 'string', 'min:20'],
            'noteRecipient' => ['required', 'email'],
            'noteSentDate' => ['required', 'date'],
        ]);

        auth()
            ->user()
            ->notes()
            ->create([
                'title' => $this->noteTitle,
                'body' => $this->noteBody,
                'recipient' => $this->noteRecipient,
                'sent_date' => $this->noteSentDate,
                'is_published' => false,
            ]);

        redirect(route('notes.index'));
    }
}; ?>

<div>
    <form wire:submit='submit' class="space-y-4">
        <x-input wire:model="noteTitle" label="Note Title" />
        <x-textarea wire:model="noteBody" label="Your Note" placeholder="Share all your thoughts.." />
        <x-input wire:model="noteRecipient" label="Recipient" placeholder="email@gmail.com" type="email" />
        <x-input wire:model="noteSentDate" type="date" label="Sent Date" />
        <div class="pt-4">
            <x-button class="text-white bg-rose-500" wire:click='submit' right-icon="calendar" spinner>Submit </x-button>
        </div>
    </form>
    <x-errors />
</div>
