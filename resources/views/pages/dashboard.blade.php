@extends('layouts.base')

@section('content')



{{-- {{ $timenow }} --}}

<a href="{{ route('Aboutpage') }} ">About</a>                                   


<form  method="POST" action=" {{ route('contact.store') }}">
    @csrf

    
        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
        <input 
        type="email" 
        name="email" 
        id="input-email" 
        class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}"
        placeholder="{{ __('Email') }}"
        value="{{ old('email') }}" required>
    
   


    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
</form>

@endsection
