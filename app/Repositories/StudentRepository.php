<?php

namespace App\Repositories;
use App\Models\Student;
use App\Models\Course;
use App\Repositories\Interfaces\StudentRepositoryInterface;
class StudentRepository
{
    protected $student,$course;
    public function __construct(Student $student,Course $course){
        $this->student = $student;
        $this->course = $course;
    }
    public function getAll()
    {
       return $this->student->with('courses')->get();
    }
    public function getId($id){
        return $this->student->with('courses')->find($id);
    }
    public function create()
    {
        return $this->course->all();
    }
    public function store(array $data)
    {
        $student = $this->student->create($data);
        if (isset($data['courses'])) {
            $syncData = [];
            foreach ($data['courses'] as $courseId) {
                $syncData[$courseId] = ['extra_field' => $data['extra_field'][$courseId] ?? null];
            }
            $student->courses()->sync($syncData);
        }
        return $student;
    }
    public function edit($id)
    {
        $student = $this->getId($id);
        $courses = $this->create();
        return compact('student', 'courses');
    }
    public function update($id, array $data){
        $student = $this->student->findOrFail($id);
        $student->update($data);

        if (isset($data['courses'])) {
            $syncData = [];
            foreach ($data['courses'] as $courseId) {
                $syncData[$courseId] = ['extra_field' => $data['extra_field'][$courseId] ?? null];
            }
            $student->courses()->sync($syncData);
        }

        return $student;
    }
    public function delete($id){
        $student = $this->student->findOrFail($id);
        return $student->delete();
    }
}
