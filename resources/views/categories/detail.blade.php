@extends('index')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Category Detail</h1>
        <div class="card shadow-lg mt-3">
            <div class="card-body">
                <h5 class="card-title mb-3 text-primary">Name: <span class="text-dark">{{ $category->name }}</span></h5>
                <p class="card-text mb-3"><strong>Slug:</strong> <span class="text-muted">{{ $category->slug }}</span></p>
                <p class="card-text"><strong>Description:</strong> <span class="text-secondary">{{ $category->description }}</span></p>
                <a href="{{ route('categories.show') }}" class="btn btn-outline-primary mt-3">Back to List</a>
            </div>
        </div>
    </div>
@endsection
