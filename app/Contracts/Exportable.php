<?php

namespace App\Contracts;

interface Exportable
{
    public function export($data);
}