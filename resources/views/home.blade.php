<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Backbone Todo List</title>

    <!-- Fonts -->


    <!-- Styles -->


</head>
<body>
    <h1>My Tasks</h1>
    <form id="addTask" action="">
        <input id="newTask" type="text" placeholder="What do you need to do?">
        <input type="submit" value="Add task">
    </form>

    <div id="tasks">
        <script type="text/template" id="taskTemplate">
            <span><%= description %></span> <button class="edit">Edit</button> <button class="delete">Delete</button>
        </script>
    </div>


<!-- JavaScripts -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.2.3/backbone-min.js"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/models.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/collections.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/views.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/router.js') }}"></script>

<script>
    new App.Router;
    Backbone.history.start();

    App.tasks = new App.Collections.Tasks;
    App.tasks.fetch().then(function() {
         new App.Views.App({ collection: App.tasks });
    });
</script>
</body>
</html>