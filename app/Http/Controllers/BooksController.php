<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddBookRequest;
use App\Http\Requests\SearchBooksRequest;
use App\Services\BooksService;
use Illuminate\Http\Response;

class BooksController extends Controller
{
    /**
     * @param SearchBooksRequest $request
     * @param BooksService $booksService
     * @return Response
     */
    public function search(SearchBooksRequest $request, BooksService $booksService): Response
    {
        $books = $booksService->searchForBooks($request->route('name'));
        return response($books);
    }

    /**
     * Add or update a book in the library
     * @param AddBookRequest $request
     * @param BooksService $booksService
     * @return Response
     */
    public function add(AddBookRequest $request, BooksService $booksService): Response
    {
        $result = $booksService->addBook($request->validated());
        return response($result);
    }
}
