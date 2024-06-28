<?php

namespace App\Http\Controllers;

use App\Models\Ability;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use Illuminate\View\View;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(): View
    {
        if(!Auth::check()){
            return view('auth.login');
        }
        $products = Product::paginate(5);
        return view('product.index', [
            'products' => $products,
            'title' => 'Product List'
        ]);
    }

    public function show(Product $product): View
    {
        if(!Auth::check()){
            return view('auth.login');
        }
        return view('product.show', [
            'product' => $product,
            'title' => 'Product Details'
        ]);
    }

    public function create(): View
    {
        if(!Auth::check()){
            return view('auth.login');
        }
        return view('product.create',
            [
                'title' => 'Create Product'
            ]
        );
    }

    public function store(Request $request): RedirectResponse
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required|image'
        ]);
        
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $image->move(public_path('images'), $filename);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $filename
        ]);

        return redirect()->route('product.index')->with('status', 'Product created successfully');
    }

    public function edit(Product $product): View
    {
        if(!Auth::check()){
            return view('auth.login');
        }
        return view('product.edit', [
            'product' => $product,
            'title' => 'Edit Product'
        ]);
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
        if ($request->hasFile('image')) {
            $oldImage = public_path('images/' . $product->image);
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('images'), $filename);
        } else {
            $filename = $product->image;
        }
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $filename     
        ]);

        return redirect()->route('product.show',$product->id)->with('status', 'Product updated successfully');
    }

    public function destroy(Product $product): RedirectResponse
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
        $image = public_path('images/' . $product->image);
        if (file_exists($image)) {
            unlink($image);
        }
        $product->delete();

        return redirect()->route('product.index')->with('status', 'Product deleted successfully');
    }
}
