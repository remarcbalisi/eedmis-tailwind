@extends('layouts.app')

@section('content')
    <div class="flex h-screen w-full p-5">
        <div class="inline-block">
            <h1 class="mt-10 text-2xl">
                Stall List
                <button class="bg-blue-500 border-b-4 border-blue-700 font-bold hover:bg-blue-400 hover:border-blue-500 px-4 rounded text-sm text-white">
                    Add Stall
                </button>
            </h1>
            <table class="m-auto table-fixed w-full">
                <thead>
                <tr>
                    <th class="w-1/2 px-4 py-2 border">Stall Number</th>
                    <th class="w-1/2 px-4 py-2 border">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $market_stalls as $market_stall )
                    <tr>
                        <td class="border px-4 py-2">{{$market_stall->stall_number}}</td>
                        <td class="border px-4 py-2">
                            <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                View
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
