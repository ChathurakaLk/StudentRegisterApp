@extends('layouts.app')
@section('title', 'Payments')
@section('main')

    <div class="container">
        <div class="pb-3">
            <h2 class="text-center pb-5"> Student Payments</h2>
        </div>
        <div class="d-flex col-10 mx-auto">
            <div class="col-6">
                <h4>Student details</h4>
                <p> Name = : {{ $student->name }}</p>
                <p> Email = : {{ $student->email }}</p>
            </div>

            <div class="col-6">
                <form action="{{ route('student.paymentsSave', $student->id) }}" method="POST">
                    @csrf
                    <h4 class="text text-primary text-center">Make Payment</h4>
                    <input type="text" class="form-control" name="amount">
                    <button class="btn btn-primary my-2" type="submit">Save</button>
                </form>
            </div>
        </div>
        <div class=" col-8 mx-auto">
            <h4 class="text text-warning text-center pt-3">Payment History</h4>
            <table class="table m-3">
                <thead>
                    <tr>
                        <th scope="col">Payment Id</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Payment time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @forelse ($student->payments as $payment)
                            {{-- {{ dd($payment) }} --}}
                            <td>{{ $payment->id }}</td>
                            <td>{{ number_format($payment->amount, 2) }}</td>
                            <td>{{ $payment->created_at->format('Y-M-y | G-i-A') }}</td>
                            {{-- <td>{{ $payment->student->name }}</td> --}}

                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="3" class="py-3">No Payment Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
