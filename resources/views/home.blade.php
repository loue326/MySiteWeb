<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Accueil</title>
    <link rel="stylesheet" href="{{ asset('css/events.css') }}">
</head>
<body>

    <h1>Bienvenue sur Agenda</h1>

    <p>
        Gérez facilement vos rendez-vous
        et vos événements.
    </p>

    <a href="{{ route('events.index') }}">
        Consulter les événements
    </a>

    <br><br>

    <a href="{{ route('events.create') }}">
        Ajouter un événement
    </a>

</body>
</html>
