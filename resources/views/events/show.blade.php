@extends('layouts.app')

@section('title', 'Détails de l’événement')

@section('content')
<h1>Détails de l’événement</h1>
<dl class="event-details">
    <dt>Titre</dt><dd>{{ $event->titre }}</dd>
    <dt>Description</dt><dd>{{ $event->description ?? '—' }}</dd>
    <dt>Date</dt><dd>{{ $event->date }}</dd>
    <dt>Heure</dt><dd>{{ $event->heure ?? '—' }}</dd>
    <dt>Lieu</dt><dd>{{ $event->lieu }}</dd>
    <dt>Catégorie</dt><dd>{{ $event->category?->nom ?? 'Sans catégorie' }}</dd>
</dl>
<a href="{{ route('events.index') }}">Retour à la liste</a>
@endsection
