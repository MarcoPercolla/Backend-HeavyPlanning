<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(isset($_GET["operator_id"]) && isset($_GET["text"]) && isset($_GET["user_email"]) && isset($_GET["author"])){
            $new_message = new Message();
            $new_message->operator_id = $_GET["operator_id"];
            $new_message->Text = $_GET["text"];
            $new_message->user_email = $_GET["user_email"];
            $new_message->author = $_GET["author"];
            $new_message->save();
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
    public function store(StoreMessageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
