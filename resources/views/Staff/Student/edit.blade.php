<x-staff-app-layout :PageTitle="'Edit Student'">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('staff.student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Edit Student</h4>
                        <a href="{{ route('staff.student.index') }}" type="button"
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
                                <input type="text" class="form-control" name="name" value="{{ $student->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="phone" value="{{ $student->phone }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" value="{{ $student->email }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Address<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="address"
                                    value="{{ $student->address }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Date of Birth<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="date_of_birth"
                                    value="{{ $student->date_of_birth }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Program <span class="text-danger">*</span></label>
                                <select class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true"
                                    name="program_id">
                                    @foreach ($programs as $program)
                                        @if ($program->status == 1)
                                            <option value="{{ $program->id }}"
                                                {{ $program->id == $student->program_id ? 'selected' : '' }}>
                                                {{ $program->title }}</option>
                                        @endif
                                    @endforeach
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
                                            {{-- @if ($shift->id == $student->shift_id)
                                                <option value="{{ $shift->id }}" selected>{{ $shift->title }}
                                                </option>
                                            @else
                                                <option value="{{ $shift->id }}">{{ $shift->title }}</option>
                                            @endif --}}
                                            <option value="{{ $shift->id }}" {{ $shift->id == $student->shift_id ? 'selected' : '' }}>{{ $shift->title }}</option>
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
                                <td><img src="{{ asset($student->image) }}" alt="Student Image" class="rounded"
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
</x-staff-app-layout>
