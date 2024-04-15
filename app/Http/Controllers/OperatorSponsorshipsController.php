<?php

namespace App\Http\Controllers;

use App\Models\OperatorSponsorship;
use App\Http\Requests\StoreOperatorSponsorshipRequest;
use App\Http\Requests\UpdateOperatorSponsorshipRequest;
use App\Models\Sponsorship;
use Illuminate\Support\Facades\Auth;

class OperatorSponsorshipsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sponsorships = Sponsorship::all();
        return view("admin.operators.createOperatorSponsorships", compact("sponsorships"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOperatorSponsorshipRequest $request)
    {
          
    /*$operatorSponsorship = new OperatorSponsorship();
    $operatorSponsorship->operator_id = 1; 
    $operatorSponsorship->sponsorship_id = 1; 
    $operatorSponsorship->start_date = now();

    $sponsorship = Sponsorship::find(1); // Recupera la sponsorizzazione dal database
    $operatorSponsorship->end_date = $operatorSponsorship->start_date->addHours($sponsorship->duration);

    // Salva il record
    $operatorSponsorship->save();

    // Restituisci una risposta o reindirizza come necessario*/

        date_default_timezone_set('Europe/Rome');

        $data = $request->all();
        $new_operator_sponsorship = new OperatorSponsorship();

        $new_operator_sponsorship->operator_id = Auth::user()->id;
        $new_operator_sponsorship->sponsorship_id = $data["sponsorship"];
        $new_operator_sponsorship->start_date = date("Y-m-d H:i:s");

        $sponsorship = Sponsorship::find($data["sponsorship"]);
        $duration = $sponsorship->duration;
        $date = date_create(date("Y-m-d H:i:s"));
        $result = date_add($date,date_interval_create_from_date_string($duration));
        $new_operator_sponsorship->end_date = $result;
        
        $new_operator_sponsorship->save();
        
        return redirect()->route("admin.dashboard");
    }

    /**
     * Display the specified resource.
     */
    public function show(OperatorSponsorship $operatorSponsorship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OperatorSponsorship $operatorSponsorship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOperatorSponsorshipRequest $request, OperatorSponsorship $operatorSponsorship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OperatorSponsorship $operatorSponsorship)
    {
        //
    }
}
