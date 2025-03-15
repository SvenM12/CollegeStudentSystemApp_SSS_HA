@extends('layouts.main')

@section('content')
<main class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header card-title">
                <div class="d-flex align-items-center">
                  <h2 class="mb-0">All Colleges</h2>
                  <div class="ml-auto">
                    <a href="{{ route('colleges.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New College</a>
                  </div>
                </div>
              </div>
            <div class="card-body">
              
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($message = session('message'))
                    <div class="alert alert-success">{{ $message }}</div>
                  @endif 
                  @if ($colleges->count())
                    @foreach ($colleges as $index => $college)
                      <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $college->name }}</td>
                        <td>{{ $college->address }}</td>
                        <td width="150">
                          <a href="{{ route('colleges.edit', $contact->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                          <a href="{{ route('colleges.destroy', $contact->id) }}" class="btn-delete btn btn-sm btn-circle btn-outline-danger" title="Delete"><i class="fa fa-times"></i></a>
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