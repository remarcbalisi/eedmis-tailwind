@extends('layouts.app')

@section('content')
    <div class="flex h-screen w-full p-5">
        <div class="inline-block">
            <h1 class="mt-10 text-2xl">Department List</h1>
            <table class="m-auto table-fixed w-full">
                <thead>
                <tr>
                    <th class="w-1/2 px-4 py-2 border">Name</th>
                    <th class="w-1/4 px-4 py-2 border">Description</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $market_departments as $market_department )
                    <tr>
                        <td class="border px-4 py-2">{{$market_department->name}}</td>
                        <td class="border px-4 py-2">{{$market_department->description}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
