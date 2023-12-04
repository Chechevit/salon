@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Auth::user()->role_id == 1)
            <div>admin</div>
        @endif

        @if (Auth::user()->role_id == 2)
            <p>master</p>
            <a href="{{ route('schedule') }}">Расписание</a>
            <a href="">График работы</a>

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
                    <a class="nav-link" href="#">Расписание</a>
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
