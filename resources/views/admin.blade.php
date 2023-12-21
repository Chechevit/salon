@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container w-300">
            <div>
                <h3>Добавить категорию</h3>
                <form action="{{ route('add-category') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Название</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Описание</label>
                        <input type="text" class="form-control mb-3" name="description">

                        <input type="submit" value="Добавить" class="btn btn-dark">
                    </div>


                    <div>
                        <h3 class="mt-5">Редактировать и удалить категорию</h3>

                        @foreach ($categories as $category)
                            <form action="admin/edit-category/{{ $category->id }}" method="post" class="mb-3">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label mt-3">Название</label>
                                    <input type="text" class="form-control" placeholder="{{ $category->title }}"
                                        name="title" value="{{ $category->title }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Описание</label>
                                    <input type="text" class="form-control" placeholder="{{ $category->description }}"
                                        name="description" value="{{ $category->description }}">
                                </div>

                                <input type="submit" class="btn btn-dark" value="Редактировать">
                                <a href="admin/delete-category/{{ $category->id }}">Удалить</a>
                            </form>
                        @endforeach
                    </div>
                    <div>
                        <h2 class="mt-5">Добавить мастера</h2>
                        <form action="{{ route('add-master') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Имя</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Почта</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Пароль</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <input type="submit" class="btn btn-dark" value="Добавить">
                        </form>
                    </div>
                    <div>
                        <table class="table mt-5">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Имя</th>
                                    <th scope="col">Email</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td colspan="2">{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><a href="admin/delete-master/{{ $user->id }}"
                                                class="btn btn-dark">Удалить</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    @endsection
