@extends('layouts.app')
@section('judul', 'Homepage')

@section('content')
    @guest
    <h5>Guest</h5>
    @endguest
    @auth
        @if(Auth::user()->username == 'admin')
            <h5>Hi, you are an Admin!</h5>
        @else
            <h5>Hi, {{ Auth::user()->username }}.</h5>
        @endif
    @endauth
    <h1>Welcome to Flowelto Shop</h1>
    <h2>The Best Flower Shop in Binus University</h2>
    <div class="d-flex flex-wrap">
    @foreach($flower_categories as $flower_category)
        <div class="card m-2" style="width: 14rem;">
            <img class="card-img-top imgHeight" src="{{ $flower_category->flowerCategoriesImage }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title" style="text-align: center">{{ $flower_category->flowerCategoriesName }}</h5>
            </div>
            <a href="/" class="btn btn-primary btn-lg btn-block">See All</a>
        </div>
    @endforeach
    </div>
@endsection
