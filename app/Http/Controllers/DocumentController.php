<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Borrower;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexBorrowerDocuments($borrowerId)
    {
        $borrower = Borrower::findOrFail($borrowerId);

        return response()->json($borrower->documents()->get());
    }

    public function indexLoanDocuments($loanId)
    {
        $loan = Loan::findOrFail($loanId);

        return response()->json($loan->documents()->get());
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
    public function storeBorrowerDocuments(Request $request, $borrowerId)
    {
        $validated = $request->validate([
            'file_name' => 'Required|string',
            'file_path' => 'Required|string',
            'file_type' => 'Required|string',
        ]);

        // Find the loan
        $borrower = Borrower::findorFail($borrowerId);

        // Return error if loan not found
        // if (!$borrower) {
        //     return response()->json(['error' => 'borrower not found'], 404);
        // }

        // Store the file
        // $filePath = $request->file('file')->store('documents');

        // Create the document
        $document = $borrower->documents()->create($validated);

        return response()->json($document, 201);
    }

    public function storeLoanDocuments(Request $request, $loanId)
    {

        $validated = $request->validate([
            'file_name' => 'Required|string',
            'file_path' => 'Required|string',
            'file_type' => 'Required|string',
        ]);

        $loan = Loan::findOrFail($loanId);

        $document = $loan->documents()->create($validated);

        return response()->json($document, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        return response()->json($document);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateBorrowerDocuments(Request $request, $borrowerId, $documentId)
    {
        $borrower = Borrower::find($borrowerId);

        if (!$borrower) {
            return response()->json(['error' => 'Borrower not found'], 404);
        }

        $document = $borrower->documents()->find($documentId);

        if (!$document) {
            return response()->json(['error' => 'Document not found'], 404);
        }

        $validated = $request->validate([
            'file_name' => 'Required|string',
            'file_path' => 'Required|string',
            'file_type' => 'Required|string',
        ]);

        $document->update($validated);

        return response()->json($document, 200);
    }

    public function updateLoanDocuments(Request $request, $loanId, $documentId)
    {
        $loan = Loan::find($loanId);
        if (!$loan) {
            return response()->json(['error' => 'Loan not found'], 404);
        }

        $document = $loan->documents()->find($documentId);
        if (!$document) {
            return response()->json(['error' => 'Document not found'], 404);
        }

        $validated = $request->validate([
            'file_name' => 'Required|string',
            'file_path' => 'Required|string',
            'file_type' => 'Required|string',
        ]);

        $document->update($validated);

        return response()->json($document, 200);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroyBorrowerDocument($borrowerId, $documentId)
    {
        $borrower = Borrower::find($borrowerId);
        $document = $borrower->documents()->find($documentId);

        $document->delete();

        return response()->json([
            'message' => 'Document deleted successfully.',
        ]);
    }

    public function destroyLoanDocument($borrowerId, $documentId)
    {
        $borrower = Borrower::find($borrowerId);
        $document = $borrower->document()->find($documentId);

        $document->delete();

        return response()->json([
            'message' => 'Document deleted successfully.',
        ]);
    }
}
