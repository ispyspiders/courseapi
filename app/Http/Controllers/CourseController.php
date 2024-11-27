<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Course::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'progression' => 'required'
        ]);
        return Course::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::find($id);
        if ($course !== null) {
            return $course;
        } else {
        return response()->json([
            'Course not found'
        ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::find($id);
        if($course !== null){
            $request->validate([
                'name' => 'required',
                'code' => 'required',
                'progression' => 'required'
            ]);
            $course->update($request->all());
            return $course;
        } else {
            return response()->json([
                'Course not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
$course = Course::find($id);
if($course !== null){
    $course->delete();
    return response()->json([
        'Course deleted'
    ]);
} else {
    return response()->json([
        'Course not found'
    ], 404);
}

    }
}
