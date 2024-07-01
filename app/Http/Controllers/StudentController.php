<?php

namespace App\Http\Controllers;

use App\Repositories\StudentRepository;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentRepository;
    public function __construct(StudentRepository $studentRepository){
        $this->studentRepository = $studentRepository;
    }
    public function index()
    {
        $students = $this->studentRepository->getAll();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $courses = $this->studentRepository->create();
        return view('students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'phone' => 'required',
            'degree' => 'required',
            'is_new_student' => 'boolean',
            'courses' => 'array',
            'extra_field' => 'array',
        ]);
        $data = $request->all();
        $data['is_new_student'] = $request->boolean('is_new_student');
        $this->studentRepository->store($data);

        return redirect()->route('students.index');
    }
    public function edit($id)
    {
        $data = $this->studentRepository->edit($id);
        return view('students.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'phone' => 'required',
            'degree' => 'required',
            'is_new_student' => 'boolean',
            'courses' => 'array',
            'extra_field' => 'array',
        ]);

        $data = $request->all();
        $data['is_new_student'] = $request->boolean('is_new_student');
        $this->studentRepository->update($id, $data);

        return redirect()->route('students.index');
    }

    public function destroy( $id)
    {
        $this->studentRepository->delete($id);
        return redirect()->route('students.index');
    }
}
