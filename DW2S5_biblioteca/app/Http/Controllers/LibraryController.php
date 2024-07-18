<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;


class LibraryController extends Controller
{
    public function index()
    {
        return view('welcome');

    }
    public function registerBook()
    {
        return view('library.registerBook');
    }
    public function store(Request $request)
    {
        $book = new Book;
        
        $book->title = $request->title;
        $book->author = $request->author;
        $book->date = $request->date;
        $book->genre = $request->genre;
        


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;
            $requestImage->move(public_path('img/books'), $imageName);
            $book->image = $imageName;
            


        } else {
            $book->image = 'book_placeholder.jpg';
        }
        
        
        $book->save();
        return redirect("/")->with('msg', 'Livro cadastrado com sucesso!');
    }
}
