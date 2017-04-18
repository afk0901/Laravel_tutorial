<!DOCTYPE html>
<html>
<head></head>
<body>
<h1>TO DO LIST!</h1>

<ul>


@foreach ($tasks as $task)<!--Foreach id then...-->

    <li>
   <a href="/tasks/{{$task->id}}"><!--A link with the id-->

   	{{$task->body}}</a> <!--As tasks contains all our ids then we ask for the title of each id-->

    </li>

@endforeach

{{$idone}}



</ul>

</body>
</html>
