<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Trenins;
use App\Models\Treners;
use App\Models\Comment;
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
 
      
        public function show($id)
{
    // Найти тренировку по ID
    $trenins = Trenins::with('treners')->findOrFail($id); // Загрузка тренировки вместе с тренерами

    
    return view('trenins.show', compact('trenins'));
}
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    
    $trenins = Trenins::findOrFail($id);
    
    
    return view('trenins.edit', ['trenins' => $trenins]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'address' => 'required'
    ]);

    
    $trenins = Trenins::findOrFail($id);
    $trenins->update([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'address' => $request->input('address')
    ]);

    
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

public function storeComment(Request $request, Trenins $trenins)
{
    $request->validate([
        'content' => 'required|string|max:255',
    ]);

    $comment = new Comment();
    $comment->trenins_id = $trenins->id;
    $comment->content = $request->input('content');
    $comment->save();

    return redirect()->route('trenins.myFavorites', $trenins->id)->with('success', 'Comment added successfully');
}

public function destroyComment(Trenins $trenins, Comment $comment)
{
    
    $comment->delete();
 
   
    return redirect()->back()->with('success', 'Komentars izdzests.');
}





}
