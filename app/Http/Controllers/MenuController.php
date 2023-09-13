<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Ingredients_category_sale;
use App\Models\Pendapatan;

class MenuController extends Controller
{

    public function stockB(): View{
        $menus = Product::all();
        $dataKategori = Ingredients_category_sale::pluck('category');

        return view('pages.stock-barang', compact('menus','dataKategori'),[
        "title" => "Stok Barang",
        ]);
    }

    public function penjualanM()
        {
            $categories = Product::select('category')->distinct()->pluck('category');
    
            $itemsByCategory = [];
            foreach ($categories as $category) {
                $itemsByCategory[$category] = Product::where('category', $category)->get();
            }
    
            return view('pages.penjualan', ['categories' => $itemsByCategory, "title" => "Penjualan"]);
        }

    public function simpandatamenu(Request $request)
    {
        //validate form
        $this->validate($request, [
            'category'      => 'required|min:1',
            'name'          => 'required|min:1',
            'base_quantity' => 'required|min:1',
            'price'         => 'required|min:1',
        ]);

        //create post
        $menus = Product::create([
            'category'      => $request->category,
            'name'          => $request->name,
            'base_quantity' => $request->base_quantity,
            'price'         => $request->price,
        ]);

        //redirect to index
        return redirect()->route('stockB')->with('success', 'Operasi berhasil dilakukan.');
    }

    public function edit($id){
        $menus = Product::where('id',$id)->get();

        return view('pages.edit-data-menu',compact('menus'),[
        "title" => "Edit Data"
        ]);
    }

    public function update(Request $request, $id)
    {
        $menus = Product::where('id',$id)->get();
        //validate form
        $this->validate($request, [
            'category'      => 'required|min:1',
            'name'          => 'required|min:1',
            'base_quantity' => 'required|min:1',
            'price'         => 'required|min:1',
        ]);

         

            //update post without image
            Product::where('id',$request->id)->update([
                'category'      => $request->category,
                'name'          => $request->name,
                'base_quantity' => $request->base_quantity,
                'price'         => $request->price,
            ]);
        

        //redirect to index
        return redirect()->route('stockB')->with('success', 'Operasi berhasil dilakukan.');
    }

    public function delete( $id)
    {
        $menus = Product::where('id',$id)->delete();
        return redirect()->route('stockB')->with('success', 'Operasi berhasil dilakukan.');
    }

}
