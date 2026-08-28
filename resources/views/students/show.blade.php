@extends('layouts.app')

@section('title', 'Student Profile')

@section('content')
<div class="max-w-3xl mx-auto">

    <div class="text-center mb-8">
        <h1 class="font-heading text-3xl font-bold text-brand-800">Student Profile</h1>
        <p class="text-slate-500 mt-2">Registration details for {{ $student->first_name }} {{ $student->last_name }}.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-card border border-brand-100 overflow-hidden">

        <!-- Header banner -->
        <div class="bg-gradient-to-r from-brand-700 via-brand-600 to-brand-500 px-8 py-10 flex flex-col items-center text-center">
            <img src="{{ asset('storage/' . $student->profile_picture) }}" alt="Profile picture"
                class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg mb-4">
            <h2 class="font-heading text-2xl font-bold text-white">
                {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}
            </h2>
            <p class="text-brand-100 text-sm mt-1">{{ $student->program }} · {{ $student->year_level }}</p>
        </div>

        <!-- Details grid -->
        <div class="p-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <p class="text-xs uppercase tracking-wide text-slate-400 font-semibold">Student ID</p>
                <p class="text-slate-800 font-medium mt-1">{{ $student->student_id }}</p>
            </div>
            <div>
                <p class="text-xs uppercase tracking-wide text-slate-400 font-semibold">Gender</p>
                <p class="text-slate-800 font-medium mt-1">{{ $student->gender }}</p>
            </div>
            <div>
                <p class="text-xs uppercase tracking-wide text-slate-400 font-semibold">Date of Birth</p>
                <p class="text-slate-800 font-medium mt-1">{{ $student->date_of_birth->format('F d, Y') }}</p>
            </div>
            <div>
                <p class="text-xs uppercase tracking-wide text-slate-400 font-semibold">Email Address</p>
                <p class="text-slate-800 font-medium mt-1">{{ $student->email }}</p>
            </div>
            <div>
                <p class="text-xs uppercase tracking-wide text-slate-400 font-semibold">Mobile Number</p>
                <p class="text-slate-800 font-medium mt-1">{{ $student->mobile_number }}</p>
            </div>
            <div>
                <p class="text-xs uppercase tracking-wide text-slate-400 font-semibold">Year Level</p>
                <p class="text-slate-800 font-medium mt-1">{{ $student->year_level }}</p>
            </div>
            <div class="sm:col-span-2">
                <p class="text-xs uppercase tracking-wide text-slate-400 font-semibold">Address</p>
                <p class="text-slate-800 font-medium mt-1">{{ $student->address }}</p>
            </div>
        </div>

        <div class="px-8 pb-8 flex justify-center">
            <a href="{{ route('students.create') }}"
                class="inline-flex items-center gap-2 bg-brand-600 hover:bg-brand-700 text-white font-semibold px-6 py-3 rounded-xl shadow-card transition">
                Register Another Student
            </a>
        </div>
    </div>
</div>
@endsection