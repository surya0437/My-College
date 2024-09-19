<x-app-layout :PageTitle="'Edit Book'">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('book.update', $book->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Update Book</h4>
                        <a href="{{ route('book.index') }}" type="button"
                            class="btn btn-primary d-flex align-items-center justify-content-between">
                            <i class="fa fa-arrow-left" style="margin-right: 10px;"></i>
                            <p>
                                Back</p>
                        </a>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="mb-1">Book Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{ $book->name }}">
                            @error('name')
                                <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="mb-1">Book Category <span class="text-danger">*</span></label>
                            <select class="select select2-hidden-accessible" tabindex="-1"
                                aria-hidden="true"name="category">
                                @foreach ($categories as $category)
                                    @if ($category->status == 1)
                                        <option value="{{ $category->id }}"
                                            {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category')
                                <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="mb-1">Book Author <span class="text-danger">*</span></label>
                            <select class="select select2-hidden-accessible" tabindex="-1"
                                aria-hidden="true"name="author">
                                @foreach ($authors as $author)
                                    @if ($author->status == 1)
                                        <option value="{{ $author->id }}"
                                            {{ $book->author_id == $author->id ? 'selected' : '' }}>
                                            {{ $author->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('author')
                                <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="mb-1">Rack No. <span class="text-danger">*</span></label>
                            <select class="select select2-hidden-accessible" tabindex="-1"
                                aria-hidden="true"name="rackNo">
                                @foreach ($racks as $rack)
                                    @if ($rack->status == 1)
                                        <option value="{{ $rack->id }}"
                                            {{ $book->rack_id == $rack->id ? 'selected' : '' }}>
                                            {{ $rack->rackNo }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('rackNo')
                                <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="mb-1">Book Publication <span class="text-danger">*</span></label>
                            <input class="form-control" name="publication" value="{{ $book->publication }}">
                            @error('publication')
                                <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="mb-1">Published Year <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="published_year"
                                value="{{ $book->published_year }}">
                            @error('published_year')
                                <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="mb-1">Book Quantity <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="quantity" value="{{ $book->quantity }}">
                            @error('quantity')
                                <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="mb-1">Keywords</label>
                            <input type="text" class="form-control" name="keywords" value="{{ $book->keywords }}">
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
                        <div>
                            <img src="{{ asset($book->image) }}" class="h-auto img-fluid w-25" alt="">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
