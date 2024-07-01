<?php
namespace App\Repositories;
use App\Models\Course;
use App\Repositories\Interfaces\CourseRepositoryInterface;

class CourseRepository implements CourseRepositoryInterface{
    protected $course;
    public function __construct(Course $course){
        $this->course = $course;
    }
    public function getAll(){
        return $this->course->all();
    }
    public function getId($id){
        return $this->course->find($id);
    }
    public function store($data){
        return $this->course->create($data);
    }
    public function create(array $data){
        return $this->course->create($data);
    }
    public function update(array $data, $id){
        $course = $this->course->find($id);
        if ($course) {
            $course->update($data);
            return $course;
        }
        return null;
    }
    public function delete($id){
        $course = $this->course->findOrFail($id);
        return $course->delete();
    }
}
