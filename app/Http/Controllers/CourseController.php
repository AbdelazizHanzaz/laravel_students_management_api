<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\CourseResource;

use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::withTrashed()->get();
        
        return CourseResource::collection($courses);
    }

    public function show(Course $course)
    {
        return new CourseResource($course);
    }

    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->validated());
        
        return new CourseResource($course);
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());
        
        return new CourseResource($course);
    }

    public function destroy(Course $course)
    {
        // $course->delete();
        
        $course->forceDelete();
  
        return response()->noContent();
    }
}