<x-app-layout :PageTitle="'Student'">

    <div class="col-sm-12">
        <div class="card">
            <div class="py-3 card-header d-flex align-items-center justify-content-between">
                <h4 class="card-title">Listed Student</h4>
                <div class="d-flex align-items-center">
                    <a href="{{ route('student.addFace') }}" class="mx-3 btn btn-primary d-flex align-items-center justify-content-center">
                        <img src="/assets/img/icons/plus1.svg" alt="img"><span>
                            Add Face</span>
                    </a>
                    <a href="{{ route('student.create') }}" class="btn btn-primary d-flex align-items-center justify-content-center">
                        <img src="/assets/img/icons/plus1.svg" alt="img"><span>
                            Add New</span>
                    </a>
                </div>
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
                                <th>Program</th>
                                <th>Shift</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($students)
                                @foreach ($students as $index => $student)

                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td><img src="{{ asset($student->image) }}" alt="Student Image" class="rounded" style="width: 60px;"></td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td>{{ $student->program->title }}</td>
                                        <td>{{ $student->shift->title }}</td>
                                        <td>
                                            <a href="{{ route('student.edit', $student->id) }}" class="">
                                                <i class="text-primary fe fe-edit-3 h5"></i>
                                            </a>
                                            <a href="{{ route('student.destroy', $student->id) }}" class="mx-3"
                                                data-confirm-delete="true">
                                                <i class="text-danger fe fe-trash-2 h5"></i>
                                            </a>
                                            <a href="{{ route('student.attendance', $student->id) }}" class="mx-3">
                                                view
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
