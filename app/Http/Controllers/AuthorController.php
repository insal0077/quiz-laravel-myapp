<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * 1. GET /api/authors - Display a listing of authors.
     */
    public function index()
    {
        $authors = Author::all();
        return response()->json([
            'success' => true,
            'data' => $authors,
        ], 200);
    }

    /**
     * 2. POST /api/authors - Store a newly created author.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'AuthorName' => 'required|string|max:255',
            'Gender'     => 'nullable|string|max:20',
            'DOB'        => 'nullable|date',
            'POB'        => 'nullable|string|max:255',
            'Address'    => 'nullable|string',
            'Phone'      => 'nullable|string|max:50',
            'Email'      => 'nullable|email|max:255',
            'Photo'      => 'nullable|string|max:255',
        ]);

        $author = Author::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Author created successfully.',
            'data'    => $author,
        ], 201);
    }

    /**
     * 3. GET /api/authors/{id} - Display the specified author.
     */
    public function show($id)
    {
        $author = Author::with('books')->find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $author,
        ], 200);
    }

    /**
     * 4. PUT/PATCH /api/authors/{id} - Update the specified author.
     */
    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found.',
            ], 404);
        }

        $validated = $request->validate([
            'AuthorName' => 'sometimes|required|string|max:255',
            'Gender'     => 'nullable|string|max:20',
            'DOB'        => 'nullable|date',
            'POB'        => 'nullable|string|max:255',
            'Address'    => 'nullable|string',
            'Phone'      => 'nullable|string|max:50',
            'Email'      => 'nullable|email|max:255',
            'Photo'      => 'nullable|string|max:255',
        ]);

        $author->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Author updated successfully.',
            'data'    => $author,
        ], 200);
    }

    /**
     * 5. DELETE /api/authors/{id} - Remove the specified author.
     */
    public function destroy($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found.',
            ], 404);
        }

        $author->delete();

        return response()->json([
            'success' => true,
            'message' => 'Author deleted successfully.',
        ], 200);
    }
}

