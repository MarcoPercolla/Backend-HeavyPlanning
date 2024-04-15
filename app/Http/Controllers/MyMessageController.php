<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyMessageController extends Controller
{
    public function index($operator_id){
        $messages = DB::table("messages")
        ->select("Text", "user_email", "author")
        ->where("operator_id", "=", $operator_id)
        ->get();
        return view("admin.operators.myMessages", compact("messages"));
    }
}
