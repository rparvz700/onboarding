@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2>Create New Onboarding Form Link</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.forms.store') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Employee Email Address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="recruitment_id" class="form-label">Recruitment ID (optional)</label>
            <input type="number" class="form-control" id="recruitment_id" name="recruitment_id">
        </div>
        <button type="submit" class="btn btn-primary">Create Form Link</button>
    </form>
</div>
@endsection
