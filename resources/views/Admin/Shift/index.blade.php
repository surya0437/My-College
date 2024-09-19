<x-app-layout :PageTitle="'Shift'">

    <div class="col-sm-12">
        <div class="card">
            <div class="py-3 card-header d-flex align-items-center justify-content-between">
                <h4 class="card-title">Listed Shift</h4>
                <button type="button" class="btn btn-primary d-flex align-items-center justify-content-center"
                    data-bs-toggle="modal" data-bs-target="#AddshiftModel">
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
                                <th>Title</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($shifts)
                                @foreach ($shifts as $index => $shift)

                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $shift->title }}</td>
                                        <td>
                                            <span
                                                    class="badge {{ $shift->status == 1 ? 'bg-success' : 'bg-warning' }} badge-shadow">
                                                    {{ $shift->status == 1 ? 'Active' : 'In Active' }}
                                                </span>
                                        </td>
                                        <td>{{ $shift->created_at }}</td>
                                        <td>
                                            <a href="{{ route('shift.edit', $shift->id) }}" class="">
                                                <i class="text-primary fe fe-edit-3 h5"></i>
                                            </a>
                                            <a href="{{ route('shift.destroy', $shift->id) }}" class="mx-3"
                                                data-confirm-delete="true">
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
    <div class="modal fade" id="AddshiftModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Shift</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('shift.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Shift Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            @error('title')
                                <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Shift In Time <span class="text-danger">*</span></label>
                            <input type="time" class="form-control" name="in_time" value="{{ old('in_time') }}">
                            @error('in_time')
                                <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Shift Out Time <span class="text-danger">*</span></label>
                            <input type="time" class="form-control" name="out_time" value="{{ old('out_time') }}">
                            @error('out_time')
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
