<?php

namespace App\Services;

use Maatwebsite\Excel\Facades\Excel;

class ExcelService
{
    public static function prepareData()
    {
        $filePath = storage_path('app/public/imports/users.xlsx');

        if (!file_exists($filePath)) {
            return [];
        }

        $data = Excel::toCollection([], $filePath);

        return [$data, $filePath];
    }
}
