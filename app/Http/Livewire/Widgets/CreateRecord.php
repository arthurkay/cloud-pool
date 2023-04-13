<?php

namespace App\Http\Livewire\Widgets;

use Livewire\Component;
use Illuminate\Support\Facades\Redis;
use  Illuminate\Support\Str;

class CreateRecord extends Component
{
    public $zone, $name, $ttl = "3600", $type, $content, $priority;
    public function store() {
        $this->validate([
            'name' => 'required',
            'ttl' => 'required|integer',
            'type' => 'required',
            'content' => 'required'
        ]);

        if ($this->type == "TXT") {
            Redis::hset(Str::lower($this->zone), Str::lower($this->name), json_encode([Str::lower($this->type) => [
                array('ttl' => (int)$this->ttl, 'text' => Str::lower($this->content))
            ]]));
        }

        if ($this->type == "A") {
            Redis::hset(Str::lower($this->zone), Str::lower($this->name), json_encode([Str::lower($this->type) => [
                array('ttl' => (int)$this->ttl, 'ip' => Str::lower($this->content))
            ]]));
        }

        if ($this->type == "AAAA") {
            Redis::hset(Str::lower($this->zone), Str::lower($this->name), json_encode([Str::lower($this->type) => [
                array('ttl' => (int)$this->ttl, 'ip' => Str::lower($this->content))
            ]]));
        }

        if ($this->type == "CNAME") {
            Redis::hset(Str::lower($this->zone), Str::lower($this->name), json_encode([Str::lower($this->type) => [
                array('ttl' => (int)$this->ttl, 'host' => Str::lower($this->content))
            ]]));
        }

        if ($this->type == "MX") {
            Redis::hset(Str::lower($this->zone), Str::lower($this->name), json_encode([Str::lower($this->type) => [
                array('ttl' => (int)$this->ttl, 'preference' => (int)$this->priority, 'host' => Str::lower($this->content))
            ]]));
        }
        
        $this->emit('recordUpdated');
    }

    public function render()
    {
        return view('livewire.widgets.create-record');
    }
}
