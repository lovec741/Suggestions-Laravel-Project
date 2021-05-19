<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class SuggestionResultController extends Controller
{
    public function result(Request $request) {
        $messages = Message::all();
        return view("home_with_info", [
            "suggestions" => $messages,
            "succ" => $request->succ,
            "msg" => $request->msg,
        ]);
    }
}
