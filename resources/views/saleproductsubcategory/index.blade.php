<x-layout>
    <x-slot name="title">Show Sale Product Category</x-slot>
    <x-slot name="main">
        <div class="main" id="main" >
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <a href="{{ route('saleproductsubcategory.create') }}" class="btn btn-primary mb-2">Add Sale Product Sub Category</a>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Subcategory Name</th>
                        <th>Parent Category</th>
                        <th>Unit</th>
                        <th>Serial Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subcategories as $subcategory)
                        <tr>
                            <td>{{ $subcategory->id }}</td>
                            <td>{{ $subcategory->name }}</td>
                            <td>{{ $subcategory->category ? $subcategory->category->name : 'N/A' }}</td>
                            <td>{{ $subcategory->unit ?? 'N/A' }}</td>
                            <td>{{ $subcategory->sr_no ?? 'N/A' }}</td>
                            <td>
                                <!-- Edit Link -->
                                <a href="{{ route('saleproductsubcategory.edit', ['id' => $subcategory->id]) }}">
                                    <i class="ri-edit-2-fill"></i>
                                </a>
            
                                <!-- Delete Form -->
                                <form action="{{ route('saleproductsubcategory.destroy', $subcategory->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this subcategory?');" class="btn">
                                        <i class="ri-delete-bin-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            
        </div>
    </x-slot>
</x-layout>