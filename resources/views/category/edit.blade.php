<x-layout>
    <x-slot name="title">Edit Party</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            <a href="{{ route('party.show') }}" class="btn btn-primary">Back to Departments</a>
            @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
         
            
            <form action="{{ route('category.update', $category->id) }}" method="post">
                @csrf
                @method('PUT')
                <!-- This directive is required for updating data -->
                <div class="row mb-3 mt-3">
                    <div class="col-md-3">
                        <h3>Edit Category</h3>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="category_name" id="category_name"
                            value="{{ old('category_name', $category->category_name) }}"
                            placeholder="Enter category name" required>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>


        </div>
    </x-slot>
</x-layout>