<x-app-layout :PageTitle="'Edit Shift'">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('shift.update', $shift->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Update Shift</h4>
                        <a href="{{ route('shift.index') }}" type="button" class="btn btn-primary d-flex align-items-center justify-content-between">
                            <i class="fa fa-arrow-left" style="margin-right: 10px;"></i><p>
                               Back</p>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Shift Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" value="{{ $shift->title }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Shift In Time<span class="text-danger">*</span></label>
                                <input type="time" class="form-control" name="in_time" value="{{ $shift->in_time }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Shift Out Time<span class="text-danger">*</span></label>
                                <input type="time" class="form-control" name="out_time" value="{{ $shift->out_time }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Shift Status <span class="text-danger">*</span></label>
                                <select class="select select2-hidden-accessible" tabindex="-1"
                                    aria-hidden="true" name="status">
                                    <option value="1" {{ $shift->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0"{{ $shift->status == 0 ? 'selected' : '' }}>Inactive</option>
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
