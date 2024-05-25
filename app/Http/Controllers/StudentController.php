<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
      public function index(Request $request)
    {
        $students = Student::query();

        // Filtering
        if ($request->get('search')) {
            $students->where(function ($query) use ($request) {
                $query->where('firstname', 'like', "{$request->get('search')}%")
                      ->orWhere('lastname', 'like', "{$request->get('search')}%");
            });
        }

        if ($request->get('year')) {
            $students->where('year', $request->get('year'));
        }

        if ($request->get('course')) {
            $students->where('course', $request->get('course'));
        }

        if ($request->get('section')) {
            $students->where('section', $request->get('section'));
        }

        // Sorting
        if ($request->get('sort') && $request->get('direction')) {
            $students->orderBy($request->get('sort'), $request->get('direction'));
        }

        // Limit and Offset
        if ($request->get('limit')) {
            $students->limit($request->get('limit'));
        }

        if ($request->get('offset')) {
            $students->offset($request->get('offset'));
        }

        // Field selection
        $fields = $request->get('fields') ? explode(',', $request->get('fields')) : ['*'];

        return response()->json($students->get($fields));
    }

    public function store(Request $request)
    {
        $student = Student::create($request->all());
        return response()->json($student, 201);
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return response()->json($student);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return response()->json($student);
    } 
}
