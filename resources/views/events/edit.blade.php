@extends('layouts.app')

@section('title', 'Modifier un événement')

@section('content')
<h1>Modifier un événement</h1>
@if($errors->any())
    <div class="form-error"><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
@endif
<form action="{{ route('events.update', $event) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="titre">Titre</label>
    <input id="titre" type="text" name="titre" value="{{ old('titre', $event->titre) }}" required>
    @error('titre')<p class="form-error">{{ $message }}</p>@enderror
    <label for="description">Description</label>
    <textarea id="description" name="description">{{ old('description', $event->description) }}</textarea>
    <label for="date">Date</label>
    <input id="date" type="date" name="date" value="{{ old('date', $event->date) }}" required>
    @error('date')<p class="form-error">{{ $message }}</p>@enderror
    <label for="heure">Heure</label>
    <input id="heure" type="time" name="heure" value="{{ old('heure', $event->heure) }}">
    <label for="lieu">Lieu</label>
    <input id="lieu" type="text" name="lieu" value="{{ old('lieu', $event->lieu) }}" required>
    @error('lieu')<p class="form-error">{{ $message }}</p>@enderror
    <label for="category_id">Catégorie</label>
    <select id="category_id" name="category_id">
        <option value="">Sans catégorie</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" @selected(old('category_id', $event->category_id) == $category->id)>{{ $category->nom }}</option>
        @endforeach
    </select>
    @error('category_id')<p class="form-error">{{ $message }}</p>@enderror
    <button type="submit">Enregistrer</button>
</form>
<a href="{{ route('events.index') }}">Retour</a>
@endsection
