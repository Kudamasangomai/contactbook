@extends('layouts.base')

@section('content')



<div class="row">
          <div class="col-md-4">
    <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                 
                          @if($contact->cover_image)
                      <img alt="user-avatar" class="img-rounded img-fluid"
                      src="/storage/cover_images/{{$contact->cover_image}}">
                      @else
                       <img alt="user-avatar" class="img-rounded img-fluid"
                      src="/storage/cover_images/{{$contact->noimage}}">
                      @endif
                </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

         <div class="col-md-4">

                <h3 class="profile-username text-center">{{ $contact->contact_fname }} {{ $contact->contact_lname }}</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    {{ $contact->contact_email }}
                  </li>
                  <li class="list-group-item">
                    {{ $contact->contact_phone }}
                  </li>
                 
                </ul>
                @if(Auth::user()->id == $contact->user_id)
        <div class="form-inline">              
           
                {!! Form::open(['method' => 'POST' ,'action' => ['App\Http\Controllers\ContactController@destroy',$contact->id] ]) !!}


                 {{ Form::hidden('_method','DELETE')}}
                 {{Form::submit('Delete',['class'=>'btn btn-danger btn-small'])}}
                {!! Form::close() !!}
               
              <br/> <br/>
                <a href="{{$contact->id}}/edit" class="btn btn-primary btn-small"><b>Update</b></a>
              </div>
                @endif
         </div>
    </div>

@endsection