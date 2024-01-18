<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeopleController extends Controller
{

    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(People::all());
    }
    public function create(Request $request): \Illuminate\Http\JsonResponse
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

        return response()->json('Person created successfully', 201);
    }

    public function read(string $id): \Illuminate\Http\JsonResponse
    {
        return response()->json(People::findOrFail($id));
    }
    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $item = People::findOrFail($id)->update($request->all());

        return response()->json('Person updated successfully');
    }
    public function remove( string $id): \Illuminate\Http\JsonResponse
    {
        People::findOrFail($id)->delete();
        return response()->json('Person removed successfully');
    }
}
