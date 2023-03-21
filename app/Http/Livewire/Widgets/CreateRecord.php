<?php

namespace App\Http\Livewire\Widgets;

use Livewire\Component;
use App\Models\Record;

class CreateRecord extends Component
{
    public $name, $ttl = "3600", $type, $content;

    public function store() {
        $this->validate([
            'name' => 'required',
            'ttl' => 'required|integer',
            'type' => 'required',
            'content' => 'required'
        ]);

        Record::create([
            'name' => $this->name,
            'ttl' => $this->ttl,
            'type' => $this->type,
            'content' => $this->content,
            'disabled' => 0
        ]);
        $this->emit('recordUpdated');
    }

    public function render()
    {
        return view('livewire.widgets.create-record');
    }
}
