@extends('layouts.app')
@section('judul', 'Flower Details')

@section('content')
    <div class="container">
        <div class="card mb-3" style="max-width: 100%;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ $flower->flowerImage }}" class="card-img" alt="{{ $flower->flowerImage }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                            @endif

                        <h3 class="card-title">{{ $flower->flowerName }}</h3>
                        <h5 class="card-title">Rp {{ $flower->flowerPrice }}</h5>
                        <p class="card-text">{{ $flower->description }}</p>

                        @if((!Auth::check()) || (Auth::user()->userRole != 1))
                            <form method="POST" action={{ route('addtocart', $flower->id) }} class="form-inline">
                                @csrf
                                <label class="sr-only" for="inlineFormInputName2">Input Quantity</label>
                                <input type="number" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" min=1 placeholder="Quantity" name="qty">
                                <input type="submit" class="btn btn-primary mb-2"value="Add to Cart"/>
                            </form>
                        @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
