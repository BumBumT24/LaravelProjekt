<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;


class TeacherController extends Controller
{
    public function index(Request $request)
    {
        // Pobieranie zapytania wyszukiwania z formularza
        $search = $request->input('search'); 

        $query = Teacher::query();

        if ($search) {
            // Wyszukiwanie po imieniu lub nazwisku
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                ->orWhere('surname', 'like', '%' . $search . '%');
            });
        }

        // Paginacja wyników
        $teachers = $query->paginate(50);

        return view('teachers.index', compact('teachers'));
    }


    // Formularz do dodania nowego nauczyciela
    public function create()
    {
        $subjects = Subject::all();  // Pobieramy wszystkie przedmioty
        return view('teachers.create', compact('subjects'));
    }

    // Zapisanie nowego nauczyciela do bazy danych
    public function store(Request $request)
    {
        // Walidacja danych
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'subjects' => 'required|array|min:1', // Sprawdzamy, czy wybrano przynajmniej jeden przedmiot
            'subjects.*' => 'exists:subjects,id', // Sprawdzamy, czy ID przedmiotu istnieje w tabeli subjects
        ]);

        // Tworzymy nauczyciela
        $teacher = Teacher::create([
            'name' => $request->name,
            'surname' => $request->surname,
        ]);

        // Przypisujemy przedmioty do nauczyciela (relacja wiele do wielu)
        $teacher->subjects()->attach($request->subjects);

        // Przekierowanie po zakończeniu
        return redirect()->route('teachers.index')->with('success', 'Nauczyciel został dodany.');
    }

    // Wyświetlenie szczegółów nauczyciela
    public function show($id)
    {
        $teacher = Teacher::with('subjects')->findOrFail($id);  // Pobieramy nauczyciela z powiązanymi przedmiotami
        return view('teachers.show', compact('teacher'));  // Zwracamy widok z nauczycielem i jego przedmiotami
    }

    // Formularz do edytowania danych nauczyciela
    public function edit($id)
    {
        
        $teacher = Teacher::findOrFail($id);  // Pobieramy nauczyciela
        $assignedSubjects = $teacher->subjects;  // Przedmioty, które nauczyciel już uczy
        $allSubjects = Subject::all();  // Pobieramy wszystkie dostępne przedmioty
        $unassignedSubjects = $allSubjects->diff($assignedSubjects);  // Przedmioty, których nauczyciel jeszcze nie uczy

        return view('teachers.edit', compact('teacher', 'assignedSubjects', 'unassignedSubjects'));  // Przekazujemy dane do widoku
    }

    public function update(Request $request, $id)
    {
        
        // Walidacja danych
        $request->validate([
            'name' => 'required|string|max:255',  // Walidacja imienia
            'surname' => 'required|string|max:255',  // Walidacja nazwiska
            'remove_subjects' => 'nullable|array',  // Walidacja przedmiotów do usunięcia
            'remove_subjects.*' => 'exists:subjects,id',  // Sprawdzamy, czy ID przedmiotów istnieje
            'add_subjects' => 'nullable|array',  // Walidacja nowych przedmiotów
            'add_subjects.*' => 'exists:subjects,id',  // Sprawdzamy, czy ID nowych przedmiotów istnieje
        ]);

        $teacher = Teacher::findOrFail($id);  // Pobieramy nauczyciela

        // Zaktualizowanie imienia i nazwiska nauczyciela
        $teacher->update([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
        ]);

        // Usuwanie przedmiotów przypisanych do nauczyciela
        if ($request->has('remove_subjects')) {
            $teacher->subjects()->detach($request->input('remove_subjects'));
        }

        // Dodawanie nowych przedmiotów do nauczyciela
        if ($request->has('add_subjects')) {
            $teacher->subjects()->attach($request->input('add_subjects'));
        }

        return redirect()->route('teachers.index')->with('success', 'Dane nauczyciela zostały zaktualizowane.');
    }


    // Usunięcie nauczyciela
    public function destroy($id)
    {
       
        $teacher = Teacher::findOrFail($id);  // Pobieramy nauczyciela
        $teacher->delete();  // Usuwamy nauczyciela

        return redirect()->route('teachers.index')->with('success', 'Nauczyciel został usunięty.');
    }
}
