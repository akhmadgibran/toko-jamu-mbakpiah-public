<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Laporan Penjualan (30 Hari Terakhir)</h1>

    <!-- Total Sales -->
    <h3>Total Penjualan (30 Hari Terakhir)</h3>
    <p><strong>Rp. {{ number_format($totalSales, 2) }}</strong></p>

    <!-- Sales by Product -->
    <h3>Penjualan Berdasarkan Produk</h3>
    <table>
        <thead>
            <tr>
                <th>Produk</th>
                <th>Quantity Terjual</th>
                <th>Total Penjualan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salesByProduct as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->total_quantity }}</td>
                    <td>Rp. {{ number_format($item->total_sales, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Orders by Status -->
    <h3>Order Berdasarkan Status</h3>
    <table>
        <thead>
            <tr>
                <th>Status</th>
                <th>Total Order</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ordersByStatus as $status)
                <tr>
                    <td>{{ $status->status }}</td>
                    <td>{{ $status->total_orders }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- All Orders -->
    <h3>Semua Orders</h3>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Produk</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allOrders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>Rp. {{ number_format($order->total_price, 2) }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        @foreach ($order->orderDetails as $detail)
                            {{ $detail->product->name }} (x{{ $detail->quantity }})
                            <br>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script type="text/javascript" >
        window.print();
    </script>
</body>
</html>
