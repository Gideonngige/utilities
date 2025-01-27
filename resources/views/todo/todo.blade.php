<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>todo-app</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/todo.css') }}">
</head>
<body>
    <div class="container">
        <h3>ToDo App</h3><hr>
        @if(isset($message))
            <div class="alert alert-success" id="message">
                {{ $message }}
            </div>
        @endif
        <section class="add-task">
            <form method="post" action="{{ route('addtask') }}">
                @csrf
            <table width="100%">
                <tr>
                    <td>
                        <input type="text" class="form-control" placeholder="Add a new task" name="task" id="task" required>
                    </td>
                    <td>
                        <button class="btn btn-custom" id="add-task">ADD</button>
                    </td>
                </tr>
            </table>
        </form>
        </section>
        @if(isset($todos))
        @php $count = 0; @endphp
        @foreach ($todos as $todo)
        @php $count++; @endphp
        <div class="task-list">
            
            <table width="100%">
                <tr>
                    <td><p>{{$count}}. {{$todo->todolist_name}}</p> </td>
                    <td>
                        <form method="post" action="{{ route('deletetask',$todo->todolist_id)}}">
                            @csrf
                        <button type="submit" class="btn btn-danger" style="float:right;">DELETE</button>
                        </form>

                    </td>
                </tr>
            </table>
        </div>
        @endforeach
        @endif

    </div>

    <script>
        setTimeout(() => {
            document.getElementById('message').style.display = 'none';
        }, 3000);
    </script>
    
</body>
</html>