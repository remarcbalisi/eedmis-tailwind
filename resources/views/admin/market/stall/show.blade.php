@extends('layouts.app')

@section('content')
    <div class="h-screen w-full p-5">
        <div class="inline-block w-full">
            <h1 class="mt-10 text-2xl">
                <div class="flex">
                    Stall &nbsp;<p class="text-blue-400">{{$stall->stall_number}}</p>
                </div>
                <a href="{{route('admin.market.stall.create')}}">
                    <button class="bg-blue-500 border-b-4 border-blue-700 font-bold hover:bg-blue-400 hover:border-blue-500 px-4 rounded text-sm text-white">
                        Add Stall
                    </button>
                </a>
            </h1>
        </div>

        <div class="w-full mt-10">
            @if( $active_stall = $stall->stores()->where('is_active', true)->first() )
                <h2>Active Stall</h2>
                <table class="w-full">
                    <thead>
                    <tr>
                        <th class="border w-1/2 px-4 py-2">Name</th>
                        <th class="border w-1/4 px-4 py-2">Tenant</th>
                        <th class="border w-1/4 px-4 py-2">Department</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="border px-4 py-2">{{$active_stall->name}}</td>
                        <td class="border px-4 py-2">{{$active_stall->tenant ? $active_stall->tenant->fullname() : 'n/a'}}</td>
                        <td class="border px-4 py-2">{{$active_stall->department ? $active_stall->department->name : 'n/a'}}</td>
                    </tr>
                    </tbody>
                </table>
            @else
            <h4 class="bg-red-200">No Active Store</h4>
            @endif

            @if( count($inactive_stalls = $stall->stores()->where('is_active', false)->get()) )
                    <h2 class="mt-10">Previous Stalls</h2>
                    <table class="w-full">
                        <thead>
                        <tr>
                            <th class="border w-1/2 px-4 py-2">Name</th>
                            <th class="border w-1/4 px-4 py-2">Tenant</th>
                            <th class="border w-1/4 px-4 py-2">Department</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $inactive_stalls as $inactive_stall )
                            <tr>
                                <td class="border px-4 py-2">{{$inactive_stall->name}}</td>
                                <td class="border px-4 py-2">{{$inactive_stall->tenant ? $inactive_stall->tenant->fullname() : 'n/a'}}</td>
                                <td class="border px-4 py-2">{{$inactive_stall->department ? $inactive_stall->department->name : 'n/a'}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h4 class="mt-10 bg-red-200">No Previous Stores</h4>
            @endif
        </div>
    </div>
@endsection
