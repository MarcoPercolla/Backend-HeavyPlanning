<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(isset($_GET["operator_id"]) && isset($_GET["vote_id"]) && isset($_GET["comment"]) && isset($_GET["author"]) && isset($_GET["user_email"])){
            $new_review = new Review();
            $new_review->operator_id = $_GET["operator_id"];
            $new_review->vote_id = $_GET["vote_id"];
            $new_review->comment = $_GET["comment"];
            $new_review->author = $_GET["author"];
            $new_review->user_email = $_GET["user_email"];
            $new_review->save();
        }
        return redirect("http://localhost:5173/detail/" . $_GET["operator_id"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
