@extends('layouts.app')
@section('title', 'ADD Students')
@section('main')

<div class="container">
    <form action="{{ route('student.store') }}" method="POST">
        @csrf
        <h2 class="text-center mt-2">Students Add</h2>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name')
                        is-invalid
                    @enderror" name="name">
                @error('name')
                <div class="text text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <div class="text text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <div class="mb-3 row">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="form-control @error('phone')
                        is-invalid
                    @enderror" name="phone">
                @error('phone')
                <div class="text text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Submit">
    </form>
</div>
