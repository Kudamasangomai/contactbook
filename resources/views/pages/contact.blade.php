@extends('layouts.base')

@section('content')

@if(count($user_contacts) > 0 )

			

					  
			


 <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
          	@foreach($user_contacts as $contact)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                {{$contact->contact_fname}}
                </div>
                <div class="card-body pt-0">
                  <div class="col-md-4 col-sm-4" style="float: right;">
                        
                    </div>
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{$contact->contact_lname}}</b></h2>
                      <p class="text-muted text-sm"><b>About: </b>      {{$contact->job}} </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: sunningdale</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{$contact->contact_phone}}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                     <!-- <img src="../../dist/img/user1-128x128.jpg" >-->
                      @if($contact->cover_image)
                      <img alt="user-avatar" class="img-rounded img-fluid"
                      src="/storage/cover_images/{{$contact->cover_image}}">
                      @else
                       <img alt="user-avatar" class="img-rounded img-fluid"
                      src="/storage/cover_images/{{$contact->noimage}}">
                      @endif
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                  

                    <a href="/contact/{{$contact->id}}" class="btn btn-sm btn-primary">
                      <i class="fas fa-eye"></i> 
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

			{{ $user_contacts->links() }}

            @else
    <p>No Contacts found</p>
 @endif



@endsection







