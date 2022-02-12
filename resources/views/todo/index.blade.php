@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <span>{{ __('My Personal Tasks') }}</span>
                    <a href="#" class="btn btn-primary btn-sm float-end"  data-bs-toggle="modal" data-bs-target="#addTask">Add task</a>
                </div>

                <div class="card-body">
                    
                    <div class="row">
                        @foreach ($mytasks as $task)
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

                            
                            <div class="modal fade" id="endTask{{ $task->id }}" tabindex="-1" aria-labelledby="endTask{{ $task->id }}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="endTask{{ $task->id }}Label">New Tasks</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('mytasks.update', $task->id) }}" method="post">
                                                @csrf 
                                                @method('put')
                                                <div class="mb-3">
                                                    <input type="hidden" class="form-control input-sm" value="{{ $task->id }}" id="id" required name="id">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="title" class="col-form-label">Title</label>
                                                    <input type="text" class="form-control input-sm" value="{{ $task->title }}" id="title" required name="title">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="description" class="col-form-label">Description</label>
                                                    <textarea class="form-control input-sm" id="description" name="description"> {{ $task->description }}</textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label for="deadline" class="col-form-label">Deadline</label>
                                                        <input type="date" class="form-control input-sm" value="{{ $task->end_at }}" id="deadline" required name="endDate">
                                                    </div>
                                                    <div class="mb-3  col-md-6">
                                                        <label for="taskType" class="col-form-label">Task Type</label>
                                                        
                                                        <select class="form-control input-sm" value="{{ $task->title }}" name="taskType" id="taskType">
                                                            <option value="yes">Public</option>
                                                            <option value="no"  {{ $task->isPublic == 'no' ? 'selected' : '' }}>Local</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                                            </form>
                                        </div>
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


<div class="modal fade" id="addTask" tabindex="-1" aria-labelledby="addTaskLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTaskLabel">New Tasks</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('mytasks.store') }}" method="post">
                    @csrf 
                    <div class="mb-3">
                        <label for="title" class="col-form-label">Title</label>
                        <input type="text" class="form-control" id="title" required name="title">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="col-form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="deadline" class="col-form-label">Deadline</label>
                            <input type="date" class="form-control" id="deadline" required name="endDate">
                        </div>
                        <div class="mb-3  col-md-6">
                            <label for="taskType" class="col-form-label">Task Type</label>
                            
                            <select class="form-control" name="taskType" id="taskType">
                                <option value="yes">Public</option>
                                <option value="no">Local</option>
                            </select>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
