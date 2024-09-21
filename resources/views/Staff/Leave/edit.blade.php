<x-staff-app-layout :PageTitle="'Edit Leave'">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('staff.leave.update', $leave->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Update Leave</h4>
                        <a href="{{ route('staff.leave.index') }}" type="button"
                            class="btn btn-primary d-flex align-items-center justify-content-between">
                            <i class="fa fa-arrow-left" style="margin-right: 10px;"></i>
                            <p>
                                Back</p>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Leave Type <span class="text-danger">*</span></label>
                                <select class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true"
                                    name="leave_type">
                                    <option value="Annual Leave"
                                        {{ $leave->leave_type == 'Annual Leave' ? 'selected' : '' }}>Annual Leave
                                    </option>
                                    <option value="Sick Leave"
                                        {{ $leave->leave_type == 'Sick Leave' ? 'selected' : '' }}>Sick Leave</option>
                                    <option value="Maternity Leave"
                                        {{ $leave->leave_type == 'Maternity Leave' ? 'selected' : '' }}>Maternity Leave
                                    </option>
                                    <option value="Paternity Leave"
                                        {{ $leave->leave_type == 'Paternity Leave' ? 'selected' : '' }}>Paternity
                                        Leave</option>
                                    <option value="Casual Leave"
                                        {{ $leave->leave_type == 'Casual Leave' ? 'selected' : '' }}>Casual Leave
                                    </option>
                                    <option value="Compensatory Leave"
                                        {{ $leave->leave_type == 'Compensatory Leave' ? 'selected' : '' }}>Compensatory
                                        Leave</option>
                                    <option value="Unpaid Leave"
                                        {{ $leave->leave_type == 'Unpaid Leave' ? 'selected' : '' }}>Unpaid Leave
                                    </option>
                                    <option value="Study Leave"
                                        {{ $leave->leave_type == 'Study Leave' ? 'selected' : '' }}>Study Leave</option>
                                    <option value="Bereavement Leave"
                                        {{ $leave->leave_type == 'Bereavement Leave' ? 'selected' : '' }}>Bereavement
                                        Leave</option>
                                    <option value="Emergency Leave"
                                        {{ $leave->leave_type == 'Emergency Leave' ? 'selected' : '' }}>Emergency Leave
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Start Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="start_date"
                                    value="{{ $leave->start_date }}">
                                @error('start_date')
                                    <p class="mt-1 text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>End Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="end_date"
                                    value="{{ $leave->end_date }}">
                                @error('end_date')
                                    <p class="mt-1 text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label>Author Status <span class="text-danger">*</span></label>
                                <select class="select select2-hidden-accessible" tabindex="-1"
                                    aria-hidden="true" name="status">
                                    <option value="Pending" {{ $leave->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Approved"{{ $leave->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="Rejected"{{ $leave->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ $leave->status }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">

                            <div class="form-group">
                                <label>Reason <span class="text-danger">*</span></label>
                                <textarea type="text" class="form-control" name="reason">{{ $leave->reason }}</textarea>
                                @error('reason')
                                    <p class="mt-1 text-danger">{{ $message }}</p>
                                @enderror
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
