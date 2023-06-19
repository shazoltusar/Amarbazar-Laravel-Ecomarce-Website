<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function Index()
    {
        $allsubcatagories = Subcategory::latest()->get();
        return view('admin.allsubcatetory', compact('allsubcatagories'));
    }
    public function AddSubCategory()
    {
        $categories = Category::latest()->get();
        return view('admin.addsubcatetory', compact('categories'));
    }
    public function SotoreSubCategory(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
            'category_id' => 'required'
        ]);
        $category_id = $request->category_id;

        $category_name = Category::where('id', $category_id)->value('categori_name');

        Subcategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ', '_', $request->subcategory_name)),
            'category_id' => $category_id,
            'category_name' => $category_name
        ]);
        Category::where('id', $category_id)->increment('subcategory_count', 1);
        return redirect()->route('allsubcatetory')->with('message', 'Sub Category Added Successfully!');
    }

    public function EditSubCat($id)
    {
        $subcatinfo = Subcategory::findOrfail($id);
        return view('admin.editsubcat', compact('subcatinfo'));
    }
    public function UpdateSubCat(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
        ]);
        $subcatid = $request->subcatid;
        Subcategory::findOrfail($subcatid)->update([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ', '_', $request->subcategory_name))
        ]);
        return redirect()->route('allsubcatetory')->with('message', 'Sub Category Update Successfully!');
    }
    public function Deletesubcat($id)
    {
        $cat_id = Subcategory::where('id', $id)->value('category_id');
        Subcategory::findOrfail($id)->delete();
        Category::where('id', $cat_id)->decrement('subcategory_count', 1);
        return redirect()->route('allsubcatetory')->with('message', 'Sub Category Delete Successfully!');
    }
}