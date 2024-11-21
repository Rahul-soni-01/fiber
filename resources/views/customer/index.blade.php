<x-layout>
    <x-slot name="title">Show Customer</x-slot>
    <x-slot name="main">
        <div class="main" id="main">

            @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <a href="{{ route('customer.create') }}" class="btn btn-primary">Add customer</a>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Customer name</th>
                        <th>Address</th>
                        <th>telephone no </th>
                        <th>contact person name </th>
                        <th>Action </th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->customer_name }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->telephone_no }}</td>
                        <td>{{ $customer->receiver_name }}</td>
                        <td>
                            <a href="{{ route('customer.edit', ['customer_id' => $customer->id]) }}"><i
                                    class="ri-eye-fill"></i></a>
                            <form action="{{ route('customer.destroy', $customer->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this customer?');"
                                    class="btn">
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