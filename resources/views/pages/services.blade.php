@extends('layouts.base')

@section('content')


@if(count($languages) > 0)
   <ul class="list-group">
       @foreach( $languages as $a )
                   <li class="list-group-item">{{ $a }}</li>
        @endforeach
    </ul>
@endif

@endsection
