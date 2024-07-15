<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryListPage(){
        $categories = Category::all();
        return view('dashboard.component.category.category-list',compact('categories'));
    }

    public function CategoryCreatePage()
    {
        return view('dashboard.component.category.category-create');
    }

    public function CategoryUpdatePage($id)
    {
        $category = Category::find($id);
        return view('dashboard.component.category.category-update', compact('category'));
    }







    public function CategoryCreate(Request $request)
    {
       
        $request->validate([
            'name' => 'required',
        ]);

        Category::create([
            'name' => $request->input('name'),
            ]);
    
            return redirect()->route('category.page')->with('success', 'category created successfully');
    }

     


    public function CategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->save();
    
        return redirect()->route('category.page')->with('success', 'category updated successfully');
    }



    public function CategoryDestroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    
        return redirect()->route('category.page')->with('success', 'category deleted successfully');
    }
    
 
    
}
