@extends('layouts.app')

@section('title', $category->nom)

@section('content')
<h1>{{ $category->nom }}</h1>
<p>{{ $category->description ?? 'Aucune description' }}</p>
<a href="{{ route('categories.index') }}">Retour aux catégories</a>
@endsection
