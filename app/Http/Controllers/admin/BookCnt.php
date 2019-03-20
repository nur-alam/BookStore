<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use App\Models\Book;
use App\Models\Book_category;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class BookCnt extends Controller
{

    public function index()
    {
        $books = Book::paginate(20);
        $categories = Book_category::all();
        $authors = Author::all();
        $users = User::all();
        //dd($books);
        $data = [
            'users' => $users,
            'books' => $books,
            'authors' => $authors,
            'categories' => $categories
        ];
        return view('admin.book.index',compact('data'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $allowed = config('app.allowed');
        $maxfilesize = config('app.file_size');
        $rules = [
            'name' => ['required', 'string', 'min:3'],
            'price' => ['required','string'],
            'author_id' => ['required', 'integer'],
            'category_id' => ['required', 'integer'],
            'desc' => ['required', 'string'],
            'image' => "required|mimes:{$allowed}|max:{$maxfilesize}"
        ];

        $this->validate($request,$rules);

        $file = $request->file('image');
        $originalFilename = $file->getClientOriginalName();
        $ext = explode(".", $originalFilename);
        $destination = "img/".rand()."_".$ext[0]."_".time().".".end($ext);
        $uploaded = Storage::put($destination,file_get_contents($file));

        $book_created = Book::create([
            'name' => $request->name,
            'price' => $request->price,
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
            'quantity' => 1,
            'desc' => $request->desc,
            'image' => $destination,
        ]);

        if($book_created){
            session()->flash('success','Book entry done');
            return redirect()->back();
        }

        return back()->withErrors([
            'errors' => 'Book entry not done!'
        ]);

    }


    public function show(Book $book)
    {

        return view('admin.book.book_details',compact('book'));
    }


    public function edit(Book $book)
    {
        $categories = Book_category::all();
        $authors = Author::all();
        $users = User::all();
        //dd($books);
        $data = [
            'users' => $users,
            'book' => $book,
            'authors' => $authors,
            'categories' => $categories
        ];
        return view('admin.book.book_edit',compact('data'));
    }


    public function update(Request $request, Book $book)
    {

        $allowed = config('app.allowed');
        $maxfilesize = config('app.file_size');

        if($request->image == null){

            $request->image = $book->image;

            $rules = [
                'name' => ['required', 'string', 'min:3'],
                'price' => ['required','string'],
                'author_id' => ['required', 'integer'],
                'category_id' => ['required', 'integer'],
                'desc' => ['required', 'string']
            ];

            $this->validate($request,$rules);

        }else {

            $rules = [
                'name' => ['required', 'string', 'min:3'],
                'price' => ['required','string'],
                'author_id' => ['required', 'integer'],
                'category_id' => ['required', 'integer'],
                'desc' => ['required', 'string'],
                'image' => "required|mimes:{$allowed}|max:{$maxfilesize}"
            ];

            $this->validate($request, $rules);

            $isImageDeleted = Storage::delete($book->image);

            if ($isImageDeleted) {

                $file = $request->file('image');
                $originalFilename = $file->getClientOriginalName();
                $ext = explode(".", $originalFilename);
                $destination = "img/" . rand() . "_" . $ext[0] . "_" . time() . "." . end($ext);
                Storage::put($destination, file_get_contents($file));
                $request->image = $destination;

            } else {

                return back()->withErrors([
                    'errors' => 'Book image not found.'
                ]);

            }
        }

        $book_updated = DB::table('books')
            ->where('id',$book->id)
            ->update([
                'name' => $request->name,
                'price' => $request->price,
                'author_id' => $request->author_id,
                'category_id' => $request->category_id,
                'desc' => $request->desc,
                'image' => $request->image
            ]);

        if($book_updated){
            session()->flash('success', 'Book updated');
            return redirect(route('book.index'));
        }

        return redirect(route('book.index'));

    }


    public function destroy(Book $book)
    {
        Storage::delete($book->image);
        Book::destroy($book->id);
        session()->flash('success','Book deleted');
        return redirect()->back();
    }
}
