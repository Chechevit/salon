@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            @foreach ($categories as $category)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Категория услуг</h6>
                        <p class="card-text">{{ $category->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-around mt-5 mb-5">
            @foreach ($user as $users)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $users->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $users->role }}</h6>


                        <a href="master-page/{{ $users->id }}" class="links">Посмотреть профиль</a>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $user->links('pagination::bootstrap-5') }}

        <footer>
        </footer>

    </div>
@endsection
