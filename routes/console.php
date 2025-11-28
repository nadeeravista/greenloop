<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('command:purpose', function () {
    $this->comment('Command purpose');
})->purpose('Command purpose');
