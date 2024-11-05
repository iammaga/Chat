<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Http\Resources\ChatResource;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChatController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('role:admin')->except('index', 'show');
//    }

    /**
     * Display a paginated listing of chat.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
//        $this->authorize('viewAny', User::class);
        $chats = Chat::with('messages.user')->paginate(10);

        // Убедитесь, что здесь указано имя представления 'chat'
        return view('chat', compact('chats'));
    }

    /**
     * Store a newly created chat in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return ChatResource
     */
    public function store(StoreChatRequest $request)
    {
//        $this->authorize('create', User::class);
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
//        $this->authorize('view', $chat);

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
//        $this->authorize('update', $chat);
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
//        $this->authorize('delete', $chat);
        $chat->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
