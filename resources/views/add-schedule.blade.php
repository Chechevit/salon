@extends('layouts.app')

@section('content')
<select name="" id="">
    @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->title}}</option>
    @endforeach

</select>
@endsection