<?php

namespace App\Http\Controllers;

use App\Models\BookType;
use Illuminate\Http\Request;

class BookTypeController extends Controller
{
    /**
     * 1. GET /api/book-types - Display a listing of book types.
     */
    public function index()
    {
        $bookTypes = BookType::all();
        return response()->json([
            'success' => true,
            'data'    => $bookTypes,
        ], 200);
    }

    /**
     * 2. POST /api/book-types - Store a newly created book type.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'BookTypeName' => 'required|string|max:255',
        ]);

        $bookType = BookType::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'BookType created successfully.',
            'data'    => $bookType,
        ], 201);
    }

    /**
     * 3. GET /api/book-types/{id} - Display the specified book type.
     */
    public function show($id)
    {
        $bookType = BookType::with('books')->find($id);

        if (!$bookType) {
            return response()->json([
                'success' => false,
                'message' => 'BookType not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $bookType,
        ], 200);
    }

    /**
     * 4. PUT/PATCH /api/book-types/{id} - Update the specified book type.
     */
    public function update(Request $request, $id)
    {
        $bookType = BookType::find($id);

        if (!$bookType) {
            return response()->json([
                'success' => false,
                'message' => 'BookType not found.',
            ], 404);
        }

        $validated = $request->validate([
            'BookTypeName' => 'sometimes|required|string|max:255',
        ]);

        $bookType->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'BookType updated successfully.',
            'data'    => $bookType,
        ], 200);
    }

    /**
     * 5. DELETE /api/book-types/{id} - Remove the specified book type.
     */
    public function destroy($id)
    {
        $bookType = BookType::find($id);

        if (!$bookType) {
            return response()->json([
                'success' => false,
                'message' => 'BookType not found.',
            ], 404);
        }

        $bookType->delete();

        return response()->json([
            'success' => true,
            'message' => 'BookType deleted successfully.',
        ], 200);
    }
}

