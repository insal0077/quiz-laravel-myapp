<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * 1. GET /api/books - Display a listing of books.
     */
    public function index()
    {
        $books = Book::with(['bookType', 'authors'])->get();
        return response()->json([
            'success' => true,
            'data'    => $books,
        ], 200);
    }

    /**
     * 2. POST /api/books - Store a newly created book.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'BookTitle'   => 'required|string|max:255',
            'BookTypeID'  => 'required|exists:tblBookType,BookTypeID',
            'PublishDate' => 'nullable|date',
            'NumOfPages'  => 'nullable|integer|min:1',
            'NumOfCopies' => 'nullable|integer|min:0',
            'Edition'     => 'nullable|string|max:255',
            'Publisher'   => 'nullable|string|max:255',
            'BookSource'  => 'nullable|string|max:255',
            'Remark'      => 'nullable|string',
        ]);

        $book = Book::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Book created successfully.',
            'data'    => $book->load(['bookType', 'authors']),
        ], 201);
    }

    /**
     * 3. GET /api/books/{id} - Display the specified book.
     */
    public function show($id)
    {
        $book = Book::with(['bookType', 'authors'])->find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $book,
        ], 200);
    }

    /**
     * 4. PUT/PATCH /api/books/{id} - Update the specified book.
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found.',
            ], 404);
        }

        $validated = $request->validate([
            'BookTitle'   => 'sometimes|required|string|max:255',
            'BookTypeID'  => 'sometimes|required|exists:tblBookType,BookTypeID',
            'PublishDate' => 'nullable|date',
            'NumOfPages'  => 'nullable|integer|min:1',
            'NumOfCopies' => 'nullable|integer|min:0',
            'Edition'     => 'nullable|string|max:255',
            'Publisher'   => 'nullable|string|max:255',
            'BookSource'  => 'nullable|string|max:255',
            'Remark'      => 'nullable|string',
        ]);

        $book->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Book updated successfully.',
            'data'    => $book->load(['bookType', 'authors']),
        ], 200);
    }

    /**
     * 5. DELETE /api/books/{id} - Remove the specified book.
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found.',
            ], 404);
        }

        $book->delete();

        return response()->json([
            'success' => true,
            'message' => 'Book deleted successfully.',
        ], 200);
    }
}

