@extends('layouts.app')

@section('title', 'Ajouter une catégorie')

@section('content')
<h1>Ajouter une catégorie</h1>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <label for="nom">Nom</label>
    <input id="nom" type="text" name="nom" value="{{ old('nom') }}" required maxlength="255">
    @error('nom')<p class="form-error">{{ $message }}</p>@enderror
    <label for="description">Description</label>
    <textarea id="description" name="description">{{ old('description') }}</textarea>
    @error('description')<p class="form-error">{{ $message }}</p>@enderror
    <button type="submit">Enregistrer</button>
</form>
<a href="{{ route('categories.index') }}">Annuler</a>
@endsection
