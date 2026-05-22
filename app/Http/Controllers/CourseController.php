<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->search;

        $courses = Course::select( ['id', 'title', 'price'] )
            ->where('visible', true)
            ->when($search, fn(Builder $query) =>
                $query
                    ->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")

            )
            ->orderBy('id', 'desc')
            ->paginate(15);
        return view('courses.index', [
            'title' => 'Acá van los cursos etc',
            'courses' => $courses,
            'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //Validar la información.
        $request->validate([
            'title' => ['required', 'max:100'],
            'description' => ['required'],
            'price' => ['numeric', 'max:1000000']
        ]);
        
        //Creamos curso nuevo
        $course = Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return redirect()
            ->route('courses.index')
            ->with('status', 'El curso se creó correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {

        //$course = Course::findOrFail($id);

        return view('courses.show', [
            'course' => $course
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', [
            'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        
        //Validar la información.
        $request->validate([
            'title' => ['required', 'max:100'],
            'description' => ['required'],
            'price' => ['numeric', 'max:1000000']
        ]);

        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return redirect()
            ->route('courses.index')
            ->with('status', 'El curso se modificó correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        
        //$course->delete();

        $course->update([
            'visible' => false
        ]);

        return redirect()
            ->route('courses.index')
            ->with('status', 'El curso se eliminó correctamente.');

    }
}
