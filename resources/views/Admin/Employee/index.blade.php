<x-app-layout :PageTitle="'Employee'">

    <div class="col-sm-12">
        <div class="card">
            <div class="py-3 card-header d-flex align-items-center justify-content-between">
                <h4 class="card-title">Listed Employee</h4>
                <a href="{{ route('employee.create') }}" class="btn btn-primary d-flex align-items-center justify-content-center">
                    <img src="/assets/img/icons/plus1.svg" alt="img"><span>
                        Add New</span>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datanew">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Shift</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($employees)
                                @foreach ($employees as $index => $employee)

                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td><img src="{{ asset($employee->image) }}" alt="employee Image" class="rounded" style="width: 60px;"></td>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>{{ $employee->program->title }}</td>
                                        <td>{{ $employee->shift->title }}</td>
                                        <td>
                                            <a href="{{ route('employee.edit', $employee->id) }}" class="">
                                                <i class="text-primary fe fe-edit-3 h5"></i>
                                            </a>
                                            <a href="{{ route('employee.destroy', $employee->id) }}" class="mx-3"
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


</x-app-layout>
