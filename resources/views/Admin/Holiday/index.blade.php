<x-app-layout :PageTitle="'Holiday'">

    <div class="col-sm-12">
        <div class="card">
            <div class="py-3 card-header d-flex align-items-center justify-content-between">
                <h4 class="card-title">Listed Holiday</h4>
                <button type="button" class="btn btn-primary d-flex align-items-center justify-content-center"
                    data-bs-toggle="modal" data-bs-target="#AddHolidayModel">
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
                                <th>Date</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($holidays)
                                @foreach ($holidays as $index => $holiday)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $holiday->date }}</td>
                                        <td>{{ $holiday->title }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $holiday->status == 1 ? 'bg-success' : 'bg-warning' }} badge-shadow">
                                                {{ $holiday->status == 1 ? 'Active' : 'In Active' }}
                                            </span>
                                        </td>
                                        <td>{{ $holiday->created_at }}</td>
                                        <td>
                                            {{-- <a href="{{ route('holiday.edit', $holiday->id) }}" class="">
                                                <i class="text-primary fe fe-edit-3 h5"></i>
                                            </a> --}}
                                            <a href="{{ route('holiday.destroy', $holiday->id) }}" class="mx-3"
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
    <div class="modal fade" id="AddHolidayModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Holiday</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('holiday.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Holiday Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="date" value="{{ old('date') }}">
                            @error('date')
                                <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Holiday Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            @error('title')
                                <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Holiday Description</label>
                            <textarea type="text" class="form-control" name="description">{{ old('description') }}</textarea>
                            @error('description')
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
