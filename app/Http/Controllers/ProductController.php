<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //! index() retrives all products (mengambil semua product lewat model Product) untuk Admin
    public function adminIndex()
    {
        // * retrive all products
        $data =  Product::all();
        // * passing data to view as "products"
        // * mengirimkan data ke view sebagai "products"
        return view('admin.product.index', ['products' => $data]);
    }

    //! index() retrives all products (mengambil semua product lewat model Product) untuk User
    public function userIndex()
    {
        // * retrive all products
        $data =  Product::all();
        // * passing data to view as "products"
        // * mengirimkan data ke view sebagai "products"
        return view('user.product.index', ['products' => $data]);
    }

    // ! create() create new product (form input)
    // ! create() membuat product baru (form input)
    public function create()
    {
        return view('admin.product.create');
    }

    // ! edit() edit product
    // ! edit() mengedit product
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }

    // ! store() store data to database
    public function store(Request $request)
    {
        // * Validate the incoming req data before storing (divalidasi dulu, sebelum disimpan ke database)
        // * preventing inconsistent data from being stored (mencegah data yang tidak sesuai disimpan ke database)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        //* Store the uploaded image to the 'images' directory in the 'public' disk
        // * Mengumpulkan gambar yang diupload ke direktori 'images' di dalam 'public' disk
        // ! storage/app/public/images/
        $imagePath = $request->file('image')->store('images', 'public');

        //* Create/storing a new product with the validated data and the image path
        // * Membuat/menyimpan product baru dengan data yang valid dan path gambar
        $product = Product::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'image_path' => $imagePath,
        ]);

        // // * Return a JSON response with the created product (logging)
        // // * Mengembalikan respons JSON dengan product yang dibuat (laporan)
        // return response()->json($product, 201);
        // ! redirect to admin.product.index
        // ! mengalihkan ke admin.product.index
        return redirect()->route('admin.product.index');
    }

    // ! update() update product
    public function update(Request $request, $id)
    {
        // * finding the specific product by id
        // * menemukan product spesifik berdasarkan id
        $product = Product::findOrFail($id);

        // * Validate the incoming req data before updating (divalidasi dulu, sebelum diupdate ke database)
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // * condition if req include image update
        // * kondisi jika req mengandung gambar update
        // ! storage/app/public/images/
        if ($request->hasFile('image')) {
            //! Delete old image
            // ! Menghapus gambar lama
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }

            //! Store new image
            // ! Mengumpulkan gambar baru
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        //* Update product
        // * Mengupdate product
        $product->update($validatedData);

        // // * Return a JSON response with the updated product (logging)
        // // * Mengembalikan respons JSON dengan product yang diupdate (laporan)
        // return response()->json($product);
        // ! redirect to admin.product.index
        // ! mengalihkan ke admin.product.index
        return redirect()->route('admin.product.index');
    }

    // ! destroy() delete product
    public function destroy($id)
    {
        // * finding the specific product by id
        // * menemukan product spesifik berdasarkan id
        $product = Product::findOrFail($id);

        //* Delete image file from storage
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }

        // * Delete product
        // * Menghapus product
        $product->delete();

        // // * Return a JSON response with the deleted product (logging)
        // // * Mengembalikan respons JSON dengan product yang dihapus (laporan)
        // return response()->json(['message' => 'Product deleted']);
        // ! redirect to admin.product.index
        // ! mengalihkan ke admin.product.index
        return redirect()->route('admin.product.index');
    }
}
