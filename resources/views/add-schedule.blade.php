@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('add-shedule') }}" method="post">
            @csrf
            <input type="date" name="date">
            <input type="time" name="time">
            <select name="category" id="">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            <input type="submit" value="Добавить">
        </form>
    </div>
@endsection
