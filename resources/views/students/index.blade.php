@extends('layouts.app')

@section('title', 'All Students')
@section('page_title', 'Student Records')

@section('content')
<div class="pt-2">

    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <p class="text-gold-400 font-mono-tag text-xs uppercase tracking-widest mb-2">Database</p>
            <h1 class="font-display text-3xl font-bold text-white">Registered Students</h1>
            <p class="text-slate-400 mt-2">{{ $students->total() }} record(s) on file.</p>
        </div>
        <a href="{{ route('students.create') }}"
            class="inline-flex items-center gap-2 bg-violet-600 hover:bg-violet-500 text-white font-display font-semibold px-5 py-2.5 rounded-xl shadow-glow transition">
            + New Registration
        </a>
    </div>

    <div class="rounded-2xl border border-ink-700/60 glass shadow-glow overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-ink-900/60 text-slate-400 uppercase text-[11px] tracking-widest font-mono-tag border-b border-ink-700/60">
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
            <tbody class="divide-y divide-ink-700/60">
                @forelse ($students as $student)
                    <tr class="hover:bg-violet-600/5 transition">
                        <td class="px-6 py-3">
                            <img src="{{ asset('storage/' . $student->profile_picture) }}"
                                class="w-10 h-10 rounded-lg object-cover border border-ink-600" alt="{{ $student->first_name }}">
                        </td>
                        <td class="px-6 py-3 font-mono-tag text-gold-300">{{ $student->student_id }}</td>
                        <td class="px-6 py-3 text-slate-100 font-medium">{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td class="px-6 py-3 text-slate-400">{{ $student->program }}</td>
                        <td class="px-6 py-3 text-slate-400">{{ $student->year_level }}</td>
                        <td class="px-6 py-3 text-slate-400">{{ $student->email }}</td>
                        <td class="px-6 py-3 text-right">
                            <a href="{{ route('students.show', $student->id) }}" class="text-violet-400 hover:text-violet-300 font-medium">View →</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-slate-500">No students registered yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6 text-slate-400">
        {{ $students->links() }}
    </div>
</div>
@endsection