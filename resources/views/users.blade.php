@include('admin.header')

<div class="mt-8 text-2xl">
    <b>Users</b>
        
        
    </div>
<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    
    
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">email</th>            
            <th scope="col">role_id</th>
          </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role_id}}</td>
                    <td>
                        <form method="post" action="{{route('user_edit',['id'=>$user->id])}}">
                            @csrf
                            <input type="submit" class="btn btn-success" name="edit{{$user->id}}" value="edit">
                            <input type="submit" class="btn btn-danger" name="delete{{$user->id}}" value="delete">
                        </form>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
    
    
</div>