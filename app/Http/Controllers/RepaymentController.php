<?php

namespace App\Http\Controllers;

use App\Models\Repayment;
use Illuminate\Http\Request;

class RepaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Repayment::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'repayment_date' => 'required|date',
            'repayment_amount' => 'required|numeric|min:0'
        ]);

        $repayment = Repayment::create($validated);

        return response()->json($repayment, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Repayment $repayment)
    {
        return response()->json($repayment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Repayment $repayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Repayment $repayment)
    {
        $validated = $request->validate([
            'repayment_date' => 'required|date',
            'repayment_amount' => 'required|numeric|min:0'
        ]);

        $repayment->update($validated);

        return response()->json($repayment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Repayment $repayment)
    {
        $repayment->delete();

        return response()->json(['message' => "repayment has been deleted succesfully"]);
    }
}
