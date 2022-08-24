<?php

namespace App\Services\Consume\File;

use Illuminate\Support\Facades\Log;

class FileSimple implements FileIO
{
    function storage($file)
    {
        $filename = uniqid() . "-" . $file->getClientOriginalName();
        $file->move('data', $filename);
    }

    function getFieldsCSV($file)
    {
        $file = fopen($file, "r");
        $fieldsArray = array();
        
        $i = 0;
        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
            $num = count($filedata);

            for ($c = 0; $c < $num; $c++) {
                $fieldsArray[$i][] = $filedata[$c];
            }

            $i++;
        }

        $file = fclose($file);
        return $fieldsArray;
    }
}
