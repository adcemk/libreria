<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    private $rules;

    public function __construct()
    {
        $this->rules = [
            'nombre' => 'required|min:3|max:255',
            'descripcion' => 'required|min:5|max:255',
            'genero' => 'required|min:4|max:255',
            'publisher_id' => 'required|exists:publishers,id',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$books = Book::all();
        $books = Book::with('publisher:id,nombre')->get();
        return view('book.bookIndex', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       Gate::authorize('admin-book');

        $publishers = Publisher::get();
        return view('book.bookForm', compact('publishers'));
        //return view('book.bookForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('admin-book');

        $request->validate($this->rules);
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
        Gate::authorize('admin-book');

        $publishers = Publisher::get();
        return view('book.bookForm', compact('book','publishers'));
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
        Gate::authorize('admin-book');

        $request->validate($this->rules);
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
        Gate::authorize('admin-book');

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
        Gate::authorize('admin-book');

        $book->users()->sync($request->user_id);
        return redirect()->route('book.show', $book);
    }
}
