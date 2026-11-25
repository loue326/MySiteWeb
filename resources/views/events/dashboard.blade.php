@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
<h1>Tableau de bord</h1>
<section class="stats dashboard-stats">
    <article><h2>Total événements</h2><p>{{ $totalEvents }}</p></article>
    <article><h2>Total catégories</h2><p>{{ $totalCategories }}</p></article>
    <article><h2>Événements à venir</h2><p>{{ $upcomingEvents }}</p></article>
</section>
<a class="button-link" href="{{ route('events.index') }}">Voir les événements</a>
@endsection
