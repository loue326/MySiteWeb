<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Afficher tous les événements
    public function index(Request $request)
    {
        $search = $request->search;
        $categories = Category::orderBy('nom')->get();

        $events = Event::where('titre', 'LIKE', '%' . $search . '%')
                       ->when($request->category_id, function ($query) use ($request) {
                           $query->where('category_id', $request->category_id);
                       })
                       ->with('category')
                       ->orderBy('date', 'asc')
                       ->paginate(5)
                       ->withQueryString();

        $totalEvents = Event::count();

        $upcomingEvents = Event::where('date', '>=', now()->toDateString())
                               ->count();

        return view('events.index', compact(
            'events',
            'categories',
            'search',
            'totalEvents',
            'upcomingEvents'
        ));
    }

    public function dashboard()
    {
        $totalEvents = Event::count();
        $totalCategories = Category::count();
        $upcomingEvents = Event::whereDate('date', '>=', now()->toDateString())->count();

        return view('events.dashboard', compact(
            'totalEvents',
            'totalCategories',
            'upcomingEvents'
        ));
    }

    // Afficher le formulaire d'ajout
    public function create()
    {
        $categories = Category::orderBy('nom')->get();

        return view('events.create', compact('categories'));
    }

    // Enregistrer un nouvel événement
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'heure' => 'nullable|date_format:H:i',
            'lieu' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id'
        ]);

        Event::create($request->only([
            'titre',
            'description',
            'date',
            'heure',
            'lieu',
            'category_id'
        ]));

        return redirect()->route('events.index')
                         ->with('success', 'Événement ajouté avec succès !');
    }

    // Afficher les détails d'un événement
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    // Afficher le formulaire de modification
    public function edit(Event $event)
    {
        $categories = Category::orderBy('nom')->get();

        return view('events.edit', compact('event', 'categories'));
    }

    // Modifier un événement
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'heure' => 'nullable|date_format:H:i',
            'lieu' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id'
        ]);

        $event->update($request->only([
            'titre',
            'description',
            'date',
            'heure',
            'lieu',
            'category_id'
        ]));

        return redirect()->route('events.index')
                         ->with('success', 'Événement modifié avec succès !');
    }

    // Supprimer un événement
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')
                         ->with('success', 'Événement supprimé avec succès !');
    }
}
