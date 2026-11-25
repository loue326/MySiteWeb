<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des événements</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h1 { text-align: center; color: #1e3a5f; }
        table { width: 100%; border-collapse: collapse; margin-top: 25px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #1e3a5f; color: white; }
    </style>
</head>
<body>
    <h1>Agenda</h1>
    <h3>Liste des événements</h3>
    <table>
        <thead><tr><th>Titre</th><th>Date</th><th>Heure</th><th>Lieu</th><th>Catégorie</th></tr></thead>
        <tbody>
            @foreach($events as $event)
                <tr><td>{{ $event->titre }}</td><td>{{ $event->date }}</td><td>{{ $event->heure }}</td><td>{{ $event->lieu }}</td><td>{{ $event->category?->nom ?? 'Sans catégorie' }}</td></tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
