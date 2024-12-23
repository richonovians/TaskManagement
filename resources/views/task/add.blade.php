@extends('index')

@section('content')

<h4>Tambah Task</h4>

<form action="{{ route('task.submit') }}" method="post">
    @csrf
    <label>Nama Task</label>
    <input type="text" name="title" class="form-control mb-2">
       
    <label>Deskripsi</label>
    <input type="text" name="description" class="form-control mb-2">
    
    <label>Status</label>
    <select name="status" class="form-control mb-2">
        <option value="pending">Pending</option>
        <option value="in_progress">In Progress</option>
        <option value="completed">Completed</option>
    </select>
    
    <label>Due Date</label>
    <input type="date" name="due_date" class="form-control mb-2" value="{{ old('due_date') }}">
    
    <!-- <label>User ID</label>
    <input type="text" name="user_id" class="form-control mb-2">  -->

    <button class="btn btn-primary">Tambah</button>
</form>

@endsection
