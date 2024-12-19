<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendTaskReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-task-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Wyślij przypomnienia o zadaniach na dzień przed terminem.';

    /**
     * Execute the console command.
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $tasks = Task::dueTomorrow()->get();

        foreach ($tasks as $task) {
            SendTaskReminder::dispatch($task);
            $this->info('Zadanie "' . $task->name . '" zostało dodane do kolejki przypomnień.');
        }
    }
}
