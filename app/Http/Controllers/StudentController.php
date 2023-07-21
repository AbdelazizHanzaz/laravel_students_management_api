<?php
 
 namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest; 
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Response;

class StudentController extends Controller 
{

  public function index()
  {
    $students = Student::withTrashed()->get();
    return response()->json($students);
  }

  public function show(Student $student)
  {
      $this->authorize('view', $student);

      return new StudentResource($student);
  }

  public function store(StoreStudentRequest $request)
  {
    $student = Student::create($request->validated());
    return response()->json($student, Response::HTTP_CREATED);
  }

  public function update(UpdateStudentRequest $request, Student $student) 
  {
    $student->update($request->validated());
    return response()->json($student);
  }

  public function destroy(Student $student)
  {
    //$student->delete();
    $student->forceDelete();
  
     return response()->noContent();
  }

}