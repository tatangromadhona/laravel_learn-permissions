<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /* show all */
    public function index()
    {
        $books = Book::all();

        return response()->json([
            'status' => 'success',
            'data' => $books
        ]);
    }

    /* show detail */
    public function show($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json([
                'status' => 'error',
                'message' => 'book not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $book
        ]);
    }

    /* create */
    public function create(Request $request)
    {
        $rules = [
            'title' => 'required|string',
            'author' => 'required|string',
            'image' => 'required|url',
            'description' => 'required|string',
            'language' => 'required|string',
            'publisher' => 'required|string',
            'published' => 'required|date',
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        $book = Book::create($data);

        return response()->json([
            'status' => 'success',
            'data' => $book
        ]);
    }

    /* update */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'string',
            'author' => 'string',
            'image' => 'url',
            'description' => 'string',
            'language' => 'string',
            'publisher' => 'string',
            'published' => 'date',
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        $book = Book::find($id);
        if (!$book) {
            return response()->json([
                'status' => 'error',
                'message' => 'book not found'
            ], 404);
        }

        $book->fill($data);
        $book->save();

        return response()->json([
            'status' => 'success',
            'data' => $book
        ]);
    }

    /* delete */
    public function destroy($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json([
                'status' => 'error',
                'message' => 'book not found'
            ], 404);
        }

        $book->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'book deleted'
        ]);
    }
}
