<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //* CARA SEARCH DATA
        if($request->has('search')){
            $products = Products::where('product_name', 'LIKE', '%'.$request->search.'%')->with('Categories')->simplePaginate(5);
        }else{
            //* CARA 1 AMBIL DATA
            // $products = Products::all();

            //* CARA 2 AMBIL DATA
            $products = Products::with('Categories')->simplePaginate(5);
        }
        
        return view('dashboard.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::orderBy('name', 'asc')->get();
        
        return view('dashboard.products-add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //* VALIDASI TAMBAH DATA
        $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'image' => 'required|image',
            ],
            [
            'product_name.required' => 'Required',
            'price.required' => 'Required'
            ]
        );

        //* CARA 1 TAMBAH DATA ELOQUENT ORM
        // $products = new Products;
 
        // $products->product_name = $request->product_name;
        // $products->categories_id = $request->categories_id;
        // $products->stock = $request->stock;
        // $products->price = $request->price;
        // $products->image = $request->image;
        // $products->product_desc = $request->product_desc;
 
        // $products->save();

        //* CARA 2 TAMBAH DATA MASS ASSIGNMENT
        Products::create([
            'product_name' => $request->product_name,
            'categories_id' => $request->categories_id,
            'stock' => $request->stock,
            'price' => $request->price,
            'image' => $request->file('image')->store('product-images'),
            'product_desc' => $request->product_desc
        ]);

        //* CARA 3 TAMBAH DATA MASS ASSIGNMENT
        //! Syarat nama field di database harus sama seperti nama pada input di html
        //  Products::create($request->all());

        //* CARA 4 TAMBAH DATA GABUNGAN (ELOQUENT ORM & MASS ASSIGNMENT)
        // $products = new Products([
        //     'product_name' => $request->product_name,
        //     'categories_id' => $request->categories_id,
        //     'stock' => $request->stock,
        //     'price' => $request->price,
        //     'image' => $request->image,
        //     'product_desc' => $request->product_desc
        // ]);
        // $products->save();

        return redirect('products')->with('status', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //* CARA 1 DETAIL DATA
        $products = Products::find($id);

         //* CARA 2 DETAIL DATA
        // $products = Products::where('id', $id)->get();
        // $products = $products[0];

        //* CARA 3 DETAIL DATA
        // return view('dashboard.products-detail', compact('products'));

        return view('dashboard.products-detail', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Products::find($id);
        $categories = Categories::orderBy('name', 'asc')->get();
        
        return view('dashboard.products-edit', compact('products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //* VALIDASI UPDATE DATA
        $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            ],
            [
            'product_name.required' => 'Required',
            'price.required' => 'Required'
            ]
        );

        //* CARA 1 UPDATE DATA
        $products = Products::find($id);

        $products->product_name = $request->product_name;
        $products->categories_id = $request->categories_id;
        $products->stock = $request->stock;
        $products->price = $request->price;

            //* JIKA UPLOAD GAMBAR BARU, MAKA HAPUS GAMBAR LAMA
            if($request->file('image')){
                if($request->oldImage){
                    Storage::delete($request->oldImage);
                }
                $products->image = $request->file('image')->store('product-images');
            }

        $products->product_desc = $request->product_desc;
        
        $products->save();

        //* CARA 2 UPDATE DATA
        // Products::where('id', $id)->update([
        //     'product_name' => $request->product_name,
        //     'categories_id' => $request->categories_id,
        //     'stock' => $request->stock,
        //     'price' => $request->price,
        //     'image' => $request->image,
        //     'product_desc' => $request->product_desc
        // ]);

        return redirect('products')->with('status', 'Data berhasil diubah!');
    }

    public function restore(){
        //* MENAMPILKAN DATA YANG DI SOFT DELETE
        $products = Products::onlyTrashed()->simplePaginate(5);

        return view('dashboard.products-restore', compact('products'));
    }

    public function recycle($id = null){
        
        //* CARA 2 MENGEMBALIKAN DATA YANG DI SOFT DELETE
        if($id !== null){
            $products = Products::onlyTrashed()
                ->where('id', $id)
                ->restore();
        }else{
            $products = Products::onlyTrashed()->restore();
        }

        //* CARA 2 MENGEMBALIKAN DATA YANG DI SOFT DELETE
        // $products = Products::onlyTrashed()->get();

        // return view('dashboard.products-restore', compact('products'));
        
        return redirect('products/restore')->with('status', 'Data berhasil dikembalikan!');
    }

    public function deletePermanent($id = null){
        
        //* CARA 1 MENGHAPUS PERMANEN DATA
        if ($id !== null) {
            $products = Products::onlyTrashed()->find($id);
    
            if ($products->image) {
                Storage::delete($products->image);
            }
    
            $products->forceDelete();
        } else {
            $products = Products::onlyTrashed()->get();
    
            foreach ($products as $product) {
                if ($product->image) {
                    Storage::delete($product->image);
                }
            }
            $products = Products::onlyTrashed()->forceDelete();
        }

        //* CARA 2 MENGHAPUS PERMANEN DATA
        // $products = Products::onlyTrashed()->get();

        // return view('dashboard.products-restore', compact('products'));
        
        return redirect('products/restore')->with('status', 'Data berhasil dihapus permanen!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //* CARA 1 HAPUS DATA DENGAN SOFT DELETE
        $products = Products::find($id);
            
            //* JIKA DATA MEMILIKI GAMBAR, MAKA HAPUS GAMBARNYA JUGA
            // if($products->image){
            //     Storage::delete($products->image);
            // }

        $products->delete();

        //* CARA 2 HAPUS DATA DENGAN SOFT DELETE
        // Products::destroy($id);

        //* CARA 3 HAPUS DATA DENGAN SOFT DELETE
        // Products::where('id', $id)->delete();

        return redirect('products')->with('status', 'Data berhasil dihapus!');
    }
}
