@extends('layouts.adminApp')

@section('title', 'Gym Management System - NoticeManage')

@section('content')
<style>
  .action-btn-wrapper {

    display: flex;
    gap: 10px;
    justify-content: center;

  }

  .btn-inner {
    display: flex;
    gap: 4px;
    align-items: center;
    /* flex-wrap: nowrap; */
  }
</style>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 dashboard-section" id="members-section">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
          <h6 class="m-0 font-weight-bold text-primary">Notice Table</h6>
          <div class="d-flex">
            <a href="{{route('notices.create')}}" class="btn btn-success btn-sm ms-5">Add New</a>
          </div>
        </div>
        <!-- Table -->
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover text-center" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Notice</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($notices as $notice)
              <tr>
                  <td>{{ $notice->id }}</td>
                  <td>{{ $notice->text }}</td>
                  <td>
                      <a href="{{ route('notices.edit', $notice) }}" class="btn btn-warning btn-sm">Edit</a>
                      <form action="{{ route('notices.destroy', $notice) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                  </td>
              </tr>
          @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection