<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $books = DB::table('books')
        // ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
        // ->select('books.*', 'publishers.nombre AS publisher_nombre')
        // ->get();
        // dd($books);
        $books = Book::all();
        return view('book.bookIndex', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.bookForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $book = new Book();
        // $book->nombre = $request->nombre;
        // $book->descripcion = $request->descripcion;
        // $book->genero = $request->genero;
        // $book->publisher_id = $request->publisher_id;
        // $book->save();
        $request->validate(['publisher_id' => 'exists:publishers,id',]);
        Book::create($request->all());
        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $users = User::get();
        return view('book.bookShow', compact('book', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('book.bookForm', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        Publisher::where('id',$book->id)->update($request->except('_token','_method'));
        return redirect()->route('book.show', $book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index');
    }

    /**
     * Agrega un autor (user) a un libro
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function addUser(Request $request, Book $book)
    {
        $book->users()->sync($request->user_id);
        return redirect()->route('book.show', $book);
    }
}
