@include('admin.header')
<div>
    <div class="mt-8 ml-12 text-2xl mx-auto text-center">
     
      <b>Edit User id {{$id}}</b><br>
    
</div>
</div>


<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    
    <div class="mx-auto">
        <form id="update" action="/user/{{$id}}/update" method='post'>
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
        <input type="hidden" class="form-control" name="id" value="{{$id}}">
        </form>
        <button type="submit" class="btn btn-primary" form="update" >Save</button>
        
        <button type="submit" form='cancel' class="btn btn-outline-primary" form="cancel" formaction="/admin">
            
            Cancel
        </button>
      
        <form class="mx-auto" action="/admin" id="cancel" >
            @csrf
            @method('GET')
        </form>
    </div>
    
    
    
</div>
