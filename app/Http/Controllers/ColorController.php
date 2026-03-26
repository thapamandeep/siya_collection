<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    public function create()
    {
        return view('admin.color.create');
    }

      public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:colors,name|max:50',
        ]);

        $color = new Color();
           $color->name = $data['name'];
        
           $color->save();

        return redirect()->back()->with('success', 'Color added successfully!');
    }

}
