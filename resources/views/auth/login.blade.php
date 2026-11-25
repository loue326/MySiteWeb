<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Agenda</title>
    <link rel="stylesheet" href="{{ asset('css/events.css') }}">
</head>
<body>
<main class="app-content">
    <h1>Connexion</h1>
    @if($errors->any())<p class="form-error">{{ $errors->first() }}</p>@endif
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        <label for="password">Mot de passe</label>
        <input id="password" type="password" name="password" required>
        <button type="submit">Se connecter</button>
    </form>
    <a href="{{ route('register') }}">Créer un compte</a>
</main>
</body>
</html>
