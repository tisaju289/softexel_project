<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function SubCategoryListPage(){
        $subcategories = Subcategory::all();
        return view('dashboard.component.subcategory.subcategory-list',compact('subcategories'));
    }

    public function SubCategoryCreatePage()
    {
        $categories = Category::all();
        return view('dashboard.component.subcategory.subcategory-create', compact('categories'));
    }

    public function SubCategoryUpdatePage($id)
    {
      
        $subcategory = Subcategory::find($id);
        $categories = Category::all();
        return view('dashboard.component.subcategory.subcategory-update', compact('subcategory', 'categories'));
    }







    public function SubCategoryCreate(Request $request)
    {
       
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);

        Subcategory::create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            ]);
    
            return redirect()->route('subcategory.page')->with('success', 'subcategory created successfully');
    }

     


    public function SubCategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);
    
        $subcategory = Subcategory::find($id);
        $subcategory->name = $request->input('name');
        $subcategory->category_id = $request->input('category_id');
        
        $subcategory->save();
    
        return redirect()->route('subcategory.page')->with('success', 'subcategory updated successfully');
    }



    public function SubCategoryDestroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();
    
        return redirect()->route('subcategory.page')->with('success', 'subcategory deleted successfully');
    }
    
}
