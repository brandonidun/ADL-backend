<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Borrower::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'string|email|unique:borrowers',
                'address' => 'nullable|string',
                'phone_number' => 'required|string|max:15',
                'Ghana_card' => 'nullable|string|max:20',
            ]
        );

        $borrower = Borrower::create($validated);

        return response()->json($borrower, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrower $borrower)
    {
        return response()->json($borrower);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrower $borrower)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrower $borrower)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'string|email|unique:borrowers',
            'address' => 'nullable|string',
            'phone_number' => 'required|string|max:15',
            'Ghana_card' => 'nullable|string|max:20',
        ]);

        $borrower->update($validated);

        return response()->json($borrower);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrower $borrower)
    {
        $borrower->delete();

        return response()->json(['message' => 'borrower has been deleted']);
    }
}
