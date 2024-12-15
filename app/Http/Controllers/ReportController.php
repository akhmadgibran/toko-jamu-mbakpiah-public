<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade; // Add the dompdf facade

class ReportController extends Controller
{
    /**
     * Show the report dashboard with various reports.
     */
    public function index()
    {
        // Total Sales in the last 30 days
        $totalSales = Order::where('status', 'Selesai') // Only completed orders
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->sum('total_price'); // Sum of the total_price column

        // Sales by Product in the last 30 days
        $salesByProduct = OrderDetail::join('products', 'order_details.product_id', '=', 'products.id')
            ->whereHas('order', function ($query) {
                $query->where('status', 'Selesai'); // Only include completed orders
            })
            ->where('order_details.created_at', '>=', Carbon::now()->subDays(30)) // Filter by date range (last 30 days)
            ->selectRaw('order_details.product_id, SUM(order_details.quantity) as total_quantity, SUM(order_details.quantity * products.price) as total_sales')
            ->groupBy('order_details.product_id')
            ->get();

        // Orders by Status
        $ordersByStatus = Order::selectRaw('status, COUNT(*) as total_orders')
            ->groupBy('status')
            ->get();

        // List of all orders with their details
        $allOrders = Order::with('orderDetails.product')->get();

        // Returning the data to the view
        return view('admin.reports.index', compact('totalSales', 'salesByProduct', 'ordersByStatus', 'allOrders'));
    }

    /**
     * Export the report as a PDF.
     */
}
