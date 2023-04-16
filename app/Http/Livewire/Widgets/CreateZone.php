<?php

namespace App\Http\Livewire\Widgets;

use Livewire\Component;
use Illuminate\Support\Facades\Redis;
use  Illuminate\Support\Str;

class CreateZone extends Component
{
    public $zone;

    public function store() {
        $this->validate([
            'zone' => 'required'
        ]);
        Redis::hset(Str::lower($this->zone).'.', '@', json_encode(['a' => [
            array('ttl' => 3600, 'ip' => '127.0.0.1')
        ]]));
        $this->emit('recordUpdated');
    }

    public function render()
    {
        return view('livewire.widgets.create-zone');
    }
}
