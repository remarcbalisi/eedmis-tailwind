@extends('layouts.app')

@section('content')
    <div class="h-screen flex text-center justify-center">
        <h1 class="m-auto">Hello {{ auth()->user()->fullname() }}!</h1>
    </div>
@endsection
