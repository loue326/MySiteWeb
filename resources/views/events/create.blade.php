@extends('layouts.app')

@section('title', 'Ajouter un événement')

@section('content')
<h1>Ajouter un événement</h1>
@if($errors->any())
    <div class="form-error"><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
@endif
<form action="{{ route('events.store') }}" method="POST">
    @csrf
    <label for="titre">Titre</label>
    <input id="titre" type="text" name="titre" value="{{ old('titre') }}" required>
    @error('titre')<p class="form-error">{{ $message }}</p>@enderror
    <label for="description">Description</label>
    <textarea id="description" name="description">{{ old('description') }}</textarea>
    <label for="date">Date</label>
    <input id="date" type="date" name="date" value="{{ old('date') }}" required>
    @error('date')<p class="form-error">{{ $message }}</p>@enderror
    <label for="heure">Heure</label>
    <input id="heure" type="time" name="heure" value="{{ old('heure') }}">
    <label for="lieu">Lieu</label>
    <input id="lieu" type="text" name="lieu" value="{{ old('lieu') }}" required>
    @error('lieu')<p class="form-error">{{ $message }}</p>@enderror
    <label for="category_id">Catégorie</label>
    <select id="category_id" name="category_id">
        <option value="">Sans catégorie</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->nom }}</option>
        @endforeach
    </select>
    @error('category_id')<p class="form-error">{{ $message }}</p>@enderror
    <button type="submit">Enregistrer</button>
</form>
<a href="{{ route('events.index') }}">Retour</a>
@endsection
