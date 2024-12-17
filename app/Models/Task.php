<?php

namespace App\Models;

use App\Models\User;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['name', 'description', 'priority', 'status', 'due_date', 'user_id',];

    // Nazwa modelu w logach
    protected static $logName = 'task';

    // Ustawienie logowania tylko dla wypełnionych atrybutów
    protected static $logFillable = true;

    // Opcje logowania
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'description', 'priority', 'status', 'due_date'])
            ->useLogName('task')
            ->logFillable();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
