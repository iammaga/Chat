<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Http\Resources\MediaResource;
use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $media = Media::paginate(10);

        return MediaResource::collection($media);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMediaRequest $request)
    {
        $this->authorize('create', User::class);
        $media = Media::create($request->validated());

        return new MediaResource($media);
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        $this->authorize('view', $media);

        return new MediaResource($media);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMediaRequest $request, Media $media)
    {
        $this->authorize('update', $media);
        $media->update($request->validated());

        return new MediaResource($media);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media)
    {
        $this->authorize('delete', $media);
        $media->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
