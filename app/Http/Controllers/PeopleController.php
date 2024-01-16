<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeopleController extends Controller
{

    public function index(){
        return response()->json(People::all());
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'string|required',
            'lastName' => 'string|required',
            'phoneNumber' => 'string|required',
            'street' => 'string|required',
            'city' => 'string|required',
            'country' => 'string|required'
        ]);
        if($validator->fails()){
            return response()->json($validator->messages(), 400);
        }
        $item = new People();
        $item->name=$request->name;
        $item->lastName=$request->lastName;
        $item->phoneNumber=$request->phoneNumber;
        $item->street=$request->street;
        $item->city=$request->city;
        $item->country=$request->country;


        $item->save();

        return response()->json('Created successfully', 201);
    }

    public function read(string $id){
        return response()->json(People::findOrFail($id));
    }
    public function update(Request $request, string $id){
        $validator = Validator::make($request->all(),[
            'name' => 'string|nullable',
            'lastName' => 'string|nullable',
            'phoneNumber' => 'string|nullable',
            'street' => 'string|nullable',
            'city' => 'string|nullable',
            'country' => 'string|nullable'
        ]);
        if($validator->fails()){
            return response()->json($validator->messages(), 400);
        }
        $item = People::findOrFail($id);
        $item->name=$request->name ?? $item->name;
        $item->lastName=$request->lastName ?? $item->lastName;
        $item->phoneNumber=$request->phoneNumber ?? $item->phoneNumber;
        $item->street=$request->street ?? $item->street;
        $item->city=$request->city ?? $item->city;
        $item->country=$request->country ?? $item->country;

        $item->update();

        return response()->json('Updated successfully');
    }
    public function remove( string $id){
        $item = People::findOrFail($id)->delete();

        return response()->json('Removed successfully');
    }
}
