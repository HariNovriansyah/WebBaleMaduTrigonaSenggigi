<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg', // Validasi gambar
        ]);
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('assets/img/products'), $filename);
                $images[] = 'assets/img/products/' . $filename; // Simpan path relatif
            }
        }

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->size = $request->size;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->images = json_encode($images);
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
    // $products = Product::with('reviews')->get();
    // return view('admin.products.index', compact('products'));

    $products = Product::with('reviews')->get();
    return view('admin.products.show', compact('products'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg', // Validasi gambar
        ]);

        $product = Product::findOrFail($id);
    $oldImages = json_decode($product->images, true) ?? [];

    $images = [];
    if ($request->hasFile('images')) {
        // Hapus gambar lama
        foreach ($oldImages as $oldImage) {
            $oldImagePath = public_path($oldImage);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }

        // Unggah gambar baru
        foreach ($request->file('images') as $image) {
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('assets/img/products'), $filename);
            $images[] = 'assets/img/products/' . $filename; // Simpan path relatif
        }
    } else {
        // Jika tidak ada gambar baru yang diunggah, gunakan gambar lama
        $images = $oldImages;
    }

    $product->product_name = $request->product_name;
    $product->size = $request->size;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->stock = $request->stock;
    $product->images = json_encode($images);
    $product->save();

    return redirect()->route('products.index')->with('success', 'Product updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index');
    }
}
