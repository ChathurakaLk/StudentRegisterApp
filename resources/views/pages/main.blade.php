@extends('layouts.app')
@section('title', 'Students')
@section('main')

    <div class="container">
        <h2 class="text-center mt-2">Students Management</h2>
        <div class="col-6 m-5">
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif
        </div>
        <table class="table m-5">
            <div class="d-flex">
                <div>
                    <a class="btn btn-primary mx-auto" href="{{ route('student.create') }}">Add Student</a>
                </div>
                <form action="{{ route('student.index') }}" method="GET">
                    @csrf
                    {{-- {{ dd(request()) }} --}}
                    <div class="d-flex ms-auto gap-2">
                        <input class="form-control" type="text" name="search" value="{{ request()->search }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="{{ route('student.index') }}" class="btn btn-secondary">Clear</a>
                    </div>
                </form>
            </div>
            <div class="mt-2">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Status Filter
                    </button>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"
                                href="{{ request()->fullUrlWithQuery(['status' => '1', 'page' => null]) }}">Active</a>
                        </li>
                        <li><a class="dropdown-item"
                                href="{{ request()->fullUrlWithQuery(['status' => '0', 'page' => null]) }}">Inactive
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Payments</th>
                    <th scope="col">Last Update</th>
                    <th scope="col">Phone No</th>
                </tr>
            </thead>
            <tbody>
                {{-- @if ($students->count() > 0) --}}
                {{-- {{ dd($payment->student) }} --}}
                @forelse ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->GetStatus() }}</td>
                        <td>
                            @if ($student->payments->count())
                                {{ $student->GetTotalPayments() }}
                                ({{ $student->payments->count() }})
                            @else
                                --
                            @endif
                        <td>{{ $student->updated_at->diffForHumans() }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>
                            <div class="d-flex">
                                <div class="px-1 mt-1">
                                    <a class="btn btn-warning"
                                        href="{{ route('student.paymentsShow', $student->id) }}">Payments</a>
                                </div>
                                <div class="px-1 mt-1">
                                    <a class="btn btn-success" href="{{ route('student.edit', $student->id) }}">Edit</a>
                                </div>
                                <div class="px-1 mt-1">
                                    <a class="btn btn-info" href="{{ route('student.show', $student->id) }}">Show</a>
                                </div>
                                <div class="p-1">
                                    <a class="btn btn-danger" href="{{ route('student.delete', $student->id) }}">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty

                    <tr class="text-center">
                        <td colspan="6" class="py-3">No Students Found</td>
                    </tr>
                @endforelse
                {{-- @else
            <h2 class="text-center">Not Found Students</h2>
            @endif --}}

            </tbody>
        </table>
        {{-- {{ $students->appends(request()->query())->links() }} --}}
        {{ $students->withQueryString()->links() }}
    </div>
