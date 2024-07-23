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
        $books = null;
        $search = request('search');
        if ($search) {
            $books = Book::where([
                [
                    'title',
                    'like',
                    '%' . $search . "%"
                ]
            ])->get();
        } else{
            $books = Book::all();
        }
        return view('welcome', ['books' => $books, 'search' => $search]);

    }
    public function search(Request $request)
{
    $search = $request->input('search');
    $books = $search ? Book::where('title', 'like', "%$search%")->get() : Book::all();
    
    return view('library.search', ['books' => $books, 'search' => $search]);
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
    public function show($id)
    {
        $book = Book::findOrFail($id);


        return view('library.show', ['book' => $book]);
    }
    public function destroy($id){
        Book::findOrFail($id)->delete();
        return redirect('/')->with('msg', 'Livro excluído com sucesso!');
    }

    public function edit ($id){
        
        $book = Book::findOrFail($id);
        
        return view('library.edit', ['book' => $book]);
    }
    public function update (Request $request){
        $data = $request->all();
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;
            $requestImage->move(public_path('img/books'), $imageName);
            $data['image'] = $imageName;
            


        } else {
            $data['image'] = 'book_placeholder.jpg';
        }
        Book::findOrFail($request->id)->update($data);
        return redirect ('/')->with('msg', 'Livro editado com sucesso!');
    }
}
