@extends('layouts.app')

@section('title', 'Catégories')

@section('content')
<h1>Gestion des catégories</h1>
<a class="button-link" href="{{ route('categories.create') }}">Ajouter une catégorie</a>
<table>
    <thead><tr><th>Nom</th><th>Description</th><th>Événements</th><th>Actions</th></tr></thead>
    <tbody>
        @forelse($categories as $category)
            <tr>
                <td>{{ $category->nom }}</td>
                <td>{{ $category->description }}</td>
                <td>{{ $category->events_count }}</td>
                <td>
                    <a href="{{ route('categories.show', $category) }}">Voir</a>
                    <a href="{{ route('categories.edit', $category) }}">Modifier</a>
                    <form class="inline-form" action="{{ route('categories.destroy', $category) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Supprimer cette catégorie ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">Aucune catégorie disponible.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
