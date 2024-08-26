<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Http\Resources\ChatResource;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChatController extends Controller
{
    /**
     * Display a paginated listing of chats.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $chats = Chat::paginate(10);

        return ChatResource::collection($chats);
    }

    /**
     * Store a newly created chat in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return ChatResource
     */
    public function store(StoreChatRequest $request)
    {
        $chat = Chat::create($request->validated());

        return new ChatResource($chat);
    }

    /**
     * Display the specified chat.
     *
     * @param \App\Models\Chat $chat
     * @return ChatResource
     */
    public function show(Chat $chat)
    {
        return new ChatResource($chat);
    }

    /**
     * Update the specified chat in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Chat $chat
     * @return ChatResource
     */
    public function update(UpdateChatRequest $request, Chat $chat)
    {
        $chat->update($request->validated());

        return new ChatResource($chat);
    }

    /**
     * Remove the specified chat from storage.
     *
     * @param \App\Models\Chat $chat
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Chat $chat)
    {
        $chat->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
