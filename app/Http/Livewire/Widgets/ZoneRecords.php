<?php

namespace App\Http\Livewire\Widgets;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Redis;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class ZoneRecords extends Component
{
    use WithPagination;
    public $zone;
    private $records;
    public $readyToLoad = false;
    protected $listeners = [
        'recordUpdated' => 'loadRecords',
    ];

    public function loadRecords() {
        $this->readyToLoad = true;
        $items = Redis::hgetall($this->zone);
        $options = [];
        $perPage = 10;
        $page = $this->page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        $this->records =  new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function gotoPage($page, $pageName = 'page') {
        $this->setPage($page, $pageName);
        $this->emit('recordUpdated');
    }

    public function previousPage($pageName = 'page') {
        $this->gotoPage($this->page -1, $pageName);
    }

    public function nextPage($pageName = 'page') {
        $this->gotoPage($this->page +1, $pageName);
    }
    public function render()
    {
        $empty = new Paginator([], 10);
        return view('livewire.widgets.zone-records', [
            'records' => $this->readyToLoad ?  $this->records : $empty,
        ]);
    }
}
