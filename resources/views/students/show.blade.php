@extends('layouts.main')

@section('content')
  <main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-title">
              <strong>Student Details</strong>
            </div>           
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="first_name" class="col-md-3 col-form-label">Student Name</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $student->name }}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label">Email</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $student->email }}</p>
                    </div>

                    <label for="first_name" class="col-md-3 col-form-label">Phone Number</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $student->phone }}</p>
                    </div>

                    <label for="first_name" class="col-md-3 col-form-label">Date of Birth</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $student->dob }}</p>
                    </div>

                    <label for="first_name" class="col-md-3 col-form-label">College Name</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $student->college->name }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection