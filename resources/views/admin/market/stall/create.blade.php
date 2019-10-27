@extends('layouts.app')

@section('content')
    <div class="flex h-screen w-full p-5">
        <div class="inline-block ml-auto mr-auto">
            <h1 class="mt-10 text-2xl">
                Create Stall
            </h1>
            @if( session('success_msg') )
                <p class="bg-green-400 p-2 rounded">{{session('success_msg')}}</p>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="bg-red-400 p-2 rounded">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('admin.market.stall.store')}}" method="POST" class="w-full max-w-sm">
                @csrf
                <div class="flex items-center border-b border-b-2 border-teal-500 py-2">
                    <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" name="stall_number" type="text" placeholder="Stall Number" aria-label="Stall Number">
                    <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
                        Create
                    </button>
                    <a href="{{route('admin.market.stall.index')}}">
                        <button class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button">
                            Cancel
                        </button>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
