<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
//        $this->authorize('viewAny', User::class);
        $users = User::all();
        $messages = [];

        foreach ($users as $user) {
            $messages[$user->first_name . ' ' . $user->last_name] = [];
        }

        $firstUser = $users->first();
        $selectedUser = ucfirst($firstUser) ? ucfirst($firstUser->first_name) . ' ' . ucfirst($firstUser->last_name) : '';

        return view('chat.index', compact('users', 'selectedUser', 'messages'), [
            'users' => UserResource::collection($users),
            'messages' => $messages,
            'selectedUser' => $selectedUser
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
//        $this->authorize('create', User::class);
        $user = User::create($request->validated());

        return new UserResource($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
//        $this->authorize('view', $user);

        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
//        $this->authorize('update', $user);
        $user->update($request->validated());

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
//        $this->authorize('delete', $user);
        $user->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
