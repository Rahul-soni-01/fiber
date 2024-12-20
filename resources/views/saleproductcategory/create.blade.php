<x-layout>
    <x-slot name="title">Insert Sale Product Category</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            <a href="{{ route('saleproductcategory.index') }}" class="btn btn-primary">Back to Sale Product Category</a>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('saleproductcategory.store') }}" method="POST">
                @csrf
                <div class="container">
                    <div class="row justify-content-center">
                        <!-- Centering the form on larger screens -->
                        <div class="col-12 col-lg-6">
                            
                            <!-- Sale Product Category Name Input -->
                            <div class="mb-3">
                                <label for="name">Sale Product Category Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Sale Product Category Name" required>
                            </div>
                            
                            <!-- Sale Product Category Type Input (Optional) -->
                            {{-- <div class="mb-3">
                                <label for="is_type" class="form-label">Category Type</label>
                                <div class="form-check">
                                    <input type="checkbox" name="is_type" id="is_type" class="form-check-input" value="1">
                                    <label class="form-check-label" for="is_type">Is Active</label>
                                </div>
                            </div>
                             --}}
                            
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
    </x-slot>
</x-layout>