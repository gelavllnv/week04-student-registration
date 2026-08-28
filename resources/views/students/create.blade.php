@extends('layouts.app')

@section('title', 'Register Student')
@section('page_title', 'New Registration')

@section('content')
<div class="max-w-5xl mx-auto pt-2">

    <div class="mb-8">
        <p class="text-gold-400 font-mono-tag text-xs uppercase tracking-widest mb-2">Student Intake Form</p>
        <h1 class="font-display text-3xl font-bold text-white">Register a New Student</h1>
        <p class="text-slate-400 mt-2 max-w-xl">Enter accurate details below — every record is validated before it's saved to the college database.</p>
    </div>

    <div class="rounded-2xl border border-ink-700/60 glass shadow-glow overflow-hidden">
        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="divide-y divide-ink-700/60">
            @csrf

            <!-- Personal Information -->
            <div class="p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 rounded-lg bg-violet-600/20 border border-violet-500/40 flex items-center justify-center text-violet-300 text-sm">◆</div>
                    <h2 class="font-display text-base font-semibold text-white">Personal Information</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-xs font-mono-tag uppercase tracking-wide text-slate-400 mb-2">Student ID <span class="text-gold-400">*</span></label>
                        <input type="text" name="student_id" value="{{ old('student_id') }}" placeholder="e.g. 2026-00214"
                            class="w-full rounded-lg bg-ink-900/80 border border-ink-600 text-white placeholder-slate-600 px-4 py-2.5 text-sm font-mono-tag focus:border-violet-500 focus:ring-2 focus:ring-violet-500/30 transition @error('student_id') border-rose-500 @enderror">
                        @error('student_id') <p class="text-rose-400 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-mono-tag uppercase tracking-wide text-slate-400 mb-2">Gender <span class="text-gold-400">*</span></label>
                        <select name="gender" class="w-full rounded-lg bg-ink-900/80 border border-ink-600 text-white px-4 py-2.5 text-sm focus:border-violet-500 focus:ring-2 focus:ring-violet-500/30 transition @error('gender') border-rose-500 @enderror">
                            <option value="" class="bg-ink-900">Select gender</option>
                            <option value="Male" class="bg-ink-900" @selected(old('gender') == 'Male')>Male</option>
                            <option value="Female" class="bg-ink-900" @selected(old('gender') == 'Female')>Female</option>
                            <option value="Other" class="bg-ink-900" @selected(old('gender') == 'Other')>Other</option>
                        </select>
                        @error('gender') <p class="text-rose-400 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-mono-tag uppercase tracking-wide text-slate-400 mb-2">First Name <span class="text-gold-400">*</span></label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                            class="w-full rounded-lg bg-ink-900/80 border border-ink-600 text-white placeholder-slate-600 px-4 py-2.5 text-sm focus:border-violet-500 focus:ring-2 focus:ring-violet-500/30 transition @error('first_name') border-rose-500 @enderror">
                        @error('first_name') <p class="text-rose-400 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-mono-tag uppercase tracking-wide text-slate-400 mb-2">Middle Name</label>
                        <input type="text" name="middle_name" value="{{ old('middle_name') }}"
                            class="w-full rounded-lg bg-ink-900/80 border border-ink-600 text-white placeholder-slate-600 px-4 py-2.5 text-sm focus:border-violet-500 focus:ring-2 focus:ring-violet-500/30 transition">
                    </div>

                    <div>
                        <label class="block text-xs font-mono-tag uppercase tracking-wide text-slate-400 mb-2">Last Name <span class="text-gold-400">*</span></label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}"
                            class="w-full rounded-lg bg-ink-900/80 border border-ink-600 text-white placeholder-slate-600 px-4 py-2.5 text-sm focus:border-violet-500 focus:ring-2 focus:ring-violet-500/30 transition @error('last_name') border-rose-500 @enderror">
                        @error('last_name') <p class="text-rose-400 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-mono-tag uppercase tracking-wide text-slate-400 mb-2">Date of Birth <span class="text-gold-400">*</span></label>
                        <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"
                            class="w-full rounded-lg bg-ink-900/80 border border-ink-600 text-white px-4 py-2.5 text-sm focus:border-violet-500 focus:ring-2 focus:ring-violet-500/30 transition @error('date_of_birth') border-rose-500 @enderror">
                        @error('date_of_birth') <p class="text-rose-400 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 rounded-lg bg-violet-600/20 border border-violet-500/40 flex items-center justify-center text-violet-300 text-sm">◆</div>
                    <h2 class="font-display text-base font-semibold text-white">Contact Information</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-xs font-mono-tag uppercase tracking-wide text-slate-400 mb-2">Email Address <span class="text-gold-400">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full rounded-lg bg-ink-900/80 border border-ink-600 text-white placeholder-slate-600 px-4 py-2.5 text-sm focus:border-violet-500 focus:ring-2 focus:ring-violet-500/30 transition @error('email') border-rose-500 @enderror">
                        @error('email') <p class="text-rose-400 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-mono-tag uppercase tracking-wide text-slate-400 mb-2">Mobile Number <span class="text-gold-400">*</span></label>
                        <input type="text" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="09xxxxxxxxx"
                            class="w-full rounded-lg bg-ink-900/80 border border-ink-600 text-white placeholder-slate-600 px-4 py-2.5 text-sm font-mono-tag focus:border-violet-500 focus:ring-2 focus:ring-violet-500/30 transition @error('mobile_number') border-rose-500 @enderror">
                        @error('mobile_number') <p class="text-rose-400 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-mono-tag uppercase tracking-wide text-slate-400 mb-2">Address <span class="text-gold-400">*</span></label>
                        <textarea name="address" rows="3"
                            class="w-full rounded-lg bg-ink-900/80 border border-ink-600 text-white placeholder-slate-600 px-4 py-2.5 text-sm focus:border-violet-500 focus:ring-2 focus:ring-violet-500/30 transition @error('address') border-rose-500 @enderror">{{ old('address') }}</textarea>
                        @error('address') <p class="text-rose-400 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Academic Information -->
            <div class="p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 rounded-lg bg-violet-600/20 border border-violet-500/40 flex items-center justify-center text-violet-300 text-sm">◆</div>
                    <h2 class="font-display text-base font-semibold text-white">Academic Information</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-xs font-mono-tag uppercase tracking-wide text-slate-400 mb-2">Program <span class="text-gold-400">*</span></label>
                        <input type="text" name="program" value="{{ old('program') }}" placeholder="e.g. BS Information Technology"
                            class="w-full rounded-lg bg-ink-900/80 border border-ink-600 text-white placeholder-slate-600 px-4 py-2.5 text-sm focus:border-violet-500 focus:ring-2 focus:ring-violet-500/30 transition @error('program') border-rose-500 @enderror">
                        @error('program') <p class="text-rose-400 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-mono-tag uppercase tracking-wide text-slate-400 mb-2">Year Level <span class="text-gold-400">*</span></label>
                        <select name="year_level" class="w-full rounded-lg bg-ink-900/80 border border-ink-600 text-white px-4 py-2.5 text-sm focus:border-violet-500 focus:ring-2 focus:ring-violet-500/30 transition @error('year_level') border-rose-500 @enderror">
                            <option value="" class="bg-ink-900">Select year level</option>
                            @foreach (['1st Year', '2nd Year', '3rd Year', '4th Year'] as $year)
                                <option value="{{ $year }}" class="bg-ink-900" @selected(old('year_level') == $year)>{{ $year }}</option>
                            @endforeach
                        </select>
                        @error('year_level') <p class="text-rose-400 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Profile Picture -->
            <div class="p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 rounded-lg bg-gold-500/15 border border-gold-500/40 flex items-center justify-center text-gold-400 text-sm">◆</div>
                    <h2 class="font-display text-base font-semibold text-white">Profile Picture</h2>
                </div>

                <label for="profile_picture"
                    class="flex flex-col items-center justify-center gap-2 border-2 border-dashed border-ink-600 hover:border-violet-500/60 rounded-xl px-6 py-10 text-center cursor-pointer transition bg-ink-900/40 @error('profile_picture') border-rose-500 @enderror">
                    <span class="text-2xl">📷</span>
                    <span class="text-sm text-slate-300">Click to upload a photo, or drag it here</span>
                    <span class="text-xs text-slate-500 font-mono-tag">JPG or PNG · Max 2MB</span>
                    <input id="profile_picture" type="file" name="profile_picture" accept="image/png, image/jpeg, image/jpg" class="hidden">
                </label>
                @error('profile_picture') <p class="text-rose-400 text-xs mt-2">{{ $message }}</p> @enderror
            </div>

            <!-- Submit -->
            <div class="p-8 flex items-center justify-between bg-ink-900/40">
                <p class="text-xs text-slate-500 font-mono-tag">All fields marked <span class="text-gold-400">*</span> are required</p>
                <button type="submit"
                    class="inline-flex items-center gap-2 bg-violet-600 hover:bg-violet-500 text-white font-display font-semibold px-8 py-3 rounded-xl shadow-glow transition">
                    Submit Registration
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Show the selected filename beneath the upload zone
    document.getElementById('profile_picture')?.addEventListener('change', function (e) {
        const label = e.target.closest('label').querySelector('span:nth-child(2)');
        if (e.target.files.length > 0) {
            label.textContent = e.target.files[0].name;
        }
    });
</script>
@endsection