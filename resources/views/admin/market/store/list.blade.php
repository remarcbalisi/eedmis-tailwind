@extends('layouts.app')

@section('content')
    <div class="flex h-screen w-full p-5">
        <div class="inline-block">
            <h1 class="mt-10 text-2xl">
                Store List
                <a href="{{route('admin.market.store.create')}}">
                    <button class="bg-blue-500 border-b-4 border-blue-700 font-bold hover:bg-blue-400 hover:border-blue-500 px-4 rounded text-sm text-white">
                        Add Store
                    </button>
                </a>
            </h1>
            <table class="m-auto table-fixed w-full">
                <thead>
                <tr>
                    <th class="w-1/2 px-4 py-2 border">Store Name</th>
                    <th class="w-1/2 px-4 py-2 border">Status</th>
                    <th class="w-1/2 px-4 py-2 border">Tenant</th>
                    <th class="w-1/2 px-4 py-2 border">Department</th>
                    <th class="w-1/2 px-4 py-2 border">Stall</th>
                    <th class="w-1/2 px-4 py-2 border">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $stores as $store )
                    <tr>
                        <td class="border px-4 py-2">{{$store->name}}</td>
                        <td class="border px-4 py-2">{{$store->is_active ? 'Active' : 'Not Active'}}</td>
                        <td class="border px-4 py-2">{{$store->tenant ? $store->tenant->fullname() : 'No tenant yet'}}</td>
                        <td class="border px-4 py-2">{{$store->department->name ?? 'n/a'}}</td>
                        <td class="border px-4 py-2">{{$store->stall->stall_number ?? 'Sidewalk Vendor'}}</td>
                        <td class="border px-4 py-2">
                            <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold text-sm px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                View
                            </button>
                            <button class="bg-orange-500 hover:bg-orange-400 text-white font-bold text-sm px-4 border-b-4 border-orange-700 hover:border-orange-500 rounded">
                                Edit
                            </button>
                            <button class="bg-red-500 hover:bg-red-400 text-white font-bold text-sm px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
