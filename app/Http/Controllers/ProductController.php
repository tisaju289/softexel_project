<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function landingPage()
    {
        $products = Product::with('subcategory')->get();
        return view('landing', compact('products'));
    }


    public function ProductListPage(){
        $products = Product::all();
        return view('dashboard.component.product.product-list',compact('products'));
    }

    public function ProductCreatePage()
    {  
        $subcategories = Subcategory::all();
        return view('dashboard.component.product.product-create' ,compact('subcategories'));
    }

    public function ProductUpdatePage($id)
    {
        $product = Product::find($id);
        $subcategories = Subcategory::all();
        return view('dashboard.component.product.product-update', compact('product' , 'subcategories'));
    }




    


    public function ProductCreate(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|image',
            'price' => 'required',
            'subcategory_id' => 'required|exists:subcategories,id',
        ]);
    
        $photoPath = $request->file('photo')->store('products', 'public');
    
        Product::create([
            'name' => $request->name,
            'photo' => $photoPath,
            'price' => $request->price,
            'subcategory_id' => $request->subcategory_id,
        ]);
    
        return redirect()->route('product.page')
            ->with('success', 'Product created successfully.');
    }

     


    public function ProductUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image',
            'price' => 'required',
            'subcategory_id' => 'required|exists:subcategories,id',
        ]);
    
        $product = Product::findOrFail($id);
    
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('products', 'public');
            $product->photo = $photoPath;
        }
    
        $product->name = $request->name;
        $product->price = $request->price;
        $product->subcategory_id = $request->subcategory_id;
        $product->save();
    
        return redirect()->route('product.page')
            ->with('success', 'Product updated successfully.');
    }



    public function ProductDestroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    
        return redirect()->route('product.page')->with('success', 'product deleted successfully');
    }
    
 
}
