<x-app-layout :PageTitle="'Edit Program'">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('program.update', $program->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Update Program</h4>
                        <a href="{{ route('program.index') }}" type="button" class="btn btn-primary d-flex align-items-center justify-content-between">
                            <i class="fa fa-arrow-left" style="margin-right: 10px;"></i><p>
                               Back</p>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Program Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" value="{{ $program->title }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Program Status <span class="text-danger">*</span></label>
                                <select class="select select2-hidden-accessible" tabindex="-1"
                                    aria-hidden="true" name="status">
                                    <option value="1" {{ $program->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0"{{ $program->status == 0 ? 'selected' : '' }}>Inactive</option>
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
