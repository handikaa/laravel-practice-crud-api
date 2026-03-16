<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Traits\ApiResponse;


class ProductController extends Controller
{

    use ApiResponse;



    public function index(Request $request): JsonResponse
    {
        // $products = Product::all();
        $query = Product::query();

        if ($request->has('min_price')) {
            $query->where('price', '>', $request->min_price);
        }

        if ($request->has('in_stock')) {
            $query->where('stock', '>', $request->in_stock);
        }

        $products = $query->paginate(10);

        return response()->json([
            'success' => true,
            'message' => 'Products retrieved successfully',
            'data' => $products->items(),
            'meta' => [
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'per_page' => $products->perPage(),
                'total' => $products->total(),
            ]
        ], 200);
    }
    public function store(Request $request)
    {
        // 1. validasi input
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|integer|min:1000',
            'stock' => 'required|integer|min:1',
        ], [
            'name.required' => 'Tolong dong nama produknya diisi',
            'name.min' => 'Tolong dong minimal 3 karakter untuk nama produk',
            'name.unique' => 'Nama produk sudah di gunakan',
            'price.required' => 'Tolong dong harga produknya diisi',
            'price.min' => 'Harga produk minimal banget ini mah Rp1.000',
            'stock.required' => 'Stok diisi dong masa ga ada stock nya',
            'stock.min' => 'Minimal stock harus 1'
        ]);


        // 2. simpan data ke database 
        $product = Product::create($validated);

        // 3. return response JSON
        return response()->json([
            'status' => true,
            'message' => 'Product Created Successfully',
            'data' => $product
        ], 201);
    }


    public function show(int $id): JsonResponse
    {
        $product = Product::findOrFail($id);

        return $this->successResponse(
            $product,
            'Produk berhasil diambil'
        );
    }




    public function update(Request $request, int $id): JsonResponse
    {
        // 1. validasi input
        $validated = $request->validate([
            'name' => 'sometimes|string|min:3|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'sometimes|integer|min:0',
            'stock' => 'sometimes|integer|min:0',
        ], [
            'name.required' => 'Tolong dong nama produknya diisi',
            'name.min' => 'Tolong dong minimal 3 karakter untuk nama produk',
        ]);

        // 2. cari & update data
        $product = Product::findOrFail($id);
        $product->update($validated);



        // 3. return response JSON
        return $this->successResponse($product, 'Produk berhasil diupdate');
    }

    public function restore(String $id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $productName = $product->name;
        $product->restore();

        return $this->successResponse($product, "Produk '$productName' berhasil di Kembalikan");
    }

    public function trash()
    {
        $product = Product::onlyTrashed()->get();


        return $this->successResponse($product, "Berhasil mengambil data produk");
    }

    public function destroy(int $id): JsonResponse
    {
        // 2. cari & hapus data
        $product = Product::findOrFail($id);
        $productName = $product->name;
        $product->delete();

        // 3. return response JSON
        return $this->successResponse(null, "Produk '$productName' berhasil dihapus");
    }
    public function forceDelete(int $id): JsonResponse
    {
        // 2. cari & hapus data
        $product = Product::findOrFail($id);
        $productName = $product->name;
        $product->forceDelete();

        // 3. return response JSON
        return $this->successResponse(null, "Produk '$productName' berhasil dihapus");
    }
}
