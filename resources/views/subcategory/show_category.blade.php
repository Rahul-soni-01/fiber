<x-layout>
    <x-slot name="title">Show Sub Category</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Category Add Date</th>
                        <th>Category Name</th>
                        <th>Sub Category Add Date</th>
                        <th>Sub Category Name</th>
                        <th>Unit</th>
                        <th>Sr No</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$category['category_date']}}</td>
                        <td>{{$category['category_name']}}</td>
                        <td>{{$category['sub_category_date']}}</td>
                        <td>{{$category['sub_category_name']}}</td>
                        <td>{{$category['unit']}}</td>
                        <td>{{$category['sr_no']}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </x-slot>
</x-layout>