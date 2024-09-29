<x-app-layout :PageTitle="'Student'">
    <div class="col-sm-12">
        <div class="card">
            <div class="py-3 card-header d-flex align-items-center justify-content-between">
                <h4 class="card-title">Listed Student Face</h4>
                <a href="http://127.0.0.1:5000/trainFace" class="btn btn-primary d-flex align-items-center justify-content-center">
                    <img src="/assets/img/icons/plus1.svg" alt="img"><span>
                        Train Face</span>
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
                                        <td>
                                            <a href="http://127.0.0.1:5000/addFace/{{ $student->id }}" class="">
                                                <img src="/assets/img/icons/plus.svg" alt="img"><span>
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
