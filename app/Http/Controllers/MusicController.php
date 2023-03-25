<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use App\Models\Bande;
use App\Models\Music;
use App\Models\Rating;

use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $musicx = Music::latest()->paginate(5);

        return view('musics.index', compact('musicx'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function rechercher(Request $request)
    {
        $search = $request->get('search');

        if (!empty($search)) {
            $musicx = Music::where('title', 'like', '%' . $search . '%')
                ->orWhere('artiste', 'like', "%$search%")
                ->get();
            $categories = Category::all();
            return view('index', compact('categories', 'musicx', 'search'));
        } else {
            $musicx = Music::latest()->paginate(8);
            $categories = Category::all();
            return view('index', compact('musicx', 'categories'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $artistes = Artiste::all();
        $bandes = Bande::all();

        return view('musics.create', compact('categories', 'artistes', 'bandes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'audio' => 'required|mimes:mp3,wav,ogg|max:4096',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'artiste' => 'required',
            'ecrivain' => 'required',
            'langue' => 'required',
            'date_sortie' => 'required',
            'durée' => 'required',
            'archived' => 'true'

        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/music';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        if ($audio = $request->file('audio')) {
            $destinationPath = 'images/audio';
            $profileAudio = date('YmdHis') . "." . $audio->getClientOriginalExtension();
            $audio->move($destinationPath, $profileAudio);
            $input['audio'] = "$profileAudio";
        }

        Music::create($input);

        return redirect()->route('musics.index')->with('success', 'Music created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Music $music)
    {
        // return view('morceau', compact('music'));
        $artistes = Artiste::where('id', $music->id)->get();
        $comments = Comment::where('id', $music->id)->get();
        return view('morceau', compact('music', 'comments', 'artistes'));
    }


    public function archive(Music $music)
    {
    
        if($music->archived != 1){
        $music->update(['archived' => true]);
        }else{
            $music->update(['archived' => false]);
        }

        return redirect()->route('musics.index')->with('success', 'Music archived successfully.');
    }

    public function showComments(Music $music)
    {
        $comments = $music->comments()->where('music_id', $music->id)->where('status', 'approved')->latest()->get();
        // $comments = Comment::where('status', 'approved')->get();
        return view('morceau', compact('music', 'comments'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $categories = Category::all();
        $music = Music::find($id);
        $bandes = Bande::all();
        $artistes = Artiste::all();

        $selectedArtist = $music->artiste_id ?: $music->bande_id;

        return view('musics.edit', compact('music', 'categories', 'bandes', 'artistes'))->with('selectedArtist', $selectedArtist);
    }

    /**
     * Update the specified resource in storage. sometimes
     */
    public function update(Request $request, Music $music)
    {



        $request->validate([
            'title' => 'sometimes',
            'audio' => 'sometimes|mimes:mp3,wav,ogg|max:4096',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'artiste' => 'sometimes',
            'ecrivain' => 'sometimes',
            'category_id' => 'sometimes',
            'langue' => 'sometimes',
            'date_sortie' => 'sometimes',
            'durée' => 'sometimes',
        ]);


        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/music';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        if ($audio = $request->file('audio')) {
            $destinationPath = 'images/audio';
            $profileAudio = date('YmdHis') . "." . $audio->getClientOriginalExtension();
            $audio->move($destinationPath, $profileAudio);
            $input['audio'] = "$profileAudio";
        }

        $music->fill($input);
        $music->save();


        return redirect()->route('musics.index')->with('success', 'Music updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Music $music)
    {
        $music->delete();

        return redirect()->route('musics.index');
    }
}
