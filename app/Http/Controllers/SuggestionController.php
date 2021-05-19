<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class SuggestionController extends Controller
{
    public function create(Request $request) {
        $suggestion = $request->content;
        $display_name = $request->display_name;
        $email = $request->email;
        $succ = 0;
        if (strlen($suggestion) < 10) {
            $msg = "Suggestion shorter than 10 characters!";
        }
        elseif (strlen($email) < 3) {
            $msg = "Email shorter than 3 characters!";
        }
        elseif (strlen($display_name) < 3) {
            $msg = "Name shorter than 3 characters!";
        }
        elseif (strlen($suggestion) > 1000) {
            $len = strlen($suggestion);
            $msg = "Suggestion too long! Must be max 1000 characters long. But yours is $len characters long.";
        }
        elseif (strlen($display_name) > 40) {
            $len = strlen($display_name);
            $msg = "Name too long! Must be max 40 characters long. But yours is $len characters long.";
        }
        elseif (strlen($email) > 80) {
            $len = strlen($email);
            $msg = "Email too long! Must be max 80 characters long. But yours is $len characters long.";
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = "'$email' is not a valid email adress!";
        }
        else {
            $message = new Message();
            $message->content = $suggestion;
            $message->display_name = $display_name;
            $message->email = $email;
            $message->save();
            $msg = "Successfully added your suggestion!"; 
            $succ = 1;
        }
        return redirect("/result?msg=$msg&succ=$succ");
    }
}
