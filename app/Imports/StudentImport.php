<?php

namespace App\Imports;

use App\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class StudentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $rows = 0;

    public function  __construct($report_id)
    {
        $this->report_id = $report_id;
    }

    public function model(array $row)
    {
        if ($row[0] == Null){
            return;
        }
        ++$this->rows;
        if ($this->rows == 1){
            return;
        }
        return new Student([
            'report_id' => $this->report_id,
            'last_name'=> $row[0],
            'first_name'=> $row[1],
            'score'=> $row[2]
        ]);
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }

}
