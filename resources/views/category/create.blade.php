<x-layout>
    <x-slot name="title">Add Category</x-slot>
    <x-slot name="main">
        <div class="container my-4" id="main1">
            <!-- Form to Add Category -->

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-3">
                        <h3>Category</h3>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="category_name" id="category_name"
                            placeholder="Enter category name" required>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
            <hr class="my-4">

            <!-- Form to Add Sub Category -->
            <form action="{{ route('subcategory.store') }}" method="post">
                @csrf

            </form>
        </div>
    </x-slot>
</x-layout>