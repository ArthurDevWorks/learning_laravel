<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SignatureController extends Controller
{
    public function index(Request $request){

        $validator = Validator::make($request->all(), [
            'drink' => 'required|string',
            'age' => 'required|integer'
        ]);

        $params = $validator->fails() ? $validator->messages() : $validator->validate()['drink'];

        $user = auth()->user();

        $name = $user->name;
        $document = Client::where('user_id',$user->id)->first()->document;
        $status = $user->client->signatures->first()->status->name;


        return view('/test',[
            'name' => $name,
            'document' => $document,
            'status' => $status,
            'params' => $params
        ]);
    }
}
