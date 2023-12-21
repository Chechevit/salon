@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h2>Записи</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Дата</th>
                        <th scope="col">Время</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($records as $record)
                            <td>{{ $record['schedule']->date }}</td>
                            <td>{{ $record['schedule']->time }}</td>
                            <td><a href="{{ route('delete-record', $record->id) }}">Отменить запись</a></td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <form action="{{ route('update-user', $user->id) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                        value="{{ $user->email }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Пароль</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-success">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
