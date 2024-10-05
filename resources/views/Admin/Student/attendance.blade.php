<x-app-layout :PageTitle="'Student'">

    <div class="col-sm-12">
        <div class="card">
            <div class="py-3 card-header d-flex align-items-center justify-content-between">
                <h4 class="card-title">Attendance of {{ $student->name }}</h4>
                {{-- <div class="d-flex align-items-center">
                    <a href="{{ route('student.addFace') }}" class="mx-3 btn btn-primary d-flex align-items-center justify-content-center">
                        <img src="/assets/img/icons/plus1.svg" alt="img"><span>
                            Add Face</span>
                    </a>
                    <a href="{{ route('student.create') }}" class="btn btn-primary d-flex align-items-center justify-content-center">
                        <img src="/assets/img/icons/plus1.svg" alt="img"><span>
                            Add New</span>
                    </a>
                </div> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datanew">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Date</th>
                                <th>In time</th>
                                {{-- <th>Out Time</th> --}}
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @if (count($student->studentAttendances) > 0)
                                @foreach ($student->studentAttendances as $index => $attendance) --}}
                            @if (count($attendances) > 0)
                                @foreach ($attendances as $index => $attendance)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $attendance->date }}</td>
                                        <td>{{ $attendance->time_in == null ? '--' : $attendance->time_in }}</td>
                                        {{-- <td>{{ $attendance->time_out == null ? '--' : $attendance->time_out }}</td> --}}
                                        <td>{{ $attendance->status }}</td>
                                        <td>
                                            <a href="{{ route('student.edit', $attendance->id) }}" class="">
                                                <i class="text-primary fe fe-edit-3 h5"></i>
                                            </a>
                                            <a href="{{ route('student.destroy', $attendance->id) }}" class="mx-3"
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
