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
            <form action="{{route('admin.market.store.update', ['store' => $store])}}" method="POST" class="w-full max-w-lg">
                @csrf
                @method('PATCH')
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-tenant-name">
                            Tenant Name
                        </label>
                        <input class="shadow appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="name" value="{{$store->name}}" id="grid-tenant-name" type="text" placeholder="Name">
                    </div>
                </div>
                <div class="block relative w-64 mb-6">
                    <select name="tenant_id" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">No tenant yet</option>
                        @foreach( $tenants as $tenant )
                            <option value="{{$tenant->id}}">{{$tenant->fullname()}}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
                <div class="block relative w-64 mb-6">
                    <select name="market_department_id" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">No department yet</option>
                        @foreach( $departments as $department )
                            <option value="{{$department->id}}">{{$department->name}} ({{$department->description}})</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
                <div class="block relative w-64 mb-6">
                    <select name="stall_id" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">This is Vendor</option>
                        @foreach( $stalls as $stall )
                            <option value="{{$stall->id}}">{{$stall->stall_number}}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    Create
                </button>
            </form>
        </div>
    </div>
@endsection
