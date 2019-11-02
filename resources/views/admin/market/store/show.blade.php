@extends('layouts.app')

@section('content')
    <div class="h-screen w-full p-5">
        <div class="inline-block w-full">
            <h1 class="mt-10 text-2xl">
                <div class="flex">
                    <p class="text-blue-400">{{$store->name}}</p>
                </div>
            </h1>

            <p>Tenant: {{$store->tenant->fullname()}}</p>
            <p>Department: {{$store->department->name ?? 'n/a'}}</p>
            <p>Stall #: {{$store->stall->stall_number ?? 'Sidewalk Vendor'}}</p>
            <p>Status: {{$store->is_active ? 'Active' : 'Not Active'}}</p>
        </div>
    </div>
@endsection
