@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            @foreach ($categories as $category)
                <div class="card text-bg-dark">
                    <img src="img/{{ $category->photo }}" class="card-img" alt="фото">
                    <div class="card-img-overlay">
                        <h5 class="card-title">{{ $category->title }}</h5>
                        <p class="card-text">{{ $category->description }}</p>
                        <p class="card-text"><small>Last updated 3 mins ago</small></p>
                    </div>
                </div>
            @endforeach
        </div>



        <style>
            .card img {
                opacity: .5;
            }
        </style>

        @foreach ($posts as $post)
            <div class="card" style="width: 18rem;">
                <img src="img/{{ $post->photo }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->description }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> Код мастера - {{ $post->user_id }}</li>
                    <li class="list-group-item">Второй элемент</li>
                    <li class="list-group-item">Третий элемент</li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Ссылка карточки</a>
                    <a href="#" class="card-link">Другая ссылка</a>
                </div>
            </div>
        @endforeach


        <footer>
подвал
        </footer>

    </div>
@endsection
