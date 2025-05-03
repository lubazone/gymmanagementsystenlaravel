@extends('layouts.adminApp')

@section('title', 'Gym Management System - Add Schedule')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="my-4">Create Schedule</h1>

      <!-- Display validation errors -->
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <!-- Success message after updating equipment -->
      @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif

      <form action="{{ route('schedules.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="day">Day</label>
          <input type="text" name="day" id="day" class="form-control" value="{{ old('day') }}" required>
        </div>

        <div class="form-group">
          <label for="time">Time</label>
          <input type="text" name="time" id="time" class="form-control" value="{{ old('time') }}" required>
        </div>

        <div class="form-group">
          <label for="usertype">User Type</label>
          <select name="usertype" id="usertype" class="form-control" required>
            <option value="man" {{ old('usertype') == 'man' ? 'selected' : '' }}>Man</option>
            <option value="woman" {{ old('usertype') == 'woman' ? 'selected' : '' }}>Woman</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
      </form>
    </div>
  </div>
</div>
@endsection