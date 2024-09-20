<x-app-layout :PageTitle="'Assigned Subject'">

    <div class="col-sm-12">
        <div class="card">
            <div class="py-3 card-header d-flex align-items-center justify-content-between">
                <h4 class="card-title">Listed Assigned Subject</h4>
                <button type="button" class="btn btn-primary d-flex align-items-center justify-content-center"
                    data-bs-toggle="modal" data-bs-target="#AddAssignSubjectModel">
                    <img src="/assets/img/icons/plus1.svg" alt="img"><span>
                        Add New</span>
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datanew">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Teacher</th>
                                <th>Program</th>
                                <th>Academic Period</th>
                                <th>Subject</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($assignSubjects)
                                @foreach ($assignSubjects as $index => $assignSubject)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $assignSubject->employee->name }}</td>
                                        <td>{{ $assignSubject->program->title }}</td>
                                        <td>{{ $assignSubject->academicPeriod->title }}</td>
                                        <td>{{ $assignSubject->subject->name }}</td>
                                        <td>{{ $assignSubject->from }}</td>
                                        <td>{{ $assignSubject->to }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $assignSubject->status == 1 ? 'bg-success' : 'bg-warning' }} badge-shadow">
                                                {{ $assignSubject->status == 1 ? 'Active' : 'In Active' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('assignSubject.edit', $assignSubject->id) }}"
                                                class="">
                                                <i class="text-primary fe fe-edit-3 h5"></i>
                                            </a>
                                            <a href="{{ route('assignSubject.destroy', $assignSubject->id) }}"
                                                class="mx-3" data-confirm-delete="true">
                                                <i class="text-danger fe fe-trash-2 h5"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="AddAssignSubjectModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Assign Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('assignSubject.store') }}" method="post">
                        @csrf
                        <div class="col-md-12">
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

                        <div class="col-md-12">
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

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Academic Period <span class="text-danger">*</span></label>
                                <select class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true"
                                    name="academic_period_id">
                                    @foreach ($academicPeriods as $academicPeriod)
                                        @if ($subject->status == 1)
                                            <option value="{{ $academicPeriod->id }}">{{ $academicPeriod->title }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
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

                        <div class="form-group">
                            <label>From <span class="text-danger">*</span></label>
                            <input type="time" class="form-control" name="from" value="{{ old('from') }}">
                            @error('from')
                                <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>To <span class="text-danger">*</span></label>
                            <input type="time" class="form-control" name="to" value="{{ old('to') }}">
                            @error('to')
                                <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
