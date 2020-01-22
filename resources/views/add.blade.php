@extends('default')
@section('title', 'Add User')

@section('content')
    @parent
    @if(isset($errors))
        <ul>
            @foreach($errors as $field => $messages)
                <li><strong>{!! $field !!}: </strong> {!! implode('<br>', $messages) !!}</li>
            @endforeach
        </ul>
    @endif
    <form action="{!! route('registerUserAction') !!}" method="post">
        @method('PUT')
        @csrf
        <div>
            <label for="first_name">
                first name
                <input id="first_name" name="first_name" type="text">
            </label>
        </div>
        <div>
            <label for="mid_name">
                mid name
                <input id="mid_name" name="mid_name" type="text">
            </label>
        </div>
        <div>
            <label for="last_name">
                last name
                <input id="last_name" name="last_name" type="text">
            </label>
        </div>
        <div>
            <label for="email">
                email
                <input id="email" name="email" type="text">
            </label>
        </div>
        <div>
            <label for="password">
                password
                <input id="password" name="password" type="password">
            </label>
        </div>

        <input type="submit" value="submit">
    </form>
@endsection
