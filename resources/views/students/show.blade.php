@extends('layouts.app')

@section('title', 'Student Profile')
@section('page_title', 'Student Record')

@section('content')
<div class="max-w-4xl mx-auto pt-2">

    <div class="mb-8">
        <p class="text-gold-400 font-mono-tag text-xs uppercase tracking-widest mb-2">Registration Complete</p>
        <h1 class="font-display text-3xl font-bold text-white">Student Profile</h1>
        <p class="text-slate-400 mt-2">Confirmed record for {{ $student->first_name }} {{ $student->last_name }}.</p>
    </div>

    <div class="rounded-2xl border border-ink-700/60 glass shadow-glow overflow-hidden">

        <!-- Header banner -->
        <div class="relative px-8 py-10 flex flex-col sm:flex-row items-center gap-6 border-b border-ink-700/60 bg-gradient-to-br from-violet-700/30 via-ink-900/40 to-ink-900">
            <img src="{{ asset('storage/' . $student->profile_picture) }}" alt="Profile picture"
                class="w-28 h-28 rounded-2xl object-cover border-2 border-gold-400/60 shadow-goldglow">
            <div class="text-center sm:text-left">
                <h2 class="font-display text-2xl font-bold text-white">
                    {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}
                </h2>
                <p class="text-violet-300 text-sm mt-1">{{ $student->program }}</p>
                <span class="inline-flex items-center gap-1.5 mt-3 text-xs font-mono-tag text-gold-300 bg-gold-500/10 border border-gold-500/30 px-3 py-1 rounded-full">
                    Student ID : {{ $student->student_id }}
                </span>
            </div>
        </div>

        <!-- Details grid -->
        <div class="p-8 grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-6">
            <div>
                <p class="text-[11px] uppercase tracking-widest text-slate-500 font-mono-tag">Gender</p>
                <p class="text-slate-100 font-medium mt-1">{{ $student->gender }}</p>
            </div>
            <div>
                <p class="text-[11px] uppercase tracking-widest text-slate-500 font-mono-tag">Date of Birth</p>
                <p class="text-slate-100 font-medium mt-1">{{ $student->date_of_birth->format('F d, Y') }}</p>
            </div>
            <div>
                <p class="text-[11px] uppercase tracking-widest text-slate-500 font-mono-tag">Email Address</p>
                <p class="text-slate-100 font-medium mt-1">{{ $student->email }}</p>
            </div>
            <div>
                <p class="text-[11px] uppercase tracking-widest text-slate-500 font-mono-tag">Mobile Number</p>
                <p class="text-slate-100 font-medium mt-1 font-mono-tag">{{ $student->mobile_number }}</p>
            </div>
            <div>
                <p class="text-[11px] uppercase tracking-widest text-slate-500 font-mono-tag">Year Level</p>
                <p class="text-slate-100 font-medium mt-1">{{ $student->year_level }}</p>
            </div>
            <div>
                <p class="text-[11px] uppercase tracking-widest text-slate-500 font-mono-tag">Program</p>
                <p class="text-slate-100 font-medium mt-1">{{ $student->program }}</p>
            </div>
            <div class="sm:col-span-2">
                <p class="text-[11px] uppercase tracking-widest text-slate-500 font-mono-tag">Address</p>
                <p class="text-slate-100 font-medium mt-1">{{ $student->address }}</p>
            </div>
        </div>

        <div class="px-8 pb-8 flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ route('students.create') }}"
                class="inline-flex items-center justify-center gap-2 bg-violet-600 hover:bg-violet-500 text-white font-display font-semibold px-6 py-3 rounded-xl shadow-glow transition">
                Register Another Student
            </a>
            <a href="{{ route('students.index') }}"
                class="inline-flex items-center justify-center gap-2 bg-ink-800 hover:bg-ink-700 border border-ink-600 text-slate-200 font-display font-semibold px-6 py-3 rounded-xl transition">
                View All Records
            </a>
        </div>
    </div>
</div>
@endsection