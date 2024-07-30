@extends('layouts.app')
@section('title', 'Confirm delete Student')
@section('main')

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title text-center">Are you sur?</h5>
            <div class="d-flex text-center">
                <div class="px-1 m-1">
                    <form action="{{ route('student.deleteConfirm', $student->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
                <div class="p-1 mb-1">
                    <a class="btn btn-warning" href="{{ route('student.index') }}">Cancel</a>
                </div>
            </div>
        </div>
    </div>
