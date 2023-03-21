<?php

namespace App\Http\Livewire\Widgets;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Record;
use Illuminate\Pagination\Paginator;

class ShowRecords extends Component
{
    use WithPagination;
    private $records;
    public $readyToLoad = false;
    protected $listeners = [
        'recordUpdated' => 'loadRecords'
    ];

    public function loadRecords() {
        $this->readyToLoad = true;
        $this->records = Record::paginate(10);
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
        return view('livewire.widgets.show-records', [
            'records' => $this->readyToLoad ?  $this->records : $empty,
        ]);
    }
}
