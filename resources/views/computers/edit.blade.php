@extends('layout')

@section ('title','Edit computer')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <h1> Edit old computer  </h1>
        </div>

        <div class="mt-8 ">
        <form action="{{route('computers.update',['computer' => $computer->id])}}" method="post" class="form bg-white p-6 border-1">
            @csrf
            @method('PUT')
            <div>
                <label for="computer-name"> computer name</label>
                <input id="computer-name"name="computer-name"value="{{$computer->name}}" type="text">
                
                @error('computer-name')
                <div class="form-error">
                    The Name field is required
                    </div>
                @enderror
              
            </div>

            <div>
                <label for="computer-origin">computer origin </label>
                <input id="computer-origin"name="computer-origin"value="{{$computer->origin}}" type="text">

                @error('computer-origin')
                <div class="form-error">
                    The origin name field is required
                    </div>
                @enderror
            </div>

            <div>
                <label for="computer-price">computer price </label>
                <input id="computer-price"name="computer-price" value="{{$computer->price}}" type="text">

                @error('computer-price')
                <div class="form-error">
                    must write the Number price
                    </div>
                @enderror
            </div>

            <div>
                <button type="submit">submit </button>
            </div>

        </form>

        </div>
@endsection
