@include('admin.header')
<div>
    <div class="mt-8 ml-12 text-2xl mx-auto text-center">
     
      
    <b>User id {{$id}}</b>
</div>
</div>


<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    
    <div class="mx-auto">
        <form  action="/user/{{$id}}/edit" method='post' id="edit">
        @csrf
        @method('POST')
        <div class="form-group" >
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control"  name="email" value="{{$email}}" readonly>
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">name</label>
          <input type="text" class="form-control" name="name" value="{{$name}}" readonly>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Phone</label>
          <input type="text" class="form-control" name="phone" a value="{{$phone}}" readonly>
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Role id</label>
          <input type="text" class="form-control" name="role_id" value="{{$role_id}}" readonly>
        </div>
        <input type="hidden" class="form-control" name="id" value="{{$id}}">
        
        
        </form>
        <button type="submit" class="btn btn-primary" form="edit">Back</button>
        <button type="submit" class="btn btn-outline-primary" form="cancel">Cancel</button>
        <form class="mx-auto" action="/admin" id="cancel" >
                @csrf
                @method('GET')
                
        </form>
    </div>
    
            
        
    
    
</div>
