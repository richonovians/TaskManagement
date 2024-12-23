@extends('index')

@section('content')

<h4>Edit Task</h4>

<form action="{{ route('task.update', $task->id) }}" method="post">
    @csrf
    <label>Nama Task</label>
    <input type="text" name="title" value="{{ $task->title }}" class="form-control mb-2">
    
    <label>Deskripsi</label>
    <input type="text" name="description" value="{{ $task->description }}" class="form-control mb-2">
    
    <label>Status</label>
    <select name="status" class="form-control mb-2">
        <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
        <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
    </select>
    
    <label>Due Date</label>
    <input type="date" name="due_date" value="{{ $task->due_date }}" class="form-control mb-2">
    
    <!-- <label>User ID</label>
    <input type="text" name="user_id" value="{{ $task->user_id }}" class="form-control mb-2">  -->

    <button class="btn btn-primary">Edit</button>

</form>

@endsection
