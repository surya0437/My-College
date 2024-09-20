<x-app-layout :PageTitle="'Edit Employee'">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Edit Employee</h4>
                        <a href="{{ route('employee.index') }}" type="button"
                            class="btn btn-primary d-flex align-items-center justify-content-between">
                            <i class="fa fa-arrow-left" style="margin-right: 10px;"></i>
                            <p>
                                Back</p>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" value="{{ $employee->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="phone"
                                    value="{{ $employee->phone }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ $employee->email }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Address<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="address"
                                    value="{{ $employee->address }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Date of Birth<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="date_of_birth"
                                    value="{{ $employee->date_of_birth }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Education<span class="text-danger">*</span></label>
                                <input type="education" class="form-control" name="education" value="{{ $employee->education }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Specialization<span class="text-danger">*</span></label>
                                <input type="specialization" class="form-control" name="specialization" value="{{ $employee->specialization }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Role <span class="text-danger">*</span></label>
                                <select class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true"
                                    name="role">
                                    <option value="Teacher" {{ $employee->role == 'Teacher' ? 'selected' : '' }}>Teacher
                                    </option>
                                    <option value="Accountant" {{ $employee->role == 'Accountant' ? 'selected' : '' }}>
                                        Accountant</option>
                                    <option value="Librarian" {{ $employee->role == 'Librarian' ? 'selected' : '' }}>
                                        Librarian</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Shift <span class="text-danger">*</span></label>
                                <select class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true"
                                    name="shift_id">
                                    @foreach ($shifts as $shift)
                                        @if ($shift->status == 1)
                                            <option value="{{ $shift->id }}"
                                                {{ $shift->id == $employee->shift_id ? 'selected' : '' }}>
                                                {{ $shift->title }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <td><img src="{{ asset($employee->image) }}" alt="employee Image" class="rounded"
                                        style="width: 100px;"></td>
                            </div>
                        </div>

                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
