@extends('layouts.app')

@section('content')
    @include('components.sidebar')

    <div class="flex-1 flex flex-col">
        @include('components.settings')
        @include('components.chat-area')
    </div>
@endsection
