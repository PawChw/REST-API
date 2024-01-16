<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{

    public function index(){
        return response()->json(People::all());
    }
    public function create(Request $request)
    {
        $item = new People();
        $item->name=$request->name;
        $item->lastName=$request->lastName;
        $item->phoneNumber=$request->phoneNumber;
        $item->street=$request->street;
        $item->city=$request->city;
        $item->country=$request->country;

        $item->save();

        return response()->json('Created successfully')->status(201);
    }

    public function read(Request $request){
        return response()->json(People::findOrFail($request->id));
    }
    public function update(Request $request){
        $item = People::findOrFail($request->id);
        $item->name=$request->name ?? $item->name;
        $item->lastName=$request->lastName ?? $item->lastName;
        $item->phoneNumber=$request->phoneNumber ?? $item->phoneNumber;
        $item->street=$request->street ?? $item->street;
        $item->city=$request->city ?? $item->city;
        $item->country=$request->country ?? $item->country;

        $item->update();

        return response()->json('Updated successfully');
    }
    public function remove(Request $request){
        $item = People::findOrFail($request->id)->delete();

        return response()->json('Removed successfully');
    }
}
