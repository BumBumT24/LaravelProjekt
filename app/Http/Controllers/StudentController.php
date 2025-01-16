<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\ClassModel;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Pobiera zapytanie wyszukiwania

        $query = Student::query();
        
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('surname', 'like', '%' . $search . '%')
                    ->orWhereHas('studentClass', function($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    });
            });
        }

        $students = $query->paginate(50); // Paginacja wyników

        return view('students.index', compact('students'));
    }

    public function create(){
        
        $classes = ClassModel::all();
        return view('students.create', compact('classes'));
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'class_id'=>'required',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Uczeń został dodany.');
    }
    public function show(Student $student){
        $student->load('oceny.teacher');
        return view('students.show', compact('student'));
    }
    public function edit(Student $student){
        
        $classes = ClassModel::all();
        return view('students.edit', compact('student', 'classes'));
    }
    public function update(Request $request, Student $student){
        
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'class_id'=>'required|exists:classes,id',
        ]);
    
        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Uczeń został zaktualizowany.');
    }
    
    public function destroy(Student $student){
        
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Uczeń został usunięty');
    }
}
