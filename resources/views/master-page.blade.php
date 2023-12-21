@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/img/asd.jpg" class="img-fluid rounded-start" alt="dfsdf">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">Мастер Ангелина предоставляет широкий ассортимент услуг по всем категориям
                            сайта. 94864855044. Опыт работы - 13 лет. Звоните, пишите!
                        </p>
                        <p class="card-text">
                            <small class="text-body-secondary">Мастер</small> <br>
                            <small class="text-body-secondary">Последнее обновление 3 мин.
                                назад</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="table w-300">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Имя</th>
                <th scope="col">Дата</th>
                <th scope="col">Время</th>
                <th scope="col">Категория</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($schedules as $schedule)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $schedule->user_id }}</td>
                    <td>{{ $schedule->date }}</td>
                    <td>{{ $schedule->time }}</td>
                    <td>{{ $schedule->category_id }}</td>
                    <td class="cont_ico">
                        <a href="sign-up/{{ $schedule->id }}">Записаться</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
