<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('tasks:send-reminders', function () {
    Artisan::call('tasks:send-reminders');
})->purpose('Wysylanie powiadomien o taskach')->dailyAt('08:00');
