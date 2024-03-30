<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Documents::all();
        return view('documents.index',compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'type' => 'required|string|max:255',
            'fichier' => 'required|file|max:2048', // 2MB maximum file size
            'employee_id' => 'required|exists:employees,id'
        ]);

        // Get the uploaded file
        $file = $request->file('file');

        // Define the new file name
        $newFileName = time() . '_' . $file->extension(); // You can define your own logic here

        // Store the file with the new name in the storage directory
        $filePath = $file->storeAs('documents', $newFileName);

        // Create the document
        $document = new Documents([
            'type' => $validatedData['type'],
            'fichier' => $filePath,
            'employee_id' => $validatedData['employee_id']
        ]);
        $document->save();

        // Redirect back with success message
        return redirect()->route('documents.index')->with('success', 'Document uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Documents $document)
    {
        return view('documents.edit', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Documents $document)
    {
        return view('documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Documents $document)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'type' => 'required|string|max:255',
            'fichier' => 'required|file|max:2048', // 2MB maximum file size
            'employee_id' => 'required|exists:employees,id'
        ]);

        // Update the document's title if provided
        $document->type = $validatedData['type'];

        // Check if a new file has been uploaded
        if ($request->hasFile('file')) {
            // Get the uploaded file
            $file = $request->file('file');

            // Define the new file name
            $newFileName = time() . '_' . $file->extension(); // You can define your own logic here

            // Store the file with the new name in the storage directory
            $filePath = $file->storeAs('documents', $newFileName);

            // Delete the old file
            Storage::delete($document->fichier);

            // Update the document's file path
            $document->fichier = $filePath;
        }

        // Update the document's employee ID
        $document->employee_id = $validatedData['employee_id'];

        // Save the changes to the database
        $document->save();

        // Redirect back with success message
        return redirect()->route('documents.index')->with('success', 'Document updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Documents $document)
    {
        // Delete the document
        $document->delete();

        // Redirect back with success message
        return redirect()->route('documents.index')
            ->with('success', 'Document deleted successfully.');
    }
}
