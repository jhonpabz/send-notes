<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Note;

new #[Layout('layouts.app')] class extends Component {
    public Note $note;

    public function mount(Note $note)
    {
        $this->fill($note);
    }
}; ?>

<div>
    <h1>{{ $note->id}}</h1>
    <h1>{{ $note->recipient}}</h1>
    <h1>{{ $note->title}}</h1>
    <h1>{{ $note->body}}</h1>
</div>
