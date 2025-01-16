<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\Teacher;

class ClassController extends Controller
{
    /**
     * Display a listing of the classes.
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); // Pobiera zapytanie wyszukiwania

        $query = ClassModel::query();
        
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%'); // Wyszukiwanie po nazwie klasy
        }

        $classes = $query->paginate(50); // Paginacja wyników
        return view('classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new class.
     */
    public function create()
    {
        $classes = ClassModel::all(); // Pobieranie klas
        return view('classes.create', compact('classes'));
    }

    /**
     * Store a newly created class in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ClassModel::create($request->all());

        return redirect()->route('classes.index')->with('success', 'Klasa została dodana.');
    }

    /**
     * Display the specified class.
     */
    public function show(ClassModel $class)
    {
        return view('classes.show', compact('class'));
    }

    /**
     * Show the form for editing the specified class.
     */
    public function edit(ClassModel $class)
    {
        
        $teachers = Teacher::all();
        return view('classes.edit', compact('class', 'teachers'));
    }

    /**
     * Update the specified class in storage.
     */
    public function update(Request $request, ClassModel $class)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $class->update($request->all());

        return redirect()->route('classes.index')->with('success', 'Klasa została zaktualizowana.');
    }

    /**
     * Remove the specified class from storage.
     */
    public function destroy(ClassModel $class)
    {
        
        $class->delete();
        return redirect()->route('classes.index')->with('success', 'Klasa została usunięta.');
    }
}
