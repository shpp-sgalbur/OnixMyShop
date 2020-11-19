@include('admin.header')
<div>
    <div class="mt-8 ml-12 text-2xl mx-auto text-center">
     
      <b>Create categiry</b><br>
    
</div>
</div>


<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    
    
    <form class="mx-auto" action="/category/store" method='post'>
        @csrf
        @method('POST')
        
        <div class="form-group">
          <label for="exampleInputPassword1">name</label>
          <input type="text" class="form-control" name="name" value="">
        </div>
        
        <div class="form-group">
          <label for="exampleInputPassword1">slug</label>
          <input type="text" class="form-control" name="slug" value="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">parent_id</label>
          <input type="text" class="form-control" name="parent_id" a value="">          
        </div>
        <input type="submit" class=" btn btn-primary" name="edit" value="Save">
        
        <a href="{{route('categories')}}" class="btn btn-outline-primary">
            <input class="btn btn-outline-primary" name="cancel" value="Cancel">
        </a>
        
      </form>
    
    
</div>