<?php

namespace App\Http\Controllers;

use App\Models\Treners;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TrenersController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $treneri = Treners::with('trenins')->paginate(10);
        return view('treners.index', compact('treneri'));
    }


    public function create()
    {
      
        return view('treners.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string',
            'contact' => 'nullable|string|max:255',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public'); 
        }

        Treners::create([
            'name' => $request->input('name'),
            'image' => $imagePath,
            'bio' => $request->input('bio'),
            'contact' => $request->input('contact'),

        ]);

        return redirect('/treners');
    }

    
    public function show($id)
{
   
    $trener = Treners::with('trenins')->findOrFail($id);

   
    return view('treners.show', compact('trener'));
}


  
    public function edit($id)
    {

        
        $treners = Treners::findOrFail($id);

      


        return view('treners.edit', ['treners' => $treners]);
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string',
            'contact' => 'nullable|string|max:255',
        ]);
    
       
        $treners = Treners::findOrFail($id);
    
     
        if ($request->hasFile('image')) {
           
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
    
          
            $treners->update([
                'name' => $request->input('name'),
                'image' => $imagePath,
                'bio' => $request->input('bio'),
                'contact' => $request->input('contact'),
            ]);
        } else {
          
            $treners->update([
                'name' => $request->input('name'),
                'bio' => $request->input('bio'),
                'contact' => $request->input('contact'),
            ]);
        }
    
    

    return redirect('/treners'); 
    }

  
    public function destroy($id)
    {

        

        $treners = Treners::where('id', $id);

        

        $treners->delete();

        return redirect('/treners');
    }


    public function search(Request $request)
    {
       
        $query = $request->input('query');

        // Meklēt trenerus pēc nosaukuma, izmantojot “like”, lai meklētu virknes daļu.
        // Pievienojiet lapas lappušu numerāciju, 10 rezultāti vienā lappusē
        $treneri = Treners::where('name', 'like', '%' . $query . '%')->paginate(10);

        
        return view('treners.index', compact('treneri'));
    }
}
