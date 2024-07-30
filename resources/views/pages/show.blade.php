@extends('layouts.app')
@section('title', 'Show Students Details')
@section('main')

    <div class="container">
        <h2 class="text-center mt-2">Students Management</h2>
        <div>
            <a class="btn btn-warning " href="{{ route('student.index') }}">Back</a>
        </div>
        <div class="col-6 m-5">
        </div>
        <table class="table m-5">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone No</th>
                    <th scope="col">Joining Date</th>
                    <th scope="col">Last Update</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->created_at->format('Y-M-y') }}</td>
                    <td>{{ $student->updated_at->diffForHumans() }}</td>
                    <td>
                        <div class="d-flex">
                            <div class="px-1 mt-1">
                                <a class="btn btn-success" href="">Edit</a>
                            </div>
                            <div class="p-1">
                                <form action="">
                                    <a class="btn btn-danger" href="">Delete</a>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
