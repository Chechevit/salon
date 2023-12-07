@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Auth::user()->role_id == 1)
            <div>admin</div>
            <div class="container">
                <div>
                    <h2>Добавить категорию</h2>
                    <form action="{{ route('add-category') }}" method="post">
                        @csrf
                        <input type="text" placeholder="Название" name="title">
                        <input type="text" placeholder="Описание" name="description">
                        <input type="submit" value="Добавить">
                    </form>
                </div>
                <div>
                    <h2>Редактировать и удалить категорию</h2>

                    @foreach ($categories as $category)
                        <form action="edit-category/{{ $category->id }}" method="post">
                            @csrf
                            <input type="text" name="title" value="{{ $category->title }}" placeholder="{{ $category->title }}">
                            <input type="text" name="description" value="{{ $category->description }}" placeholder="{{ $category->description }}">
                            <input type="submit" value="Редактировать">
                            <a href="delete-category/{{ $category->id }}">Удалить</a>
                        </form>
                    @endforeach
                </div>

            </div>
        @endif

        @if (Auth::user()->role_id == 2)
            <p>master</p>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ Auth::user()->name }}</h5>
                            <p class="card-text">Это более широкая карточка с вспомогательным текстом ниже в качестве
                                естественного перехода к дополнительному контенту. Этот контент немного длиннее.</p>
                            <p class="card-text">
                                <small class="text-body-secondary">Мастер</small> <br>
                                <small class="text-body-secondary">Последнее обновление 3 мин.
                                    назад</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- навигация --}}
            <ul class="nav nav-underline">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">График работы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Посты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('schedule') }}">Расписание</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Редактировать профиль</a>
                </li>
            </ul>
            {{--  --}}

            {{-- график работы --}}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Имя</th>
                        <th scope="col">Дата</th>
                        <th scope="col">Время</th>
                        <th scope="col">Категория</th>
                    </tr>
                </thead>
                @foreach ($schedules as $schedule)
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $schedule->user_id }}</td>
                            <td>{{ $schedule->date }}</td>
                            <td>{{ $schedule->time }}</td>
                            <td>{{ $schedule->category_id }}</td>
                            <td class="cont_ico">
                                <a href="#"><img src="img/delete.png" alt="del"></a>
                            </td>

                        </tr>
                @endforeach
                </tbody>
            </table>
        @endif

        @if (Auth::user()->role_id == 3)
            <div>client</div>
        @endif
    </div>
@endsection
