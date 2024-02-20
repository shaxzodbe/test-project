<?php

namespace App\Services;

use App\Contracts\Exportable;

class PdfService implements Exportable
{
    public function export($data)
    {
        return 12;
    }
}