@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    
                    <div class="row">
                        @foreach ($tasks as $task)
                            <div class="col-sm-6">
                                <div class="card my-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $task->title }}</h5>
                                        <p class="card-text">{{ $task->description }}</p>
                                        <p class="card-text text-danger text-bold">Deadline : {{ $task->end_at->format('l jS \\of F Y h:i A'); }}</p>
                                        <a href="#" class="btn btn-success btn-sm">Completed</a>
                                    </div>
                                </div>
                            </div>  
                        @endforeach
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
