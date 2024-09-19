<x-app-layout :PageTitle="'Edit Rack'">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('rack.update', $rack->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Update Rack</h4>
                        <a href="{{ route('rack.index') }}" type="button" class="btn btn-primary d-flex align-items-center justify-content-between">
                            <i class="fa fa-arrow-left" style="margin-right: 10px;"></i><p>
                               Back</p>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Rack No.<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="rackNo" value="{{ $rack->rackNo }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Rack Status <span class="text-danger">*</span></label>
                                <select class="select select2-hidden-accessible" tabindex="-1"
                                    aria-hidden="true" name="status">
                                    <option value="1" {{ $rack->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0"{{ $rack->status == 0 ? 'selected' : '' }}>Inactive</option>
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
