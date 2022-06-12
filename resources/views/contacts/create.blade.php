@extends('layouts.base')
@section('content')

        
   <div class="col-md-6">
   {!! Form::open(['method' => 'POST' ,'action' => 'App\Http\Controllers\ContactController@store' ,'enctype' => 'multipart/form-data']) !!}

   <div class="card-body">
                <div class="form-group">
                  
        {{ Form::label('firstname', 'First name') }}
        {{Form::text('firstname', '', ['class' => 'form-control', 'placeholder' => 'firstname'])}}
                  <!--<input class="form-control" placeholder="name:" name="fname">-->
                </div>

         <div class="form-group">
        {{ Form::label('LastName', 'Last name') }}
        {{Form::text('lastname', '', ['class' => 'form-control', 'placeholder' => 'lastname'])}}
                  <!--<input class="form-control" placeholder="name:" name="fname">-->
                </div>

                
                
            <div class="form-group">
                  {{ Form::label('job', 'job') }}
                  {{Form::text('job', '', ['class' => 'form-control', 'placeholder' => 'technician'])}}
                            <!--<input class="form-control" placeholder="name:" name="fname">-->
                          </div>


                        <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'kuda@gmail.com'])}}
                  <!--<input class="form-control" placeholder="name:" name="fname">-->
                </div>

         <div class="form-group">
        {{ Form::label('phone', 'Phone') }}
        {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => '07776696355'])}}
                  <!--<input class="form-control" placeholder="name:" name="fname">-->
                </div>

                <div class="form-group">
                   {{ Form::label('coverimage', 'Display  picture') }}
        {{ Form::file('cover_image',['class' => 'form-control']) }}
       
                </div>

	{{ Form::submit('Submit!');}}

	{!! Form::close() !!}
</div>
@endsection