<?php

namespace App\Http\Controllers;

use App\Mail\paymentSuccsess;
use App\Models\payment;
use App\Models\Students;
use function Laravel\Prompts\search;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(isset($request->status)){
            $students = Students::where(function($query) use($request){
            return $query->where('name', 'like', '%' . $request->search . '%')
            ->orWhere('email', 'like', '%' . $request->search . '%')
            ->orWhere('phone', '=', $request->search);
         })->where('status', '=', $request->status)
            ->paginate(5);
        }else{
            $students = Students::where('name', 'like', '%' . $request->search . '%')
            ->orWhere('email', 'like', '%' . $request->search . '%')
            ->orWhere('phone', '=', $request->search)
            ->paginate(5);
        }

        //dd($request->all());
        return view('pages.main', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:students,email',
            'phone'=>'required|unique:students,phone',
        ],[
            'name.required' =>'Please Enter Your Name',
        ]);

        Students::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return redirect()->route('student.index')->with('success_message', 'Student Added Success!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student=Students::find($id);
        return view('pages.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student=Students::find($id);
        return view('pages.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:students,email,' . $id,
            'phone' => 'required|unique:students,phone,' . $id,
            'status' => 'required',
        ],[
            'name.required' =>'Please Enter Your Name',
        ]);
        $student=Students::find($id);
        $student->update($request->all());
        return redirect()->route('student.index')->with('success_message', 'Student updated!');
    }

    /**
     * confirm delete
     */
    public function ConfirmDelete($id){
        $student = Students::find($id);
        $student->payments()->delete();
        $student->delete();
        return redirect()->route('student.index')->with('success_message', 'Student deleted!');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Students::find($id);
        return view('pages.confirm.DeleteConfirm', compact('student'));

    }

    //payments
    public function paymentsShow($id){
        $student = Students::find($id);
        $payment = payment::find($id);
        //dd($student->payments());
        return view('pages.payment-form', compact(['student', 'payment']));
    }
    public function paymentsSave(Request $request, $id){
        //dd($request->id);

        $payment = payment::create([
            'student_id' => $id,
            'amount' => $request->amount,
        ]);

        Mail::to($payment->student->email)->send(new paymentSuccsess($payment->student->name, $payment->amount));
        return redirect()->route('student.index')->with('success_message', 'Payment Added Successfully!');
        // $payments = new payment();
        // $payments->Student_id = $id;
        // $payments->amount = $request->amount;
        // $payments->save();

    }
}
