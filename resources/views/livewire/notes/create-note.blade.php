<?php

use Livewire\Volt\Component;

new class extends Component {
    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSentDate;

    public function submit()
    {
        dd($this->noteTitle, $this->noteBody, $this->noteRecipient, $this->noteSentDate);
    }
}; ?>

<div>
    <form wire:submit='submit'>
        <x-input wire:model="noteTitle" label="Title" />
        <x-textarea wire:model="noteBody" label="Body" />
        <x-input wire:model="noteRecipient" label="Recipient" />
        <x-input wire:model="noteSentDate" type="date" label="Sent Date" />
        <x-button wire:click='submit'>Submit</x-button>
    </form>
</div>
