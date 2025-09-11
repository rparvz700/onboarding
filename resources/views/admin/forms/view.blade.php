@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2>View Onboarding Form Link</h2>
    <div class="card mt-3">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Employee Email Address</label>
                <input type="email" class="form-control" value="{{ $form->email }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Form Link Code</label>
                <input type="text" class="form-control" value="{{ $form->code }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Recruitment ID</label>
                <input type="text" class="form-control" value="{{ $form->recruitment_id }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <input type="text" class="form-control" value="@if($form->status == 1) New @elseif($form->status == 2) Draft @elseif($form->status == 3) Submitted @else Unknown @endif" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Created At</label>
                <input type="text" class="form-control" value="{{ $form->created_at }}" readonly>
            </div>
        </div>
    </div>
    <a href="{{ route('admin.forms.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
