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
            @foreach($categories->data as $category)
                
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>{{$category->parent_id}}</td>
                    <td>
                        <form method="post" action="{{route('category_edit',['id'=>'$category->id',false])}}">
                            @csrf
                            @method('POST')
                            <input type="submit" class="btn btn-success" name="edit{{$category->id}}" value="edit">
                            
                        </form>
                    </td>
                    <td>
                        <form method="get" action="{{route('category_delete',['id'=>$category->id],false)}}">
                            @csrf
                            @method('get')
                            <input type="submit" class="btn btn-danger" name="delete{{$category->id}}" value="delete">
                        </form>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
    @include('pagination')
    <form method="get" action="{{route('category_create',false)}}">        
        <button type="submit" class="btn btn-primary btn-lg btn-block grid-cols-1 md:grid-cols-2">Создать новую категорию</button>
    
    </form>
    
</div>
