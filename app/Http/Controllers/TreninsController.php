<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Trenins;
use App\Models\Treners;
use Illuminate\Http\Request;

class TreninsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trenini = Trenins::with('treners')->get();
        return view('trenins.index', compact('trenini'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('trenins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required'

        ]);

        Trenins::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'address' => $request->input('address')

        ]);

        return redirect('/trenins')->with('success', 'Trenins izveidots!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Trenins $trenins)
    {
      
        return view('trenins.show', ['trenins' => $trenins]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    // Retrieve the playlist by its ID
    $trenins = Trenins::findOrFail($id);
    
    // Pass the playlist to the view
    return view('trenins.edit', ['trenins' => $trenins]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'address' => 'required'
    ]);

    // Find the playlist and update its attributes
    $trenins = Trenins::findOrFail($id);
    $trenins->update([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'address' => $request->input('address')
    ]);

    // Redirect back to the playlists index page
    return redirect()->route('trenins.index')->with('success', 'Trenins atjaunots!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $trenins = Trenins::where('id', $id);

        $trenins->delete();

        return redirect('/trenins')->with('success', 'Trenins izdzest!');
    }

    public function toggleFavorite($id)
    {
        $trenins = Trenins::findOrFail($id);
        $user = auth()->user();
    
        // Если тренировка уже в избранном, то удаляем, иначе добавляем
        if ($user->favoriteTrenins->contains($trenins)) {
            $user->favoriteTrenins()->detach($trenins);
        } else {
            $user->favoriteTrenins()->attach($trenins);
        }
    
        return redirect()->back();
    }

    public function myFavorites()
{
    $favorites = auth()->user()->favoriteTrenins;

    return view('trenins.my-favorites', compact('favorites'));
}

public function addComment(Request $request, $id)
{
    $request->validate([
        'comment' => 'required|string|max:255',
    ]);

    // Получаем текущего пользователя
    $user = Auth::user();

    // Находим тренировку
    $trenins = Trenins::findOrFail($id);

    // Создаем новый комментарий
    $comment = new Comment();
    $comment->user_id = $user->id;
    $comment->trenins_id = $trenins->id;
    $comment->comment = $request->input('comment');
    $comment->save();

    return redirect()->back()->with('success', 'Komentars pievienots!');
}

}
