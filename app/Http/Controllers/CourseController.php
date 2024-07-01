<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Repositories\CourseRepository;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $courseRepository;
    public function __construct(CourseRepository $courseRepository){
        $this->courseRepository = $courseRepository;
    }
    public function index()
    {
        $courses = $this->courseRepository->getAll();
        return view('courses.index', compact('courses'));
    }
    public function create()
    {
        return view('courses.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->courseRepository->create($request->all());

        return redirect()->route('courses.index');
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->courseRepository->update($request->all(),$id);

        return redirect()->route('courses.index');
    }

    public function destroy($id)
    {
        $this->courseRepository->delete($id);
        return redirect()->route('courses.index');
    }
}
