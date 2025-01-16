<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ocena;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Student;

class OcenaController extends Controller
{
    /**
     * Wyświetl listę ocen.
     */
    public function index(Request $request)
{
    // Pobieramy dane wyszukiwania z formularza
    $search = $request->input('search');

    $query = Ocena::with(['teacher', 'subject', 'student']);

    if ($search) {
        // Dodajemy warunki wyszukiwania
        $query->where(function ($q) use ($search) {
            $q->whereHas('teacher', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('surname', 'like', '%' . $search . '%');
            })
            ->orWhereHas('subject', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('student', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('surname', 'like', '%' . $search . '%');
            })
            ->orWhere('ocena', 'like', '%' . $search . '%'); // Wyszukiwanie po ocenie
        });
    }

    // Paginacja wyników
    $oceny = $query->paginate(50);

    return view('oceny.index', compact('oceny'));
}


    /**
     * Wyświetl formularz tworzenia nowej oceny.
     */
    public function create()
    {
        
        // Pobieranie dostępnych nauczycieli, przedmiotów i studentów
        $teachers = Teacher::all();
        $subjects = Subject::all();
        $students = Student::all();

        return view('oceny.create', compact('teachers', 'subjects', 'students'));
    }

    /**
     * Zapisz nową ocenę w bazie danych.
     */
    public function store(Request $request)
    {
        // Walidacja danych wejściowych
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'subject_id' => 'required|exists:subjects,id',
            'student_id' => 'required|exists:students,id',
            'ocena' => 'required|integer|min:2|max:5', // Przykładowa walidacja dla ocen 1-6
        ]);

        // Tworzenie nowej oceny
        Ocena::create($request->all());

        return redirect()->route('oceny.index')->with('success', 'Ocena została dodana.');
    }

    public function show($id)
    {
        $ocena = Ocena::with(['teacher', 'subject', 'student'])->find($id);
        return view('oceny.show', compact('ocena'));
    }
    public function edit($id)
    {
        
        $ocena = Ocena::findOrFail($id);  // Zdobądź ocenę z bazy danych
        $teachers = Teacher::all();       // Pobierz wszystkich nauczycieli
        $subjects = Subject::all();       // Pobierz wszystkie przedmioty
        $students = Student::all();       // Pobierz wszystkich uczniów
        
        return view('oceny.edit', compact('ocena', 'teachers', 'subjects', 'students'));
    }

    public function update(Request $request, string $id)
    {
        
        // Walidacja danych
        $request->validate([
            'teacher_id' => 'required',
            'subject_id' => 'required',
            'student_id' => 'required',
            'ocena' => 'required',
        ]);
        $ocena = Ocena::findOrFail($id);
        $ocena->update($request->all());
        return redirect()->route('oceny.index')->with('success', 'ocena został zaktualizowany.');   
    }

    public function destroy(string $id)
    {
        
        $ocena = Ocena::findOrFail($id);
        $ocena->delete();
        return redirect()->route('oceny.index')->with('success', 'Ocena została usunięta.');
    }
}
