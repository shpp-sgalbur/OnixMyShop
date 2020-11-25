<!-- Bootstrap 4 -->  
<nav aria-label="Статьи по Bootstrap 4">
  <ul class="pagination">
    <li class="page-item {{$res->first_disable}}">
      <a class="page-link" href="{{$res->first_page_url}}">
        Первая
      </a>
    </li>
    <li class="page-item {{$res->first_disable}}">
      <a class="page-link" href="{{$res->prev_page_url}}" aria-label="Предыдущая">
        <span aria-hidden="true">«</span>
        <span class="sr-only">Предыдущая</span>
      </a>
    </li>
<?php $i=0;  ?>
    @foreach($res->links as $btn)
        
        @if(is_int($btn->label))
            @if($btn->active)
                <li class="page-item active">
            @else
                <li class="page-item">
            @endif
            <a class="page-link" href="{{$btn->url}}">{{++$i}}</a>
            </li>
        @endif
        
    @endforeach
    <li class="page-item">
      <a class="page-link" href="{{$res->next_page_url}}" aria-label="Следующая">
        <span aria-hidden="true">»</span>
        <span class="sr-only">Следующая</span>
      </a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">
        Последняя
      </a>
    </li>
  </ul>
</nav>