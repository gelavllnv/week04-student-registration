<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class StudentController extends Controller
{
    //Display a listing of all registered students.
    public function index(): View
    {
        $students = Student::latest()->paginate(10);

        return view('students.index', compact('students'));
    }

    //Show the registration form.
    public function create(): View
    {
        return view('students.create');
    }

    // Validate and store a newly registered student.
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'student_id'      => ['required', 'string', 'max:20', 'unique:students,student_id'],
            'first_name'      => ['required', 'string', 'max:100'],
            'middle_name'     => ['nullable', 'string', 'max:100'],
            'last_name'       => ['required', 'string', 'max:100'],
            'email'           => ['required', 'email', 'unique:students,email'],
            'mobile_number'   => ['required', 'numeric', 'digits_between:7,15'],
            'gender'          => ['required', 'in:Male,Female,Other'],
            'date_of_birth'   => ['required', 'date', 'before:today'],
            'program'         => ['required', 'string', 'max:150'],
            'year_level'      => ['required', 'string', 'max:50'],
            'address'         => ['required', 'string', 'max:500'],
            'profile_picture' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        // Store the profile picture inside storage/app/public/profile_pictures
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');

        $validated['profile_picture'] = $path;

        $student = Student::create($validated);

        return redirect()
            ->route('students.show', $student->id)
            ->with('success', 'Student registered successfully!');
    }

    // Display a single student's profile after registration.
    public function show(Student $student): View
    {
        return view('students.show', compact('student'));
    }
}