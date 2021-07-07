        <li>
            <div class="task">
               {{ $name }}
            </div>
            <div class="action">
                <a href="{{route('editTask',['id'=>$id])}}"><i class="fa fa-edit"></i></a>
            </div>
            <div class="action">
                <a href="{{route('deleteTask',['id'=>$id])}}"><i class="fa fa-trash-alt"></i></a> 
            </div>
          </li>