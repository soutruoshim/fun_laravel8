<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function AllCat(){
        //$categories = Category::all();
        //$categories = Category::latest()->get();
        //$categories = DB::table('categories')->latest()->paginate(5);
        $categories = Category::latest()->paginate(5);
        $trashCat = Category::onlyTrashed()->latest()->paginate(3);

        return view('admin.category.index', compact('categories', 'trashCat'));
    }
    
    public function AddCat(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:20'
        ],[
            'category_name.required' => 'Please input category name',
            'category_name.max'      => 'Category less then 225 chars'
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth::user()->id;
        // $category->save();

        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // $data['created_at'] =Carbon::now();
        // DB::table('categories')->insert($data);

        return Redirect()->back()->with('success', 'Category Inserted');
    }
    public function Edit($id){
           $categories = Category::find($id);
           return view('admin.category.edit', compact('categories'));
    }

    public function Update(Request $request, $id){
        $categories = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);
        return Redirect()->route('all.category')->with('success', 'Category Updated');
    
    }
    public function SoftDelete($id){
         $delete = Category::find($id)->delete();
         return Redirect()->back()->with('success', 'Category Deleted');
     }

     public function Restore($id){
         $delete = Category::withTrashed()->find($id)->restore();
         return Redirect()->back()->with('success', 'Category Restored');
     }

     public function PDelete($id){
         $delete = Category::onlyTrashed()->find($id)->forceDelete();
         return Redirect()->back()->with('success', 'Category Deleted');
     }
}
