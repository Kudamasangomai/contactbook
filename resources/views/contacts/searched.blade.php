@extends('layouts.base')

@section('content')
<h2>you searched for </h2>
@if(count($user_contacts) > 0 )
@foreach($user_contacts as $a)


<li><a href="contact/{{ $a->id }}"> {{ $a->contact_fname }} -  {{ $a->contact_lname }}</a></li>

@endforeach
@else
<p>No contact found</p>
@endif

@endsection