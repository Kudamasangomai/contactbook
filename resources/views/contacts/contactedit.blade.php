@extends ('layouts.base')



@section('content')


     
   <div class="col-md-6">
   {!! Form::open([

   'method' => 'POST' ,
   'action' => ['App\Http\Controllers\ContactController@update',$contact->id] ,
   'enctype' => 'multipart/form-data']) !!}

   <div class="card-body">
                <div class="form-group">
        {{ Form::label('Name', 'First name') }}
        {{Form::text('firstname', $contact->contact_fname, ['class' => 'form-control', 'placeholder' => 'firstname'])}}
                  <!--<input class="form-control" placeholder="name:" name="fname">-->
                </div>

         <div class="form-group">
        {{ Form::label('LastName', 'Last name') }}
        {{Form::text('lastname', $contact->contact_lname, ['class' => 'form-control', 'placeholder' => 'lastname'])}}
                  <!--<input class="form-control" placeholder="name:" name="fname">-->
                </div>
  
                        <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{Form::email('email', $contact->contact_email, ['class' => 'form-control', 'placeholder' => 'kuda@gmail.com'])}}
                  <!--<input class="form-control" placeholder="name:" name="fname">-->
                </div>

         <div class="form-group">
        {{ Form::label('Contact', 'Phone') }}
        {{Form::text('phone', $contact->contact_phone, ['class' => 'form-control', 'placeholder' => '07776696355'])}}
           
                </div>

                  <div class="form-group">
      
           {{Form::file('cover_image')}}
                
                </div>
            {{ Form::hidden('_method','PUT')}}
	           {{ Form::submit('Submit!');}}

	{!! Form::close() !!}
</div>

@endsection
