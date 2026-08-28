@extends('layouts.app')

@section('title', 'All Students')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="font-heading text-3xl font-bold text-brand-800">Registered Students</h1>
        <p class="text-slate-500 mt-2">{{ $students->total() }} student(s) registered so far.</p>
    </div>
    <a href="{{ route('students.create') }}"
        class="inline-flex items-center gap-2 bg-brand-600 hover:bg-brand-700 text-white font-semibold px-5 py-2.5 rounded-xl shadow-card transition">
        + Register Student
    </a>
</div>

<div class="bg-white rounded-2xl shadow-card border border-brand-100 overflow-hidden">
    <table class="w-full text-left text-sm">
        <thead class="bg-brand-50 text-brand-700 uppercase text-xs tracking-wide">
            <tr>
                <th class="px-6 py-4">Photo</th>
                <th class="px-6 py-4">Student ID</th>
                <th class="px-6 py-4">Name</th>
                <th class="px-6 py-4">Program</th>
                <th class="px-6 py-4">Year Level</th>
                <th class="px-6 py-4">Email</th>
                <th class="px-6 py-4"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-brand-50">
            @forelse ($students as $student)
                <tr class="hover:bg-brand-50/50 transition">
                    <td class="px-6 py-3">
                        <img src="{{ asset('storage/' . $student->profile_picture) }}"
                            class="w-10 h-10 rounded-full object-cover border border-brand-100" alt="{{ $student->first_name }}">
                    </td>
                    <td class="px-6 py-3 font-medium text-slate-700">{{ $student->student_id }}</td>
                    <td class="px-6 py-3 text-slate-700">{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td class="px-6 py-3 text-slate-600">{{ $student->program }}</td>
                    <td class="px-6 py-3 text-slate-600">{{ $student->year_level }}</td>
                    <td class="px-6 py-3 text-slate-600">{{ $student->email }}</td>
                    <td class="px-6 py-3 text-right">
                        <a href="{{ route('students.show', $student->id) }}" class="text-brand-600 hover:text-brand-800 font-medium">View →</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-6 py-10 text-center text-slate-400">No students registered yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $students->links() }}
</div>
@endsection