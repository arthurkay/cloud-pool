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
            $subdomain = Redis::hget(Str::lower($this->zone), Str::lower($this->name));
            if (!empty($subdomain)) {
                foreach(json_decode($subdomain) as $type => $details) {
                    foreach($details as $index => $attributes) {
                        if ($type == "txt") {
                            if ($attributes->text == Str::lower($this->content)) {
                                // Record exists
                                // $this->emit('recordExists');
                                return;
                            }
                        }
                    }
                }
                // Append new record to subdomain entries
                $entry = array();

                if (!empty(json_decode($subdomain)->txt)) {
                    $newSubdomainRecord = json_decode($subdomain)->txt;
                    array_push($newSubdomainRecord, array('ttl' => (int)$this->ttl, 'text' => Str::lower($this->content)));
                } else {
                    $newSubdomainRecord = [array('ttl' => (int)$this->ttl, 'text' => Str::lower($this->content))];
                }
                foreach(json_decode($subdomain) as $key => $value) {
                    if ($key != "txt") {
                        $entry[$key] = $value;
                    }
                }
                $entry["txt"] = $newSubdomainRecord;
                Redis::hset(Str::lower($this->zone), Str::lower($this->name), json_encode($entry));
            } else {
                Redis::hset(Str::lower($this->zone), Str::lower($this->name), json_encode([Str::lower($this->type) => [
                    array('ttl' => (int)$this->ttl, 'text' => Str::lower($this->content))
                ]]));
            }
        }

        if ($this->type == "A") {
            $subdomain = Redis::hget(Str::lower($this->zone), Str::lower($this->name));
            if (!empty($subdomain)) {
                foreach(json_decode($subdomain) as $type => $details) {
                    foreach($details as $index => $attributes) {
                        if ($type == "a") {
                            if ($attributes->ip == Str::lower($this->content)) {
                                // Record exists
                                // $this->emit('recordExists');
                                return;
                            }
                        }
                    }
                }
                // Append new record to subdomain entries
                $entry = array();

                if (!empty(json_decode($subdomain)->a)) {
                    $newSubdomainRecord = json_decode($subdomain)->a;
                    array_push($newSubdomainRecord, array('ttl' => (int)$this->ttl, 'ip' => Str::lower($this->content)));
                } else {
                    $newSubdomainRecord = [array('ttl' => (int)$this->ttl, 'ip' => Str::lower($this->content))];
                }
                foreach(json_decode($subdomain) as $key => $value) {
                    if ($key != "a") {
                        $entry[$key] = $value;
                    }
                }
                $entry["a"] = $newSubdomainRecord;
                Redis::hset(Str::lower($this->zone), Str::lower($this->name), json_encode($entry));
            } else {
                Redis::hset(Str::lower($this->zone), Str::lower($this->name), json_encode([Str::lower($this->type) => [
                    array('ttl' => (int)$this->ttl, 'ip' => Str::lower($this->content))
                ]]));
            }
        }

        if ($this->type == "AAAA") {
            $subdomain = Redis::hget(Str::lower($this->zone), Str::lower($this->name));
            if (!empty($subdomain)) {
                foreach(json_decode($subdomain) as $type => $details) {
                    foreach($details as $index => $attributes) {
                        if ($type == "aaaa") {
                            if ($attributes->ip == Str::lower($this->content)) {
                                // Record exists
                                // $this->emit('recordExists');
                                return;
                            }
                        }
                    }
                }
                // Append new record to subdomain entries
                $entry = array();

                if (!empty(json_decode($subdomain)->aaaa)) {
                    $newSubdomainRecord = json_decode($subdomain)->aaaa;
                    array_push($newSubdomainRecord, array('ttl' => (int)$this->ttl, 'ip' => Str::lower($this->content)));
                } else {
                    $newSubdomainRecord = [array('ttl' => (int)$this->ttl, 'ip' => Str::lower($this->content))];
                }
                foreach(json_decode($subdomain) as $key => $value) {
                    if ($key != "aaaa") {
                        $entry[$key] = $value;
                    }
                }
                $entry["aaaa"] = $newSubdomainRecord;
                Redis::hset(Str::lower($this->zone), Str::lower($this->name), json_encode($entry));
            } else {
                Redis::hset(Str::lower($this->zone), Str::lower($this->name), json_encode([Str::lower($this->type) => [
                    array('ttl' => (int)$this->ttl, 'ip' => Str::lower($this->content))
                ]]));
            }
        }

        if ($this->type == "CNAME") {
            $subdomain = Redis::hget(Str::lower($this->zone), Str::lower($this->name));
            if (!empty($subdomain)) {
                foreach(json_decode($subdomain) as $type => $details) {
                    foreach($details as $index => $attributes) {
                        if ($type == "cname") {
                            if ($attributes->host == Str::lower($this->content)) {
                                // Record exists
                                // $this->emit('recordExists');
                                return;
                            }
                        }
                    }
                }
                // Append new record to subdomain entries
                $entry = array();

                if (!empty(json_decode($subdomain)->cname)) {
                    $newSubdomainRecord = json_decode($subdomain)->cname;
                    array_push($newSubdomainRecord, array('ttl' => (int)$this->ttl, 'host' => Str::lower($this->content)));
                } else {
                    $newSubdomainRecord = [array('ttl' => (int)$this->ttl, 'host' => Str::lower($this->content))];
                }
                foreach(json_decode($subdomain) as $key => $value) {
                    if ($key != "cname") {
                        $entry[$key] = $value;
                    }
                }
                $entry["cname"] = $newSubdomainRecord;
                Redis::hset(Str::lower($this->zone), Str::lower($this->name), json_encode($entry));
            } else {
                Redis::hset(Str::lower($this->zone), Str::lower($this->name), json_encode([Str::lower($this->type) => [
                    array('ttl' => (int)$this->ttl, 'host' => Str::lower($this->content))
                ]]));
            }
        }

        if ($this->type == "MX") {
            $subdomain = Redis::hget(Str::lower($this->zone), Str::lower($this->name));
            if (!empty($subdomain)) {
                foreach(json_decode($subdomain) as $type => $details) {
                    foreach($details as $index => $attributes) {
                        if ($type == "mx") {
                            if ($attributes->host == Str::lower($this->content)) {
                                // Record exists
                                // $this->emit('recordExists');
                                return;
                            }
                        }
                    }
                }
                // Append new record to subdomain entries
                $entry = array();

                if (!empty(json_decode($subdomain)->mx)) {
                    $newSubdomainRecord = json_decode($subdomain)->mx;
                    array_push($newSubdomainRecord, array('ttl' => (int)$this->ttl, 'preference' => (int)$this->priority, 'host' => Str::lower($this->content)));
                } else {
                    $newSubdomainRecord = [array('ttl' => (int)$this->ttl, 'preference' => (int)$this->priority, 'host' => Str::lower($this->content))];
                }
                foreach(json_decode($subdomain) as $key => $value) {
                    if ($key != "mx") {
                        $entry[$key] = $value;
                    }
                }
                $entry["mx"] = $newSubdomainRecord;
                Redis::hset(Str::lower($this->zone), Str::lower($this->name), json_encode($entry));
            } else {
                Redis::hset(Str::lower($this->zone), Str::lower($this->name), json_encode([Str::lower($this->type) => [
                    array('ttl' => (int)$this->ttl, 'preference' => (int)$this->priority, 'host' => Str::lower($this->content))
                ]]));
            }
        }
        
        $this->emit('recordUpdated');
    }

    public function render()
    {
        return view('livewire.widgets.create-record');
    }
}
