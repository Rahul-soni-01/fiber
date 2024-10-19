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
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <h3>Sub Category</h3>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-control" value="{{ old('category') }}"
                            required>
                            <option value="" disabled>Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="sub_category" class="form-label">Sub Category</label>
                        <input type="text" name="sub_category" id="sub_category" class="form-control"
                            value="{{ old('sub_category') }}" placeholder="Enter sub category" required>
                        @error('sub_category')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="unit" class="form-label">Unit</label>
                        <select name="unit" id="unit" class="form-control" required>
                            <option value="" disabled selected>Select Unit</option>
                            <option value="Pic">Pic</option>
                            <option value="Mtr">Mtr</option>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="sr_no" class="form-label">SR No.</label><br>
                            <input type="hidden" name="sr_no" value="0">
                            <input type="checkbox" id="sr_no" name="sr_no" value="1">
                        </div>
                        <div class="col-md-3 mt-3">
                            <button type="submit" class="btn btn-success mt-3">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </x-slot>
</x-layout>