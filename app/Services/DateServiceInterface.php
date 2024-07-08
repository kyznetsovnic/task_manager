<?php

namespace App\Services;

interface DateServiceInterface
{
    /**
     * @param $date
     * @param string $format
     * @return string
     */
    public function format($date, string $format = 'Y-m-d'): string;
}
