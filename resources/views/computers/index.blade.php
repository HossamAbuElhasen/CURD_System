@extends('layout')

@section('title', 'Computers')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

    <div class="mt-8">
        <!-- محتوى صفحة الإنشاء -->
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <h1>Create New Computer</h1>
            </div>
        
            <div class="mt-8">
                <form action="{{ route('computers.store') }}" method="post" class="form bg-white p-6 border-1">
                    @csrf
                            <div>
                                <label for="computer-name">Computer Name</label>
                                <input id="computer-name" name="computer-name" value="{{ old('computer-name') }}" type="text">
                                @error('computer-name')
                                <div class="form-error">The Name field is required</div>
                                @enderror
                            </div>
                
                            <div>
                                <label for="computer-origin">Computer Origin Country</label>
                                <input id="computer-origin" name="computer-origin" value="{{ old('computer-origin') }}" type="text">
                                @error('computer-origin')
                                <div class="form-error">The origin name field is required</div>
                                @enderror
                            </div>
                
                            <div>
                                <label for="computer-price">Computer Price</label>
                                <input id="computer-price" name="computer-price" value="{{ old('computer-price') }}" type="text">
                                @error('computer-price')
                                <div class="form-error">Must write the Number price</div>
                                @enderror
                            </div>
                    <div>
                        <button type="submit">create</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <h1 class="title-product">Computer Products</h1>
        </div>
    

        @if(isset($computers) && count($computers) > 0)
        <ul class="grid-container">
            @foreach ($computers as $computer)
                <li class="product-item" data-href="{{ route('computers.show', ['computer' => $computer->id]) }}">
                    <a href="{{ route('computers.show', ['computer' => $computer->id]) }}">
                        {{ $computer->name }} is from {{ $computer->origin }} <strong> {{ $computer->price }}$ </strong>
                    </a>
                    <div>
                        <form action="{{ route('computers.edit', $computer->id) }}" method="GET" style="display: inline;">
                            @csrf
                            <button type="submit" class="edit-btn">Edit</button>
                        </form>
                        <form action="{{ route('computers.destroy', $computer->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>No computers available</p>
    @endif
    
    
    

    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var productItems = document.querySelectorAll('.product-item');

        productItems.forEach(function(item) {
            item.addEventListener('click', function(event) {
                if (!event.target.matches('.edit-btn') && !event.target.matches('.delete-btn')) {
                    var href = item.getAttribute('data-href');
                    if (href) {
                        window.location.href = href;
                    }
                }
            });
        });
    });
</script>

