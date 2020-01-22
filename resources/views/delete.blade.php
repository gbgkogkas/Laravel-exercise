@extends('default')
@section('title', 'Add User')

@section('content')
    @parent
    <form action="{!! route('deleteUserAction') !!}" method="post">
        @method('DELETE')
        @csrf
        <div>
            <label for="id">
                User id
                <input id="id" name="id" type="number">
            </label>
        </div>

        <input type="submit" value="submit">
    </form>
@endsection
