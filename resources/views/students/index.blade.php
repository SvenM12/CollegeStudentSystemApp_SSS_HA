@extends('layouts.main')

@section('content')
<main class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header card-title">
                <div class="d-flex align-items-center">
                  <h2 class="mb-0">All Students</h2>
                  <div class="ml-auto">
                    <a href="{{ route('students.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New Student</a>
                  </div>
                </div>
              </div>
            <div class="card-body">
              
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone No</th>  
                    <th scope="col">Date of Birth</th>
                    <th scope="col">College</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($message = session('message'))
                    <div class="alert alert-success">{{ $message }}</div>
                  @endif 
                  @if ($students->count())
                    @foreach ($students as $index => $student)
                      <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->dob }}</td>
                        <td>{{ $student->college->name}}</td>
                        <td width="150">
                          <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                          <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                          <a href="{{ route('students.destroy', $student->id) }}" class="btn-delete btn btn-sm btn-circle btn-outline-danger" title="Delete"><i class="fa fa-times"></i></a>
                        </td>
                      </tr>
                    @endforeach
                    <form id="form-delete" method="POST" style="display: none">
                      @method('DELETE')
                      @csrf
                    </form>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection