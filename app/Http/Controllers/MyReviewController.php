<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyReviewController extends Controller
{
    public function index($operator_id){
        $reviews = DB::table("reviews")
        ->select("reviews.comment", "reviews.author", "reviews.user_email", "votes.vote")
        ->where("reviews.operator_id", "=", $operator_id)
        ->join("votes", "reviews.vote_id", "=", "votes.id")
        ->get();
        return view("admin.operators.myReviews", compact("reviews"));
    }
}
