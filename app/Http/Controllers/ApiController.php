<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Operator;
use App\Models\Message;
use App\Models\Review;
use App\Models\Vote;
use App\Models\Specialization;
use App\Models\OperatorSponsorship;
use App\Models\OperatorSpecialization;
use App\Models\Sponsorship;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* messaggi - voti - recensioni */
        $operators = Operator::all();
        $votes = Vote::all();
        $reviews = Review::all();
        $messages = Message::all();
        $specializations = Specialization::all();
        $sponsorships = Sponsorship::all();
        $operator_sponsorships = OperatorSponsorship::all();
        $operator_specializations = OperatorSpecialization::all();


    
        $responseData = [
            'operators' => $operators,
            'votes' => $votes,
            'reviews' => $reviews,
            'messages' => $messages,
            'sponsorships'=>$sponsorships,
            'specialization' => $specializations,
            'operator_sponsorships' => $operator_sponsorships,
            'operator_specializations' => $operator_specializations,
            


        ];
    
        return response()->json($responseData);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
