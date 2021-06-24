
@if(count($errors->all()) > 0)
    <div class="py-2">
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{$error}}
        
    
        </div>
            
        @endforeach

    </div>

@endif



 @if (session('success'))
    <div class="py-2 ">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session('success')}}
        
        
        </div>
            

    </div> 

 @endif



 @if (session('error'))
    <div class="py-2">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session('error')}}
        
        
        </div>
            

    </div>
 
 @endif
 