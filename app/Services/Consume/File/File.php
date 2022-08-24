<?php

namespace App\Services\Consume\File;

class File
{
    private $type;

    public function __construct(FileEnum $FileType)
    {
        $this->setTypeAPI($FileType->value);
    }

    public function setTypeAPI(string $FileType)
    {
        if (str_contains($FileType, "simple")) {
            $this->type = new FileSimple;
        }
    }

    public function storage($file)
    {
        return $this->type->storage($file);
    }

    public function getFieldsCSV($file)
    {
        return $this->type->getFieldsCSV($file);
    }
}
