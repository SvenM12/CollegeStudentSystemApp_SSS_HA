<div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group row">
          <label for="name" class="col-md-3 col-form-label">College Name</label>
          <div class="col-md-9">
            <input type="text" name="name" id="name" value="{{ old('name', $college->name) }}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="name" class="col-md-3 col-form-label">Address</label>
          <div class="col-md-9">
            <textarea name="address" id="address" rows="3" class="form-control @error('address') is-invalid @enderror">
              {{ old('address', $college->address) }}
            </textarea>
            @error('address')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <hr>
        <div class="form-group row mb-0">
          <div class="col-md-9 offset-md-3">
              <button type="submit" class="btn btn-primary">Save</button>
              <a href="{{ route('colleges.index') }}" class="btn btn-outline-secondary">Cancel</a>
          </div>
        </div>
      </div>
    </div>
  </div>