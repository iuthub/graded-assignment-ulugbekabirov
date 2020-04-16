 <form action="{{route('addTask')}}" method="post">
 			@csrf
            <div id="myDIV" class="header">
              <h2>My To Do List</h2>
              <input type="text" name="name" placeholder="Title...">
              <button type="submit" class="addBtn">Add</button>
            </div>
</form>