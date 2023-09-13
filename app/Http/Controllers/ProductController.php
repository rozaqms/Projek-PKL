<?php

// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Pendapatan;

class ProductController extends Controller
{
    public function saveChanges(Request $request)
    {
        if ($request->isMethod('post') && $request->has('changes')) {
            $changes = $request->input('changes');

                // Update or insert into pendapatan table
                // Simpan data pendapatan dalam koleksi array
                $currentDate = now();
                $categories = [];

                foreach ($changes as $change) {
                    $itemName = $change["itemName"];
                    $adjustedQuantity = $change["adjustedQuantity"];
                
                    $product = Product::where('name', $itemName)->first();
                    $product->base_quantity -= $adjustedQuantity;
                    $product->save();
                
                    $categoryData = [
                        'name' => $itemName,
                        'category' => $product->category,
                        'total_price' => $product->price * $adjustedQuantity,
                        'total_quantity' => $adjustedQuantity,
                        'created_at' => $currentDate,
                        'updated_at' => $currentDate
                    ];
                
                    $categories[] = $categoryData;
                }
                
                // Update or create Pendapatan
                Pendapatan::insert($categories);
        }
        return redirect()->route('penjualanM')->with('success', 'Operasi berhasil dilakukan.');
    }
}
