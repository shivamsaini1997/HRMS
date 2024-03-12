<?php 
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;

class UserAttendanceExport implements FromCollection
{
    protected $userAttendance;

    public function __construct($userAttendance)
    {
        $this->userAttendance = $userAttendance;
    }

    public function collection()
    {
        return collect($this->userAttendance);
    }
}
