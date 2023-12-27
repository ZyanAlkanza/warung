<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function data(Request $request){

        if($request->has('search')){
            $categories = Categories::where('name', 'LIKE', '%'.$request->search.'%')->simplePaginate(5);
        }else{
            // $categories = DB::table('categories')->simplePaginate(8);
            $categories = Categories::simplePaginate(5);
        }

        //* CARA 1 KIRIM DATA
        // return view('dashboard.categories', ['categories' => $categories]);
        
        //* CARA 2 KIRIM DATA
        return view('dashboard.categories', compact('categories'));

        //* CARA 3 KIRIM DATA
        // return view('dashboard.categories')->with('categories', $categories);
    }

    public function add(){

        return view('dashboard.categories-add');
    }

    public function addData(Request $request){
        
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            ],
            [
            'name.required' => 'Required',
            'desc.required' => 'Description Required'
            ]
        );

        DB::table('categories')->insert([
            'name' => $request->name,
            'desc' => $request->desc
        ]);

        return redirect('categories')->with('status', 'Data berhasil ditambah!');
        
    }

    public function edit($id){

        $categories = DB::table('categories')->where('id', $id)->first();
        return view('dashboard.categories-edit', compact('categories'));
    }

    public function editData(Request $request, $id){
        DB::table('categories')
                ->where('id', $id)
                ->update([
                    'name' => $request->name,
                    'desc' => $request->desc
                ]);

        return redirect('categories')->with('status', 'Data berhasil diupdate!');
    }

    public function restore(){
        $categories = Categories::onlyTrashed()->simplePaginate(5);

        return view('dashboard.categories-restore', compact('categories'));
    }

    public function recycle($id = null){
        
        if($id !== null){
            $categories = Categories::onlyTrashed()
                ->where('id', $id)
                ->restore();
        }else{
            $categories = Categories::onlyTrashed()->restore();
        }

        // $categories = Categories::onlyTrashed()->get();

        // return view('dashboard.categories-restore', compact('categories'));
        
        return redirect('categories/restore')->with('status', 'Data berhasil dikembalikan!');
    }

    public function deletePermanent($id = null){
        
        if($id !== null){
            $categories = Categories::onlyTrashed()
                ->where('id', $id)
                ->forceDelete();
        }else{
            $categories = Categories::onlyTrashed()->forceDelete();
        }

        // $categories = Categories::onlyTrashed()->get();

        // return view('dashboard.categories-restore', compact('categories'));
        
        return redirect('categories/restore')->with('status', 'Data berhasil dihapus permanen!');
        
    }

    public function delete($id)
    {
        $categories = Categories::find($id);

        if (!$categories) {
            return redirect('categories')->with('status', 'Data tidak ditemukan!');
        }

        $categories->delete();

        return redirect('categories')->with('status', 'Data berhasil dihapus!');
    }
}
