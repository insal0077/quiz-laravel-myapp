<?php

namespace App\Http\Controllers;

use App\Models\BookAuthor;
use Illuminate\Http\Request;

class BookAuthorController extends Controller
{
    /**
     * 1. GET /api/book-authors - Display a listing of book-author records.
     */
    public function index()
    {
        $bookAuthors = BookAuthor::with(['book', 'author'])->get();
        return response()->json([
            'success' => true,
            'data'    => $bookAuthors,
        ], 200);
    }

    /**
     * 2. POST /api/book-authors - Store a newly created book-author record.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'BookID'     => 'required|exists:tblBook,BookID',
            'AuthorID'   => 'required|exists:tblAuthor,AuthorID',
            'AuthorDate' => 'nullable|date',
            'Remark'     => 'nullable|string',
        ]);

        $exists = BookAuthor::where('BookID', $validated['BookID'])
            ->where('AuthorID', $validated['AuthorID'])
            ->exists();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'This Book and Author combination already exists.',
            ], 409);
        }

        $bookAuthor = BookAuthor::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'BookAuthor created successfully.',
            'data'    => $bookAuthor->load(['book', 'author']),
        ], 201);
    }

    /**
     * 3. GET /api/book-authors/{bookId}/{authorId?} - Display the specified book-author record.
     */
    public function show($bookId, $authorId = null)
    {
        $query = BookAuthor::with(['book', 'author'])->where('BookID', $bookId);
        if ($authorId !== null) {
            $query->where('AuthorID', $authorId);
        }

        $bookAuthor = $authorId !== null ? $query->first() : $query->get();

        if (!$bookAuthor || ($authorId === null && $bookAuthor->isEmpty())) {
            return response()->json([
                'success' => false,
                'message' => 'BookAuthor record not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $bookAuthor,
        ], 200);
    }

    /**
     * 4. PUT/PATCH /api/book-authors/{bookId}/{authorId?} - Update the specified book-author record.
     */
    public function update(Request $request, $bookId, $authorId = null)
    {
        $authorId = $authorId ?? $request->input('AuthorID');

        $bookAuthor = BookAuthor::where('BookID', $bookId)
            ->where('AuthorID', $authorId)
            ->first();

        if (!$bookAuthor) {
            return response()->json([
                'success' => false,
                'message' => 'BookAuthor record not found.',
            ], 404);
        }

        $validated = $request->validate([
            'AuthorDate' => 'nullable|date',
            'Remark'     => 'nullable|string',
        ]);

        $bookAuthor->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'BookAuthor updated successfully.',
            'data'    => $bookAuthor->load(['book', 'author']),
        ], 200);
    }

    /**
     * 5. DELETE /api/book-authors/{bookId}/{authorId?} - Remove the specified book-author record.
     */
    public function destroy(Request $request, $bookId, $authorId = null)
    {
        $authorId = $authorId ?? $request->input('AuthorID');

        $query = BookAuthor::where('BookID', $bookId);
        if ($authorId !== null) {
            $query->where('AuthorID', $authorId);
        }

        $bookAuthor = $query->first();

        if (!$bookAuthor) {
            return response()->json([
                'success' => false,
                'message' => 'BookAuthor record not found.',
            ], 404);
        }

        $bookAuthor->delete();

        return response()->json([
            'success' => true,
            'message' => 'BookAuthor deleted successfully.',
        ], 200);
    }
}

