<?php

namespace App\Services\Consume\File;


interface FileIO
{
    function storage($file);
    function getFieldsCSV($file);
}
