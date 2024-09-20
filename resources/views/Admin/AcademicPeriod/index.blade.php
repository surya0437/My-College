<x-app-layout :PageTitle="'Academic Period'">

    <div class="col-sm-12">
        <div class="card">
            <div class="py-3 card-header d-flex align-items-center justify-content-between">
                <h4 class="card-title">Listed Academic Period</h4>
                <button type="button" class="btn btn-primary d-flex align-items-center justify-content-center"
                    data-bs-toggle="modal" data-bs-target="#AddAcademicPeriodModel">
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
                            @if ($academicPeriods)
                                @foreach ($academicPeriods as $index => $academicPeriod)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $academicPeriod->title }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $academicPeriod->status == 1 ? 'bg-success' : 'bg-warning' }} badge-shadow">
                                                {{ $academicPeriod->status == 1 ? 'Active' : 'In Active' }}
                                            </span>
                                        </td>
                                        <td>{{ $academicPeriod->created_at }}</td>
                                        <td>
                                            <a href="{{ route('academicPeriod.edit', $academicPeriod->id) }}"
                                                class="">
                                                <i class="text-primary fe fe-edit-3 h5"></i>
                                            </a>
                                            <a href="{{ route('academicPeriod.destroy', $academicPeriod->id) }}"
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
    <div class="modal fade" id="AddAcademicPeriodModel" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Academic Period</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('academicPeriod.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Academic Period Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            @error('title')
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
