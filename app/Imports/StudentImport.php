<?php

namespace App\Imports;

use App\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StudentImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'last_name'=> $row[0],
            'first_name'=> $row[1],
            'score'=> $row[2]
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
