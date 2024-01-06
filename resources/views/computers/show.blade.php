@extends('layout')

@section('title', 'Show Computer')

@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <h1>Computer Product</h1>
        </div>

        <div class="mt-8">
            <h3>
                {{ $computer['name'] }} is from {{ $computer['origin'] }} <strong> {{ $computer['price'] }}$ </strong>
            </h3>
            
            <form action="{{ route('computers.edit', $computer->id) }}" method="GET" style="display: inline;">
                @csrf
                <button type="submit" class="edit-btn">Edit</button>
            </form>

            <form action="{{ route('computers.destroy', $computer->id) }}" method="POST" class="form-show">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn">Delete</button>
            </form>

            <a href="{{ route('computers.index') }}" class="back-btn">Back to Products</a>
        </div>
    </div>
@endsection
