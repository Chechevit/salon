@extends('layouts.app')

@section('content')
    <h4 class="p-3">Личный кабинет мастера</h4>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/img/def.jpg" class="img-fluid rounded-start" alt="ssd">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="card-text">Мастер Снежана с опытом работы около 5 лет. 89547588477</p>
                    <p class="card-text">
                        <small class="text-body-secondary">Мастер</small> <br>
                        <small class="text-body-secondary">Последнее обновление 3 мин.
                            назад</small>
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="container w-300 mb-5">
        <form action="cabinet" method="get">
            <div class="mb-3">
                <label for="category" class="form-label">Фильтрация по категории</label>

                <select class="form-select" name="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Применить</button>
        </form>
    </div>
    <table class="table w-300 mb-5 ">
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
                        <a href="delete-schedule/{{ $schedule->id }}">Удалить</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        <h3>Удалить запись</h3>
        <table class="table w-300 mb-5">

            <thead>
                <tr>
                    <th scope="col">Дата</th>
                    <th scope="col">Время</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($records as $record)
                    <tr>
                        <td>{{ $record['schedule']->date }}</td>
                        <td>{{ $record['schedule']->time }}</td>
                        <td><a href="{{ route('delete-record', $record['record_id']) }}">Удалить</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <div class="container w-300">
        <h3>Добавить расписание</h3>
        <form action="{{ route('add-shedule') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="date" class="form-label">Дата</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Время</label>
                <input type="time" class="form-control" id="time" name="time">
            </div>
            <div class="mb-3 form-check">
                <label for="category" class="form-label">Категория</label>
                <select class="form-select" name="category">
                    <option value="">Выберите категорию</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection
