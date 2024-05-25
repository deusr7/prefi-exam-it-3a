<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        $subjects = Subject::query();

        // Filtering, Sorting, Limit, Offset, Fields
        // Implement these as per previous example...

        // Return subjects with the desired response structure
        return response()->json($subjects->get());
    }

    public function store(Request $request)
    {
        $subjectData = $request->all();
        $subjectData['average_grade'] = array_sum($subjectData['grades']) / count($subjectData['grades']);
        $subjectData['remarks'] = $subjectData['average_grade'] >= 3.0 ? 'PASSED' : 'FAILED';

        $subject = Subject::create($subjectData);
        return response()->json($subject, 201);
    }

    public function show($id)
    {
        $subject = Subject::findOrFail($id);
        return response()->json($subject);
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
        $subjectData = $request->all();
        $subjectData['average_grade'] = array_sum($subjectData['grades']) / count($subjectData['grades']);
        $subjectData['remarks'] = $subjectData['average_grade'] >= 3.0 ? 'PASSED' : 'FAILED';

        $subject->update($subjectData);
        return response()->json($subject);
    }
}
