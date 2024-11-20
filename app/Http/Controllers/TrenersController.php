<?php

namespace App\Http\Controllers;

use App\Models\Treners;
use Illuminate\Http\Request;

class TrenersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $treneri = Treners::all();
        return view('treners.index', compact('treneri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('treners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public'); 
        }

        Treners::create([
            'name' => $request->input('name'),
            'image' => $imagePath,

        ]);

        return redirect('/treners');
    }

    /**
     * Display the specified resource.
     */
    public function show(Treners $treners)
    {
        return view('treners.show', ['treners' => $treners]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $treners = Treners::findOrFail($id);

        // Pass the playlist to the view
        return view('treners.edit', ['treners' => $treners]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $treners = Treners::findOrFail($id);


        $imagePath = $treners->image;
        if ($request->hasFile('image')) {
            // Удаляем старое изображение из хранилища
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            // Загружаем новое изображение
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
        }

        $treners->update([
            'name' => $request->input('name'),
            'image' => $imagePath,
                    
        ]);
    

    return redirect('/treners'); //--------------Šo vajadzēs samainīt!!!!!!
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $treners = Treners::where('id', $id);

       

        $treners->delete();

        return redirect('/treners');
    }
}
