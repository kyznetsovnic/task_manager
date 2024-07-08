<?php

namespace App\Services;

use Carbon\Carbon;

class DateService implements DateServiceInterface
{
    public function format($date, string $format = 'Y-m-d'): string
    {
        return Carbon::parse($date)->format($format);
    }
}
