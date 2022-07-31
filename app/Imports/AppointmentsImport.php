<?php

namespace App\Imports;

use App\Models\Appointment;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AppointmentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Appointment([
            'name'     => $row[0],
            'email'    => $row[1],
            'phone' => $row[2],
            'doctor' => $row[3],
            'date' => $row[4],
            'message' => $row[5],
            'status' => $row[6],
            'created_at' => $row[7]
        ]);
    }
}
