<x-app-layout :PageTitle="'Edit Assigned Subject'">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('assignSubject.update', $assignSubject->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Update Assigned Subject</h4>
                        <a href="{{ route('assignSubject.index') }}" type="button"
                            class="btn btn-primary d-flex align-items-center justify-content-between">
                            <i class="fa fa-arrow-left" style="margin-right: 10px;"></i>
                            <p>Back</p>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Teacher <span class="text-danger">*</span></label>
                                <select class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true"
                                    name="employee_id">
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Program <span class="text-danger">*</span></label>
                                <select class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true"
                                    name="program_id">
                                    @foreach ($programs as $programs)
                                        <option value="{{ $programs->id }}">{{ $programs->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Academic Period <span class="text-danger">*</span></label>
                                <select class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true"
                                    name="academic_period_id">
                                    @foreach ($academicPeriods as $academicPeriod)
                                        <option value="{{ $academicPeriod->id }}">{{ $academicPeriod->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Subject <span class="text-danger">*</span></label>
                                <select class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true"
                                    name="subject_id">
                                    @foreach ($subjects as $subject)
                                        @if ($subject->status == 1)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>From <span class="text-danger">*</span></label>
                                <input type="time" class="form-control" name="from"
                                    value="{{ $assignSubject->from }}">
                                @error('from')
                                    <p class="mt-1 text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>To <span class="text-danger">*</span></label>
                                <input type="time" class="form-control" name="to"
                                    value="{{ $assignSubject->to }}">
                                @error('to')
                                    <p class="mt-1 text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                <select class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true"
                                    name="status">
                                    <option value="1" {{ $assignSubject->status == 1 ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="0"{{ $assignSubject->status == 0 ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
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
