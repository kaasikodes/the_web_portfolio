@extends('layouts.app')
@section('title')
  Contact Page - Enter Details

    
@endsection

@section('content')
    <div class="container bg-primary py-4">
        <!-- Extra Navigation--> 
        <div class="mb-5">
           
            <a href="{{url()->previous()}}" class="float-right text-white">Go back</a>
            
        </div>

        {{-- Error, Success ,.. messages --}}
        @include('inc.messages')
        

        {{-- Form to be filled out --}}

        <div class="container py-4 px-5">
            <h1 class="text-white mb-4">Edit Contact Details</h1>
            
            <form action="{{route('contact.update',$contact->id)}}" method="POST" >

                <div class="py-3 border-white border-top border-bottom">
                    <div class="form-group">
                        {{Form::label('phone', 'Phone')}}
                        {{Form::text('phone', $contact->phone,['class'=>'form-control','placeholder'=>'Phone'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('email', 'Email')}}
                        {{Form::email('email', $contact->email,['class'=>'form-control','placeholder'=>'Email'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('physical_address', 'Physical address')}}
                        {{Form::text('physical_address', $contact->physical_address,['class'=>'form-control','placeholder'=>'Physical address'])}}
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="whatsapp_link">whatsapp link</label>
                        <input type="text" class="form-control" id="whatsapp_link" placeholder="" value="{{$contact->whatsapp_link}}" name="whatsapp_link" required>
                        <div class="invalid-feedback">
                          Valid url is required.
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="whatsapp_text">whatsapp Text</label>
                        <input name="whatsapp_text" type="text" class="form-control" id="whatsapp_text" placeholder="" value="{{$contact->whatsapp_text}}" required>
                        <div class="invalid-feedback">
                          Valid text is required.
                        </div>
                      </div>
                    </div>

                </div>

                <div class="py-3">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="github_link">Github link</label>
                          <input type="text" class="form-control" id="github_link" placeholder="" value="{{$contact->github_link}}" name="github_link" required>
                          <div class="invalid-feedback">
                            Valid url is required.
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="github_text">Github Text</label>
                          <input name="github_text" type="text" class="form-control" id="github_text" placeholder="" value="{{$contact->github_text}}" required>
                          <div class="invalid-feedback">
                            Valid text is required.
                          </div>
                        </div>
                      </div>

                      
                    <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="linkedin_link">linkedin link</label>
                          <input type="text" class="form-control" id="linkedin_link" placeholder="" value="{{$contact->linkedin_link}}" name="linkedin_link" required>
                          <div class="invalid-feedback">
                            Valid url is required.
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="linkedin_text">linkedin text</label>
                          <input name="linkedin_text" type="text" class="form-control" id="linkedin_text" placeholder="" value="{{$contact->linkedin_text}}" required>
                          <div class="invalid-feedback">
                            Valid text is required.
                          </div>
                        </div>
                      </div>


                    <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="instagram_link">instagram link</label>
                          <input type="text" class="form-control" id="instagram_link" placeholder="" value="{{$contact->instagram_link}}" name="instagram_link" required>
                          <div class="invalid-feedback">
                            Valid url is required.
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="instagram_text">instagram text</label>
                          <input name="instagram_text" type="text" class="form-control" id="instagram_text" placeholder="" value="{{$contact->instagram_text}}" required>
                          <div class="invalid-feedback">
                            Valid text is required.
                          </div>
                        </div>
                      </div>


                    <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="twitter_link">twitter link</label>
                          <input type="text" class="form-control" id="twitter_link" placeholder="" value="{{$contact->twitter_link}}" name="twitter_link" required>
                          <div class="invalid-feedback">
                            Valid url is required.
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="twitter_text">Twitter Text</label>
                          <input name="twitter_text" type="text" class="form-control" id="twitter_text" placeholder="" value="{{$contact->twitter_text}}" required>
                          <div class="invalid-feedback">
                            Valid text is required.
                          </div>
                        </div>
                      </div>
                </div>
         
               
                
               
               
               
                
    
                
                {{Form::hidden('_method','PUT')}}

    
                @csrf
                
               
                
                
                {{Form::submit('Update', ['class'=>'btn btn-success mt-5 text-capitalize ml-auto'])}}
            
    
    
               
    
            
            
            
            </form>
        </div>


        
        
    </div>
    
@endsection