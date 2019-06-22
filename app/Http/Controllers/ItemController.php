<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function showAllItems()
    {
        return response()->json(Item::all());
    }

    public function showOneItem($id)
    {
        return response()->json(Item::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'isActive' => 'required|boolean',
            'price' => 'required|numeric',
            'picture' => 'required|url'
        ]);

        $item = Item::create($request->all());

        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->update($request->all());
        //$item->name = $request->input('name');
        //$item->save();

        return response()->json($item, 200);
    }

    public function delete($id)
    {
        Item::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}