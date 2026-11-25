@extends('layouts.app')

@section('title', 'Événements')

@section('content')
<h1>Liste des événements</h1>

<form class="filters" action="{{ route('events.index') }}" method="GET">
    <input type="text" name="search" placeholder="Rechercher un événement..." value="{{ $search ?? '' }}">
    <select name="category_id">
        <option value="">Toutes les catégories</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" @selected(request('category_id') == $category->id)>{{ $category->nom }}</option>
        @endforeach
    </select>
    <button type="submit">Rechercher / filtrer</button>
    <a href="{{ route('events.index') }}">Réinitialiser</a>
</form>

<section class="stats">
    <p>Total des événements : {{ $totalEvents }}</p>
    <p>Événements à venir : {{ $upcomingEvents }}</p>
</section>

<p class="page-actions">
    <a class="button-link" href="{{ route('events.create') }}">Ajouter un événement</a>
    <a class="button-link secondary-link" href="{{ route('categories.index') }}">Gérer les catégories</a>
    <a class="button-link secondary-link" href="{{ route('events.pdf') }}">Exporter en PDF</a>
</p>

<table>
    <thead><tr><th>Titre</th><th>Date</th><th>Heure</th><th>Lieu</th><th>Catégorie</th><th>Statut</th><th>Actions</th></tr></thead>
    <tbody>
        @forelse($events as $event)
            <tr>
                <td>{{ $event->titre }}</td>
                <td>{{ $event->date }}</td>
                <td>{{ $event->heure }}</td>
                <td>{{ $event->lieu }}</td>
                <td>{{ $event->category?->nom ?? 'Sans catégorie' }}</td>
                <td>
                    @if($event->date >= date('Y-m-d'))<span class="upcoming">À venir</span>
                    @else<span class="finished">Terminé</span>@endif
                </td>
                <td class="actions">
                    <a href="{{ route('events.show', $event) }}">Voir</a>
                    <a href="{{ route('events.edit', $event) }}">Modifier</a>
                    <form class="inline-form" action="{{ route('events.destroy', $event) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="7">Aucun événement trouvé.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $events->links() }}
@endsection
