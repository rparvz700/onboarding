@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2>All Onboarding Form Links</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Code</th>
                <th>Status</th>
                <th>Recruitment ID</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($forms as $form)
            <tr>
                <td>{{ $form->id }}</td>
                <td>{{ $form->email }}</td>
                <td>{{ $form->code }}</td>
                <td>
                    @if($form->status == 1) New @elseif($form->status == 2) Draft @elseif($form->status == 3) Submitted @else Unknown @endif
                </td>
                <td>{{ $form->recruitment_id }}</td>
                <td>{{ $form->created_at }}</td>
                <td>{{ $form->updated_at }}</td>
                <td>
                    @if($form->status == 3)
                        <a href="{{ route('admin.forms.view', ['id'=>$form->id,'mode'=>'edit']) }}" class="btn btn-warning btn-sm">Edit</a>
                    @elseif($form->status == 2)
                        <a href="{{ route('admin.forms.view', ['id'=>$form->id,'mode'=>'view']) }}" class="btn btn-info btn-sm">View</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.forms.create') }}" class="btn btn-primary">Create New Form Link</a>
</div>
@endsection
