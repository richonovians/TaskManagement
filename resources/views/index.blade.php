<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<x-app-layout>
    <div class="d-flex mb-3">
        <div class="ms-auto">
            <a class="btn btn-success" href="{{ route('task.add' )}}">Tambah Task</a>
        </div>
    </div>

    <!-- Dropdown filter status -->
    <div class="mb-3">
        <form action="{{ route('task.show') }}" method="GET" class="d-inline">
            <label for="statusFilter" class="form-label">Kategori:</label>
            <select name="status" id="statusFilter" class="form-select w-auto d-inline" onchange="this.form.submit()">
                <option value="all" {{ $selectedStatus == 'all' ? 'selected' : '' }}>Semua</option>
                <option value="pending" {{ $selectedStatus == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ $selectedStatus == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ $selectedStatus == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </form>
    </div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Task List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nama Task</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($task as $data)
                <tr>
                    <td>{{ $data->title }}</td>
                    <td>{{ $data->description }}</td>
                    <td>{{ $data->status }}</td>
                    <td>{{ $data->due_date }}</td>
                    <td>
                        <a href="{{ route('task.detail', $data->id) }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="{{ route('task.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('task.delete', $data->id) }}" method="post" class="d-inline">
                            @csrf
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

