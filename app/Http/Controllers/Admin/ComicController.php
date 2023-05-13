<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comic.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' =>  'required|max:100',
            'description' => 'required',
            'image' => 'url',
            'price' =>'required|numeric|between: 5,20',
            'series'=>'required|max:50',
            'sale_date' => 'required|date',
            'type' => 'required|max:100',   
            'artists'=>'required', 
            'writers' =>'required',
        ]);

        $data = $request->all();

        $newComic = new Comic();

        $newComic->title = $data['title'];
        $newComic->description = $data['description'];
        $newComic->thumb = $data['thumb'];
        $newComic->price = $data['price'];
        $newComic->series = $data['series'];
        $newComic->sale_date = $data['sale_date'];
        $newComic->type = $data['type'];
        $newComic->artists = $data['artists'];
        $newComic->writers = $data['writers'];

        $newComic->save();

        return redirect()->route('comics.show', $newComic->id);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('comic.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);
        return view('comic.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'title' =>  'required|max:100',
            'description' => 'required',
            'image' => 'url',
            'price' =>'required|numeric|between: 5,20',
            'series'=>'required|max:50',
            'sale_date' => 'required|date',
            'type' => 'required|max:100',   
            'artists'=>'required', 
            'writers' =>'required',
        ]);


       $data = $request->all();

       $comic = Comic::findOrFail($id);

       $comic->title = $data['title'];
       $comic->description = $data['description'];
       $comic->thumb = $data['thumb'];
       $comic->price = $data['price'];
       $comic->series = $data['series'];
       $comic->sale_date = $data['sale_date'];
       $comic->type = $data['type'];
       $comic->artists = $data['artists'];
       $comic->writers = $data['writers'];

       $comic->save();

       return redirect()->route('comics.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();
        return redirect()->route('comics.index');
    }
}
