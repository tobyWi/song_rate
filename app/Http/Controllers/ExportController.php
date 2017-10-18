<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Response;


class ExportController extends Controller
{
    //Export Model
    public function exportTableToCsv($table, $filename)
    {

        $handle = fopen($filename, 'w');

        $array = [];
        foreach($table as $row) {
            foreach($row as $col) {
                $array[] = $col;
            }
        }

        fputcsv($handle, $array);

        fclose($handle);

        $headers = ['content-type' => 'text/csv'];

        return Response::download($filename, $filename, $headers);
    }
}
