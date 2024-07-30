@extends('layouts.app')
@section('title', 'Students Edit')
@section('main')

    <div class="container">
        <form action="{{ route('student.update', $student->id) }}" method="POST">
            @method('PUT')
            @csrf
            <h2 class="text-center mt-2">Students Edit</h2>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    {{-- <input type="text" name="name" id="name"
                        value=" @if (old('name')) {{old()}} @else {{ $student->name }} @endif "
                        class="form-control @error('name')
                        is-invalid
                    @enderror"
                        name="name"> --}}

                    <input type="text" name="name" id="name"
                        value="{{ old('name') ? old('name') : $student->name }}"
                        class="form-control @error('name')
                        is-invalid
                    @enderror"
                        name="name">

                    @error('name')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" id="email"
                        value="{{ old('email') ? old('email') : $student->email }}"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="mb-3 row">
                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="text" name="phone" id="phone"
                        value="{{ old('phone') ? old('phone') : $student->phone }}"
                        class="form-control @error('phone')
                        is-invalid
                    @enderror"
                        name="phone">
                    @error('phone')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">

                    {{-- <select class="form-select" name="status">
                        <option {{ (old('status') == 1 || $student->status == 1) ? 'selected' : '' }} value="1">Active
                        </option>
                        <option {{ (old('status') == 0 || $student->status == 0) ? 'selected' : '' }} value="0">
                            Inactive</option>
                    </select> --}}

                    <select class="form-select" name="status">
                        <option {{ (old('status', $student->status) == 1) ? 'selectted' : ''}} value="1">Active</option>
                        <option {{ (old('status', $student->status) == 0) ? 'selected' : '' }} value="0">Inactive</option>
                    </select>

                    @error('status')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                    {{-- {{ dd($student->all()) }} --}}
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>
