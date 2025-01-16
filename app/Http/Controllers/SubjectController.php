<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use App\Models\Teacher;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        // Pobieranie zapytania wyszukiwania z formularza
        $search = $request->input('search'); 

        $query = Subject::query();

        if ($search) {
            // Wyszukiwanie po nazwie przedmiotu
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Paginacja wyników
        $subjects = $query->paginate(50);

        return view('subjects.index', compact('subjects'));
    }


    // Formularz do dodania nowego przedmiotu
    public function create()
    {
        
        $teachers = Teacher::all();  // Pobieramy wszystkich nauczycieli
        return view('subjects.create', compact('teachers'));  // Przekazujemy nauczycieli do widoku
    }

    // Zapisanie nowego przedmiotu w bazie danych
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',  // Walidacja nazwy przedmiotu
            'teachers' => 'required|array|min:1',  // Walidacja, aby wybrano co najmniej jeden nauczyciel
            'teachers.*' => 'exists:teachers,id',  // Sprawdzamy, czy wybrane nauczyciele istnieją w tabeli teachers
        ]);
    
        // Tworzenie nowego przedmiotu
        $subject = Subject::create([
            'name' => $request->name,
        ]);
    
        // Przypisywanie nauczycieli do przedmiotu (relacja wiele do wielu)
        $subject->teachers()->attach($request->teachers);
    
        // Przekierowanie po zakończeniu
        return redirect()->route('subjects.index')->with('success', 'Przedmiot został dodany.');
    }

    // Wyświetlanie szczegółów przedmiotu
    public function show(Subject $subject)
    {
        $subject->load('teachers');  // Ładujemy nauczycieli przypisanych do przedmiotu
        return view('subjects.show', compact('subject'));
    }

    // Formularz do edycji przedmiotu
    public function edit($id)
    {
        
        $subject = Subject::findOrFail($id);  // Pobieramy przedmiot
        $assignedTeachers = $subject->teachers;  // Nauczyciele przypisani do przedmiotu
        $allTeachers = Teacher::all();  // Pobieramy wszystkich nauczycieli
        $unassignedTeachers = $allTeachers->diff($assignedTeachers);  // Nauczyciele, którzy nie uczą tego przedmiotu

        return view('subjects.edit', compact('subject', 'assignedTeachers', 'unassignedTeachers'));  // Przekazujemy dane do widoku
    }

    public function update(Request $request, $id)
    {
        
        // Walidacja danych
        $request->validate([
            'name' => 'required|string|max:255',  // Walidacja nazwy przedmiotu
            'remove_teachers' => 'nullable|array',  // Walidacja nauczycieli do usunięcia
            'remove_teachers.*' => 'exists:teachers,id',  // Sprawdzamy, czy ID nauczycieli istnieje
            'add_teachers' => 'nullable|array',  // Walidacja nauczycieli do dodania
            'add_teachers.*' => 'exists:teachers,id',  // Sprawdzamy, czy ID nowych nauczycieli istnieje
        ]);

        $subject = Subject::findOrFail($id);  // Pobieramy przedmiot

        // Zaktualizowanie nazwy przedmiotu
        $subject->update([
            'name' => $request->input('name'),
        ]);

        // Usuwanie nauczycieli przypisanych do przedmiotu
        if ($request->has('remove_teachers')) {
            $subject->teachers()->detach($request->input('remove_teachers'));
        }

        // Dodawanie nowych nauczycieli do przedmiotu
        if ($request->has('add_teachers')) {
            $subject->teachers()->attach($request->input('add_teachers'));
        }

        return redirect()->route('subjects.index')->with('success', 'Przedmiot został zaktualizowany.');
    }


    // Usunięcie przedmiotu
    public function destroy(Subject $subject)
    {
        
        $subject->delete();  // Usuwanie przedmiotu z bazy danych

        return redirect()->route('subjects.index')->with('success', 'Przedmiot został usunięty.');
    }
}
