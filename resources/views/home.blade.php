<x-layout>
    <x-slot name="title">DashBoard</x-slot>
    <x-slot name="main">
        <head>
            <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>
            <script src="https://cdn.tailwindcss.com"></script>
        </head>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">

            <!-- Sales Card -->
            <div class="bg-white shadow-sm rounded-2xl p-6 flex items-center space-x-4">
                <div class="bg-blue-500 text-white p-4 rounded-full">
                    <i class="fas fa-shopping-cart text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold">Today's Sales</h3>
                    <p class="text-gray-500 text-xl font-bold">{{ $sales->count() }}</p>
                    @php
                    $sum = 0;
                        foreach ($sales as $sale) {
                            $sum += $sale->amount;
                        }
                    @endphp
                        <p class="text-gray-500 text-xl font-bold">${{ number_format($sum, 2) }}</p>

                </div>
            </div>

            <!-- Purchases Card -->
            <div class="bg-white shadow-sm rounded-2xl p-6 flex items-center space-x-4">
                <div class="bg-green-500 text-white p-4 rounded-full">
                    <i class="fas fa-truck text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold">Today's Purchases</h3>
                    <p class="text-gray-500 text-xl font-bold">{{ $purchases->count() }}</p>
                    @php
                    $sum = 0;
                        foreach ($purchases as $purchase) {
                            $sum += $purchase->inr_amount;
                        }
                    @endphp
                        <p class="text-gray-500 text-xl font-bold">${{ number_format($sum, 2) }}</p>
                </div>
            </div>

            <!-- Reports Card -->
            <div class="bg-white shadow-sm rounded-2xl p-6 flex items-center space-x-4">
                <div class="bg-yellow-500 text-white p-4 rounded-full">
                    <i class="fas fa-chart-line text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold">Today's Reports</h3>
                    <p class="text-gray-500 text-xl font-bold">{{ $reports->count() }}</p>
                </div>
            </div>

            <!-- Supplier Payments Card -->
            <div class="bg-white shadow-sm rounded-2xl p-6 flex items-center space-x-4">
                <div class="bg-purple-500 text-white p-4 rounded-full">
                    <i class="fas fa-hand-holding-usd text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold">Supplier Payments</h3>
                    <p class="text-gray-500 text-xl font-bold">{{ $supplier_payments->count() }}</p>
                    @php
                    $sum = 0;
                        foreach ($supplier_payments as $supplier_payment) {
                            $sum += $supplier_payment->amount_paid;
                        }
                    @endphp
                        <p class="text-gray-500 text-xl font-bold">${{ number_format($sum, 2) }}</p>
                </div>
            </div>

            <!-- Customer Payments Card -->
            <div class="bg-white shadow-sm rounded-2xl p-6 flex items-center space-x-4">
                <div class="bg-red-500 text-white p-4 rounded-full">
                    <i class="fas fa-wallet text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold">Customer Payments</h3>
                    <p class="text-gray-500 text-xl font-bold">{{ $customer_payments->count() }}</p>
                    @php
                        $sum = 0;
                        foreach ($customer_payments as $customer_payment) {
                            $sum += $customer_payment->amount_paid;
                        }
                    @endphp
                        <p class="text-gray-500 text-xl font-bold">${{ number_format($sum, 2) }}</p>
                </div>
            </div>

        </div>
    </x-slot>
</x-layout>