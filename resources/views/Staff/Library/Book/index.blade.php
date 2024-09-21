<x-staff-app-layout :PageTitle="'Book'">

    <div class="col-sm-12">
        <div class="card">
            <div class="py-3 card-header d-flex align-items-center justify-content-between">
                <h4 class="card-title">Listed books</h4>
                <button type="button" class="btn btn-primary d-flex align-items-center justify-content-center"
                    data-bs-toggle="modal" data-bs-target="#AddbookModel">
                    <img src="/assets/img/icons/plus1.svg" alt="img"><span> Add New</span>
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datanew">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Rack No</th>
                                <th>Qty</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($books)
                                @foreach ($books as $index => $book)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>
                                            <img src="{{ asset($book->image) }}" alt="Book Cover Image" class="rounded"
                                                style="width: 70px;">
                                        </td>
                                        <td>{{ $book->category->title }}</td>
                                        <td>{{ $book->author->name }}</td>
                                        <td>{{ $book->rack->rackNo }}</td>
                                        <td>{{ $book->quantity }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $book->status == 1 ? 'bg-success' : 'bg-warning' }} badge-shadow">
                                                {{ $book->status == 1 ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('staff.book.edit', $book->id) }}" class="">
                                                <i class="text-primary fe fe-edit-3 h5"></i>
                                            </a>
                                            <a href="{{ route('staff.book.destroy', $book->id) }}" class="mx-3"
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

    <!-- Modal for Adding a Book -->
    <div class="modal fade" id="AddbookModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('staff.book.store') }}" method="post" class="row"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 col-md-6">
                            <label class="mb-1">Book Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                                <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="mb-1">Book Category <span class="text-danger">*</span></label>
                            <select class="select select2-hidden-accessible" name="category" tabindex="-1"
                                aria-hidden="true">
                                @foreach ($categories as $category)
                                    @if ($category->status == 1)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category')
                                <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="mb-1">Book Author <span class="text-danger">*</span></label>
                            <select class="select select2-hidden-accessible" name="author" tabindex="-1"
                                aria-hidden="true">
                                @foreach ($authors as $author)
                                    @if ($author->status == 1)
                                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('author')
                                <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="mb-1">Rack No. <span class="text-danger">*</span></label>
                            <select class="select select2-hidden-accessible" name="rackNo" tabindex="-1"
                                aria-hidden="true">
                                @foreach ($racks as $rack)
                                    @if ($rack->status == 1)
                                        <option value="{{ $rack->id }}">{{ $rack->rackNo }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('rackNo')
                                <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="mb-1">Book Publication <span class="text-danger">*</span></label>
                            <input class="form-control" name="publication" value="{{ old('publication') }}">
                            @error('publication')
                                <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="mb-1">Published Year <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="published_year"
                                value="{{ old('published_year') }}">
                            @error('published_year')
                                <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="mb-1">Book Quantity <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="quantity"
                                value="{{ old('quantity') }}">
                            @error('quantity')
                                <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="mb-1">Keywords</label>
                            <input type="text" class="form-control" name="keywords"
                                value="{{ old('keywords') }}">
                            @error('keywords')
                                <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="mb-1">Book Cover Image <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="image">
                            @error('image')
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

</x-staff-app-layout>
