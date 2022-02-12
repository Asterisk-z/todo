<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TODO APP</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body>

        <div class="container">
            <div class="jumbotron mt-5 text-center">
                <div class="container">
                    <h1 class="display-4">Welcome To My Todo App</h1>
                    <p class="lead">We are here to give you the best experience </p>
                    <hr class="my-4">
                    @auth
                        <a class="btn btn-primary btn-sm" href="{{ url('/home') }}" role="button">View Personal Tasks</a>
                    @else
                        <a class="btn btn-primary btn-sm" href="{{ url('/login') }}" role="button">Get Started Here</a>
                    @endauth
                    <hr class="my-4">
                    <div class="row">
                        @foreach ($generalTasks as $task)
                            <div class="col-sm-6">
                                <div class="card my-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $task->title }}</h5>
                                        <p class="card-text">{{ $task->description }}</p>
                                        <span class="badge badge-info text-uppercase">user : {{ $task->user->name }}</span>
                                        <p class="card-text text-danger text-bold">Deadline : {{ $task->end_at->setTimezone($timezone)->format('l jS \\of F Y h:i A'); }}</p>
                                    </div>
                                </div>
                            </div>  
                        @endforeach

                        {{ $generalTasks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </body>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>
