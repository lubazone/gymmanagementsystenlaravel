@extends('layouts.adminApp')

@section('title', 'Gym Management System - CreateNotice')

@section('content')
<div class="container">
  <h1>Create Notice</h1>
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <form action="{{ route('notices.store') }}" method="POST">
      @csrf
      <div class="mb-3">
          <label for="text" class="form-label">Text</label>
          <input type="text" class="form-control" id="text" name="text" value="{{ old('text') }}" required>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
  </form>
</div>
@endsection