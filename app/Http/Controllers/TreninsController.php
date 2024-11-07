<?php

namespace App\Http\Controllers;

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
        $trenini = Trenins::all();
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
        $allTreneri = Treners::all();
        return view('trenins.show', ['trenins' => $trenins, 'allTreneri' => $allTreneri]);
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

    public function addTreners(Request $request, Trenins $trenins) {
        if ($trenins->treners->contains($request['treners'])) {
            return redirect()->back()->with('error', 'Treners jau ir pievienots');
        }

        $trenins->treneri()->attach($request['treners']);
        return redirect('/trenins/' . $trenins->id)->with('success', 'Treners pievienots!');
    }

    public function removeTreners(Request $request, Trenins $trenins) {
        // \Log::debug($request);
        $trenins->treneri()->detach($request['treners']);
        return redirect('/trenins/' . $trenins->id)->with('success', 'Treners izdzests!');
    }
}
