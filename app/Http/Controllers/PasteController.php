<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paste;
use App\Models\User;
use Auth;

class PasteController extends Controller
{

    public function getPaste($uid)
    {
        return Paste::with('user')->where('unique_id', $uid)->first()->toJson();
    }

    public function postPaste(Request $request)
    {
        //URL Parameter has to be sent
        if($request->has('paste'))
        {
            //URL Parameter has to be non-empty
            $validatedData = $request->validate([
                'paste' => 'required',
                'language' => 'required'
            ]);

                
            $paste = new Paste;
            $paste->unique_id = uniqid();
            $paste->content = $request->paste;
            $paste->language = $request->language;

            if(Auth::user())
            {
                $paste->user_id = Auth::id();
            }
            
            $paste->save();

            //Return a JSON object
            return response()->json([
                'paste' => $paste
            ]);   

        }
    }
}
