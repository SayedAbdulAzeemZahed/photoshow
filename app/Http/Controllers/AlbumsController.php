<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
    public function index(){
      // Get albums to show 
      $albums = Album::all();
      return view('albums.index')->with('albums', $albums);
    }

    public function create(){
      return view('albums.create');
    }

    public function store(Request $request){
      $this->validate($request, [
        'name' => 'required',
        'cover_image' => 'image|max:1999'
      ]);

      // Get filename with extension
      $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

      // Get just the filename
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

      // Get extension
      $extension = $request->file('cover_image')->getClientOriginalExtension();

      // Create new filename
      $filenameToStore = $filename.'_'.time().'.'.$extension;

      // Uplaod image
      $path= $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

        // create album
        $album = new Album;
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $filenameToStore;
  
        $album->save();
          // redirect to create albums
        return redirect('/albums')->with('success', 'Album Created');
    }
}
