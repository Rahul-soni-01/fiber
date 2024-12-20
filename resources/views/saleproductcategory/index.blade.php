<x-layout>
    <x-slot name="title">Show Sale Product Category</x-slot>
    <x-slot name="main">
        <div class="main" id="main" >
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <a href="{{ route('saleproductcategory.create') }}" class="btn btn-primary mb-2">Add Sale Product Category</a>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Category Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->is_type ? 'Active' : 'Inactive' }}</td>
            
                            <td>
                                <!-- Edit Link -->
                                <a href="{{ route('saleproductcategory.edit', ['id' => $category->id]) }}">
                                    <i class="ri-edit-2-fill"></i>
                                </a>
            
                                <!-- Delete Form -->
                                <form action="{{ route('saleproductcategory.destroy', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this category?');" class="btn">
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