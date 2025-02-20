<?php
  
namespace App\Http\Controllers;
  
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return response()
     */
    public function index(): View
    {
        $products = Product::latest()->paginate(5);
        
        return view('products.index',compact('products'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('products.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $input = $request->all();
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            
            // Store the image using Laravel's Storage facade
            Storage::disk('public')->putFileAs('images', $image, $profileImage);
            
            $input['image'] = $profileImage;
        }
    
        Product::create($input);
    
        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil ditambahkan.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);
    
        $input = $request->all();
    
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image) {
                Storage::disk('public')->delete('images/' . $product->image);
            }
    
            $image = $request->file('image');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            
            // Store the new image
            Storage::disk('public')->putFileAs('images', $image, $profileImage);
            
            $input['image'] = $profileImage;
        } else {
            unset($input['image']);
        }
    
        $product->update($input);
    
        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil diupdate');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
         
        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil dihapus');
    }

    public function printPDF()
    {
        $products = Product::all();
        $pdf = PDF::loadView('products.pdf', compact('products'));
        return $pdf->download('data_produk.pdf');
    }

        public function data()
    {
        $products = Product::all();
        return response()->json($products);
    }

}