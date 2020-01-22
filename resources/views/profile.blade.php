@extends('default')
@section('title', 'Profile')

@section('content')
    @parent
    <ul>
        @foreach($profile as $key => $value)
            @if (strpos($key, '_at') === false)
                @php
                    if (empty($value) || is_null ($value)) {
                        $value = '-';
                    }
                @endphp
                <li><strong>{!! $key !!}:</strong> {!! $value !!}</li>
            @endif
        @endforeach
    </ul>
@endsection
