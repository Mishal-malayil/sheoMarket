<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use Illuminate\Http\Request;

class ShoeController extends Controller
{
    public function index()
    {
        return Shoe::with('category', 'sizes')->get();
    }

    public function show($id)
    {
        return Shoe::with('category', 'sizes')->findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required'
        ]);

        return Shoe::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $shoe = Shoe::findOrFail($id);
        $shoe->update($request->all());

        return $shoe;
    }

    public function destroy($id)
    {
        Shoe::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
?>