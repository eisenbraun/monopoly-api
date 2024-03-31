<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index () {
        $properties = Property::all();
        $offset = request('offset') ? request('offset') : 0;


        return response()->json(array_slice($properties, $offset, 5));
    }

    public function show ($id) {
        return Property::find($id);
    }
}
