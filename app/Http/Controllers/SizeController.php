<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function store(Request $request)
    {
        return Size::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $size = Size::findOrFail($id);
        $size->update($request->all());

        return $size;
    }

    public function destroy($id)
    {
        Size::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
