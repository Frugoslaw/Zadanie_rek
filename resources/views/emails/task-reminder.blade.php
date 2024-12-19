<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przypomnienie o zadaniu</title>
</head>

<body>
    <h1>Przypomnienie o zadaniu: {{ $task->name }}</h1>
    <p>Termin zadania: {{ $task->due_date }}</p>
    <p>Priorytet: {{ \App\Constants\TaskConstants::PRIORITY[$task->priority] }}</p>
    <p>Status: {{ \App\Constants\TaskConstants::STATUS[$task->status] }}</p>
    <p>Nie zapomnij o wykonaniu zadania na czas!</p>
</body>

</html>
