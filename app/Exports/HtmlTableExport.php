<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class HtmlTableExport implements FromView
{
    protected $htmlTableData;

    public function __construct($htmlTableData)
    {
        $this->htmlTableData = $htmlTableData;
    }

    public function view(): View
    {
        return view('exports.html_table', ['htmlTableData' => $this->htmlTableData]);
    }
}
