<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiVotesController extends Controller
{
    public function index(){
        $votes = DB::table("votes")
        ->select("id", "vote")
        ->get();
        return response()->json($votes);
    }
}
