<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte - Agenda</title>
    <link rel="stylesheet" href="{{ asset('css/events.css') }}">
</head>
<body>
<main class="app-content">
    <h1>Créer un compte</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label for="name">Nom</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required>
        @error('name')<p class="form-error">{{ $message }}</p>@enderror
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        @error('email')<p class="form-error">{{ $message }}</p>@enderror
        <label for="password">Mot de passe</label>
        <input id="password" type="password" name="password" required>
        @error('password')<p class="form-error">{{ $message }}</p>@enderror
        <label for="password_confirmation">Confirmer le mot de passe</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
        <button type="submit">S'inscrire</button>
    </form>
    <a href="{{ route('login') }}">J'ai déjà un compte</a>
</main>
</body>
</html>
