<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DisplayContestExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Display Contest';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('livewire.cms.display-content.excel', [
            'title' => $this->title,
            'displayContents' => $this->data,
        ]);
    }
}
