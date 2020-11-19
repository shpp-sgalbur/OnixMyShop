@include('admin.header')
<div>
    <div class="mt-8 ml-12 text-2xl mx-auto text-center">
     
      <b>Edit User id {{$id}}</b><br>
    
</div>
</div>


<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    
    
    <form class="mx-auto" action="/user/{{$id}}/update" method='post'>
        @csrf
        @method('POST')
        <div class="form-group" >
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control"  name="email" value="{{$email}}">
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">name</label>
          <input type="text" class="form-control" name="name" value="{{$name}}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Phone</label>
          <input type="text" class="form-control" name="phone" a value="{{$phone}}">
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Role id</label>
          <input type="text" class="form-control" name="role_id" value="{{$role_id}}">
        </div>
        <input type="submit" class=" btn btn-primary" name="edit" value="Save">
        
        <a href="{{route('users')}}" class="btn btn-outline-primary">
            <input class="btn btn-outline-primary" name="cancel" value="Cancel">
        </a>
        
      </form>
    
    
</div>
