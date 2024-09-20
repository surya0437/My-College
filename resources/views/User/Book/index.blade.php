<x-app-layout :PageTitle="'Books'">
    @foreach ($books as $book)
    <div class="col-12 col-md-6 col-lg-4 d-flex">
        <div class="bg-white card flex-fill">
            <img alt="Card Image" src="{{ asset($book->image) }}" class="card-img-top">
            <div class="pb-0 card-header">
                <h5 class="mb-0 card-title">Card with image and button</h5>
            </div>
            <div class="card-body">
                <p class="mb-2 card-text">Category: {{ $book->category->title }}</p>
                <p class="mb-2 card-text">Author: {{ $book->author->name }}</p>
                <p class="mb-2 card-text">Quantity: {{ $book->quantity }}</p>
                <div class="text-end">
                    <a class="btn btn-primary" href="javascript:void(0);">Request Book</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-app-layout>
