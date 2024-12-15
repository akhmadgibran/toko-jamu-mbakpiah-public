<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- <!-- Export to PDF Button -->
                    <div class="mb-6">
                        <a href="{{ route('reports.exportPDF') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Export to PDF
                        </a>
                    </div> --}}

                    <!-- Total Sales -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold">Total Penjualan (30 Hari Terakhir)</h3>
                        <p class="text-xl font-bold text-green-600">Rp. {{ number_format($totalSales, 2) }}</p>
                    </div>

                    <!-- Sales by Product -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold">Penjualan Berdasarkan Produk (30 Hari Terakhir)</h3>
                        <table class="min-w-full table-auto mt-4">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Produk</th>
                                    <th class="px-4 py-2">Quantity Terjual</th>
                                    <th class="px-4 py-2">Total Penjualan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($salesByProduct as $item)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $item->product->name }}</td>
                                        <td class="border px-4 py-2">{{ $item->total_quantity }}</td>
                                        <td class="border px-4 py-2">Rp. {{ number_format($item->total_sales, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Orders by Status -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold">Order Berdasarkan Status</h3>
                        <table class="min-w-full table-auto mt-4">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Total Order</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordersByStatus as $status)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $status->status }}</td>
                                        <td class="border px-4 py-2">{{ $status->total_orders }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- All Orders -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold">Semua Order</h3>
                        <table class="min-w-full table-auto mt-4">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Order ID</th>
                                    <th class="px-4 py-2">Total Harga</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Produk</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allOrders as $order)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $order->id }}</td>
                                        <td class="border px-4 py-2">Rp. {{ number_format($order->total_price, 2) }}</td>
                                        <td class="border px-4 py-2">{{ $order->status }}</td>
                                        <td class="border px-4 py-2">
                                            @foreach ($order->orderDetails as $detail)
                                                <p>{{ $detail->product->name }} (x{{ $detail->quantity }})</p>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
