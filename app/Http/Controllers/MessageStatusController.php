<?php

namespace App\Http\Controllers;

use App\Models\MessageStatus;
use Illuminate\Http\Request;

class MessageStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = MessageStatus::all();

        return response()->json($statuses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $status = MessageStatus::create($request->all());

        return response()->json($status, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(MessageStatus $messageStatus)
    {
        return response()->json($messageStatus);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MessageStatus $messageStatus)
    {
        $messageStatus->update($request->all());

        return response()->json($messageStatus);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MessageStatus $messageStatus)
    {
        $messageStatus->delete();

        return response()->json(null, 204);
    }
}
