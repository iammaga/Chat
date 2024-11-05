@extends('layouts.app')

@section('content')
    <x-chat-interface :users="$users" :messages="$messages" :selectedUser="$selectedUser" />
@endsection
