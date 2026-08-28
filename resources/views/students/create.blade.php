@extends('layouts.app')

@section('title', 'Register Student')

@section('content')
<div class="max-w-4xl mx-auto">

    <div class="text-center mb-8">
        <h1 class="font-heading text-3xl font-bold text-brand-800">Student Registration</h1>
        <p class="text-slate-500 mt-2">Fill out the form below to register a new student.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-card border border-brand-100 p-8">
        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <!-- Personal Information -->
            <div>
                <h2 class="font-heading text-lg font-semibold text-brand-700 border-b border-brand-100 pb-2 mb-5">
                    Personal Information
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Student ID <span class="text-rose-500">*</span></label>
                        <input type="text" name="student_id" value="{{ old('student_id') }}"
                            class="w-full rounded-lg border-slate-300 focus:border-brand-500 focus:ring-brand-500 shadow-sm @error('student_id') border-rose-400 @enderror">
                        @error('student_id') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Gender <span class="text-rose-500">*</span></label>
                        <select name="gender" class="w-full rounded-lg border-slate-300 focus:border-brand-500 focus:ring-brand-500 shadow-sm @error('gender') border-rose-400 @enderror">
                            <option value="">Select gender</option>
                            <option value="Male" @selected(old('gender') == 'Male')>Male</option>
                            <option value="Female" @selected(old('gender') == 'Female')>Female</option>
                            <option value="Other" @selected(old('gender') == 'Other')>Other</option>
                        </select>
                        @error('gender') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">First Name <span class="text-rose-500">*</span></label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                            class="w-full rounded-lg border-slate-300 focus:border-brand-500 focus:ring-brand-500 shadow-sm @error('first_name') border-rose-400 @enderror">
                        @error('first_name') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Middle Name</label>
                        <input type="text" name="middle_name" value="{{ old('middle_name') }}"
                            class="w-full rounded-lg border-slate-300 focus:border-brand-500 focus:ring-brand-500 shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Last Name <span class="text-rose-500">*</span></label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}"
                            class="w-full rounded-lg border-slate-300 focus:border-brand-500 focus:ring-brand-500 shadow-sm @error('last_name') border-rose-400 @enderror">
                        @error('last_name') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Date of Birth <span class="text-rose-500">*</span></label>
                        <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"
                            class="w-full rounded-lg border-slate-300 focus:border-brand-500 focus:ring-brand-500 shadow-sm @error('date_of_birth') border-rose-400 @enderror">
                        @error('date_of_birth') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div>
                <h2 class="font-heading text-lg font-semibold text-brand-700 border-b border-brand-100 pb-2 mb-5">
                    Contact Information
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Email Address <span class="text-rose-500">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full rounded-lg border-slate-300 focus:border-brand-500 focus:ring-brand-500 shadow-sm @error('email') border-rose-400 @enderror">
                        @error('email') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Mobile Number <span class="text-rose-500">*</span></label>
                        <input type="text" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="09xxxxxxxxx"
                            class="w-full rounded-lg border-slate-300 focus:border-brand-500 focus:ring-brand-500 shadow-sm @error('mobile_number') border-rose-400 @enderror">
                        @error('mobile_number') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-700 mb-1">Address <span class="text-rose-500">*</span></label>
                        <textarea name="address" rows="3"
                            class="w-full rounded-lg border-slate-300 focus:border-brand-500 focus:ring-brand-500 shadow-sm @error('address') border-rose-400 @enderror">{{ old('address') }}</textarea>
                        @error('address') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Academic Information -->
            <div>
                <h2 class="font-heading text-lg font-semibold text-brand-700 border-b border-brand-100 pb-2 mb-5">
                    Academic Information
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Program <span class="text-rose-500">*</span></label>
                        <input type="text" name="program" value="{{ old('program') }}" placeholder="e.g. BS Information Technology"
                            class="w-full rounded-lg border-slate-300 focus:border-brand-500 focus:ring-brand-500 shadow-sm @error('program') border-rose-400 @enderror">
                        @error('program') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Year Level <span class="text-rose-500">*</span></label>
                        <select name="year_level" class="w-full rounded-lg border-slate-300 focus:border-brand-500 focus:ring-brand-500 shadow-sm @error('year_level') border-rose-400 @enderror">
                            <option value="">Select year level</option>
                            @foreach (['1st Year', '2nd Year', '3rd Year', '4th Year'] as $year)
                                <option value="{{ $year }}" @selected(old('year_level') == $year)>{{ $year }}</option>
                            @endforeach
                        </select>
                        @error('year_level') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Profile Picture -->
            <div>
                <h2 class="font-heading text-lg font-semibold text-brand-700 border-b border-brand-100 pb-2 mb-5">
                    Profile Picture
                </h2>
                <label class="block text-sm font-medium text-slate-700 mb-1">Upload Photo <span class="text-rose-500">*</span></label>
                <input type="file" name="profile_picture" accept="image/png, image/jpeg, image/jpg"
                    class="w-full text-sm text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-brand-600 file:text-white file:font-medium hover:file:bg-brand-700 file:cursor-pointer border border-slate-300 rounded-lg shadow-sm @error('profile_picture') border-rose-400 @enderror">
                <p class="text-xs text-slate-400 mt-1">JPG or PNG only, max 2MB.</p>
                @error('profile_picture') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Submit -->
            <div class="pt-4 flex justify-end">
                <button type="submit"
                    class="inline-flex items-center gap-2 bg-brand-600 hover:bg-brand-700 text-white font-semibold px-8 py-3 rounded-xl shadow-card transition">
                    Register Student
                </button>
            </div>
        </form>
    </div>
</div>
@endsection