<x-layout>
    <x-slot name="title">Insert Sale Product Sub Category</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            <a href="{{ route('saleproductsubcategory.index') }}" class="btn btn-primary">Back to Sale Product Sub Category</a>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('saleproductsubcategory.store') }}" method="POST">
                @csrf
                <div class="container">
                    <div class="row justify-content-center">
                        <!-- Centering the form on larger screens -->
                        <div class="col-12 col-lg-6">
                            
                            <!-- Subcategory Name Input -->
                            <div class="mb-3">
                                <label for="name">Subcategory Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Subcategory Name" required>
                            </div>
                            
                            <!-- Parent Category Dropdown -->
                            <div class="mb-3">
                                <label for="spcid">Parent Category</label>
                                <select name="spcid" id="spcid" class="form-control" required>
                                    <option value="" disabled selected>Select Parent Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
            
                            <!-- Unit Input (Optional) -->
                            <div class="mb-3">
                                <label for="unit">Unit</label>
                                <input type="text" name="unit" id="unit" class="form-control" placeholder="Enter Unit (Optional)">
                            </div>
                            
                            <!-- Serial Number Input (Optional) -->
                            <div class="mb-3">
                                <label for="sr_no">Serial Number (*if avalible) </label>
                                {{-- <input type="number" name="sr_no" id="sr_no" class="form-control" placeholder="Enter Serial Number (Optional)"> --}}
                                <input type="checkbox" name="sr_no" id="is_type" class="form-control-input" value="1">
                                
                            </div>
                            
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
            
            
        </div>
    </x-slot>
</x-layout>