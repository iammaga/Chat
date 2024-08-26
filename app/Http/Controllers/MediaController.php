<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Http\Resources\MediaResource;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $media = Media::paginate(10);

        return MediaResource::collection($media);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMediaRequest $request)
    {
        $media = Media::create($request->validated());

        return new MediaResource($media);
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        return new MediaResource($media);
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
    public function update(UpdateMediaRequest $request, Media $media)
    {
        $media->update($request->validated());

        return new MediaResource($media);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media)
    {
        $media->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
