<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Trenins;
use App\Models\Treners;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TreninsController extends Controller
{

    use AuthorizesRequests;

    public function index()
    {
        $trenini = Trenins::with('treners')->get();
        $treneri = Treners::all();
        return view('trenins.index', compact('trenini', 'treneri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Trenins::class);
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

  
 
      
        public function show($id)
{
    // Apmācību sesijas meklēšana pēc ID
    $trenins = Trenins::with('treners')->findOrFail($id); // Treniņa augšupielāde kopā ar treneriem

    
    return view('trenins.show', compact('trenins'));
}
    

    
    public function edit($id)
    {
    
    $trenins = Trenins::findOrFail($id);
    $this->authorize('update', $trenins);

   
    return view('trenins.edit', ['trenins' => $trenins]);
    }

    
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

    
    public function destroy($id) {
        $trenins = Trenins::findOrFail($id); 

        $this->authorize('delete', $trenins);

        $trenins->delete();

        
        return redirect('/trenins')->with('success', 'Trenins izdzest!');
    }

    public function toggleFavorite($id)
    {
        $trenins = Trenins::findOrFail($id);
        $user = auth()->user();
    
        // Ja treniņš jau ir jūsu izlasē, dzēsiet to, pretējā gadījumā to pievienojiet.
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
    $comment->user_id = auth()->user()->id;
    $comment->save();

    return redirect()->route('trenins.myFavorites', $trenins->id)->with('success', 'Comment added successfully');
}

public function destroyComment(Trenins $trenins, Comment $comment)
{
    
    $comment->delete();
 
   
    return redirect()->back()->with('success', 'Komentars izdzests.');
}


public function addTreners(Request $request, Trenins $trenins){

    $validated = $request->validate([
        'treners_id' => 'nullable|exists:treners,id',
    ]);
    $trenins->treners_id = $validated['treners_id'];
    $trenins->save();

    return redirect()->back()->with('success', 'Treners veiksmigi izvelets.');

}





}
