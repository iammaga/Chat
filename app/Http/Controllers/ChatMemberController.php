<?php

namespace App\Http\Controllers;

use App\Models\ChatMember;
use Illuminate\Http\Request;

class ChatMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = ChatMember::all();

        return response()->json($members);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $member = ChatMember::create($request->all());

        return response()->json($member, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ChatMember $chatMember)
    {
        return response()->json($chatMember);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChatMember $chatMember)
    {
        $chatMember->update($request->all());

        return response()->json($chatMember);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChatMember $chatMember)
    {
        $chatMember->delete();

        return response()->json(null, 204);
    }
}
