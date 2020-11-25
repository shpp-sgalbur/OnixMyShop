@include('admin.header')

<div class="mt-8 text-2xl">
    <b>Categories</b>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    
    
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">slug</th>            
            <th scope="col">parent_id</th>
          </tr>
        </thead>
        <tbody>
            @foreach($res->data as $category)
                
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>{{$category->parent_id}}</td>
                    
                </tr>

            @endforeach
        </tbody>
    </table>
   

    @include('pagination')
   
    
</div>

