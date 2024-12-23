@extends('index')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Detail Task</h4>
    </div>
    <div class="card-body">
        <p><strong>Nama Task:</strong> {{ $task->title }}</p>
        <p><strong>Deskripsi:</strong> {{ $task->description }}</p>
        <p><strong>Status:</strong> {{ $task->status }}</p>
        <p><strong>Tanggal:</strong> {{ $task->due_date }}</p>
        <a href="{{ route('task.show') }}" class="btn btn-primary">Kembali ke daftar</a>
    </div>
</div>

@endsection
