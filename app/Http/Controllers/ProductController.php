<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function products()
    {
        $query = Product::with('category', 'brand');

        if($search = request('search')){
            $query->where(function ($q) use ($search){
                $q->where('name', 'LIKE', "%{$search}%")
                ->orWhere('SKU', 'LIKE', "%{$search}%");
            });
        }

        if(request()->filled('stock_status')){
            $query->where('stock_status', request('stock_status'));
        }

        if(request()->filled('status')){
            $query->where('status', request('status'));
        }

        if(request()->filled('category')){
            $query->where('category_id', request('category'));
        }

        if(request()->filled('brand')){
            $query->where('brand_id', request('brand'));
        }

        $brands = Brand::select('id','name')->orderBy('name')->get();
        $categories = Category::select('id','name')->orderBy('name')->get();

        $products = $query->orderBy('created_at', 'DESC')->paginate(10)->withQueryString();

        return view('admin.products.index', compact('products','categories','brands'));
    }

    public function addProduct()
    {
        $brands = Brand::select('id','name')->orderBy('name')->get();
        $categories = Category::select('id','name')->orderBy('name')->get();
        return view('admin.products.create', compact('brands','categories'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'slug'              => 'required|string|unique:products,slug',
            'short_description' => 'nullable|string|max:255',
            'description'       => 'nullable|string',
            'information'       => 'nullable|string',
            'regular_price'     => 'required|numeric|min:0',
            'sale_price'        => 'nullable|numeric|min:0',
            'SKU'               => 'required|string|unique:products,SKU',
            'stock_status'      => 'required|in:instock,outofstock',
            'status'            => 'nullable',
            'featured'          => 'nullable',
            'category_id'       => 'nullable|exists:categories,id',
            'brand_id'          => 'nullable|exists:brands,id',
            'quantity'          => 'required|integer|min:0',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'images.*'          => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $product = new Product();
        $product->name              = $request->name;
        $product->slug              = $request->slug;
        $product->short_description = $request->short_description;
        $product->description       = $request->description;
        $product->information       = $request->information;
        $product->regular_price     = $request->regular_price;
        $product->sale_price        = $request->sale_price ?: null;
        $product->SKU               = $request->SKU;
        $product->stock_status      = $request->stock_status;
        $product->category_id       = $request->category_id ?: null;
        $product->brand_id          = $request->brand_id ?: null;
        $product->quantity          = $request->quantity;
        $product->featured          = $request->has('featured') ? 1 : 0;
        $product->status            = ($request->status == '1' || $request->status == 'Published') ? 1 : 0;

        $current_timestamp = Carbon::now()->timestamp;

        // Main Image Upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = $current_timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $this->generateThumbnailImage($file, $imageName, 'uploads/products', 570, 650);
            $this->generateThumbnailImage($file, $imageName, 'uploads/products/thumbnails', 270, 300);

            $product->image = $imageName;
        }

        // Gallery Images Upload
        if ($request->hasFile('images')) {
            $galleryArr = [];
            $counter = 1;

            foreach ($request->file('images') as $gfile) {
                $gfileName = $current_timestamp . '_' . $counter . '.' . $gfile->getClientOriginalExtension();
                $this->generateThumbnailImage($gfile, $gfileName, 'uploads/products', 570, 650);
                $this->generateThumbnailImage($gfile, $gfileName, 'uploads/products/thumbnails', 270, 300);
                $galleryArr[] = $gfileName;
                $counter++;
            }

            $product->images_gallery = implode(',', $galleryArr);
        }

        $product->save();

        return redirect()->route('admin.products')->with('success', 'Product added successfully!');
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        $brands = Brand::select('id','name')->orderBy('name')->get();
        $categories = Category::select('id','name')->orderBy('name')->get();
        return view('admin.products.edit', compact('product','brands','categories'));
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'slug'              => 'required|string|unique:products,slug,' . $id,
        //  'slug'              => ['required','string',Rule::unique('products','slug)->ignore($id)];
            'short_description' => 'nullable|string|max:255',
            'description'       => 'nullable|string',
            'information'       => 'nullable|string',
            'regular_price'     => 'required|numeric|min:0',
            'sale_price'        => 'nullable|numeric|min:0',
            'SKU'               => 'required|string|unique:products,SKU,' . $id,
            'stock_status'      => 'required|in:instock,outofstock',
            'status'            => 'nullable',
            'featured'          => 'nullable',
            'category_id'       => 'nullable|exists:categories,id',
            'brand_id'          => 'nullable|exists:brands,id',
            'quantity'          => 'required|integer|min:0',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'images.*'          => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $product->name              = $request->name;
        $product->slug              = $request->slug ? Str::slug($request->slug) : Str::slug($request->name);
        $product->short_description = $request->short_description;
        $product->description       = $request->description;
        $product->information       = $request->information;
        $product->regular_price     = $request->regular_price;
        $product->sale_price        = $request->sale_price;
        $product->SKU               = $request->SKU;
        $product->stock_status      = $request->stock_status;
        $product->category_id       = $request->category_id;
        $product->brand_id          = $request->brand_id;
        $product->quantity          = $request->quantity;
        $product->featured          = $request->boolean('featured');
        $product->status            = $request->boolean('status');

        $current_timestamp = Carbon::now()->timestamp;

        // Main Image Upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = $current_timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // Delete old image if exists
            if ($product->image && file_exists(public_path('uploads/products/' . $product->image))) {
                unlink(public_path('uploads/products/' . $product->image));
            }
            if ($product->image && file_exists(public_path('uploads/products/thumbnails/' . $product->image))) {
                unlink(public_path('uploads/products/thumbnails/' . $product->image));
            }

            $this->generateThumbnailImage($file, $imageName, 'uploads/products', 570, 650);
            $this->generateThumbnailImage($file, $imageName, 'uploads/products/thumbnails', 270, 300);

            $product->image = $imageName;
        }

        // Gallery Images Upload
        if ($request->hasFile('images')) {
            $galleryArr = [];
            $counter = 1;

            // Delete old gallery images if exists
            if ($product->images_gallery) {
                $oldGallery = explode(',', $product->images_gallery);
                foreach ($oldGallery as $oldImg) {
                    if (file_exists(public_path('uploads/products/' . $oldImg))) {
                        unlink(public_path('uploads/products/' . $oldImg));
                    }
                    if (file_exists(public_path('uploads/products/thumbnails/' . $oldImg))) {
                        unlink(public_path('uploads/products/thumbnails/' . $oldImg));
                    }
                }
            }

            foreach ($request->file('images') as $gfile) {
                $gfileName = $current_timestamp . '_' . $counter . '.' . $gfile->getClientOriginalExtension();
                $this->generateThumbnailImage($gfile, $gfileName, 'uploads/products', 570, 650);
                $this->generateThumbnailImage($gfile, $gfileName, 'uploads/products/thumbnails', 270, 300);
                $galleryArr[] = $gfileName;
                $counter++;
            }

            $product->images_gallery = implode(',', $galleryArr);
        }

        $product->save();

        return redirect()->route('admin.products')->with('success', 'Product updated successfully!');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $this->deleteProductImages($product);
        $product->delete();

        return redirect()->route('admin.products')->with('success','Product deleted successfully!');
    }

    public function muiltpleDeleteProduct(Request $request)
    {
        $request->validate([
            'product_ids' => 'required|array|min:1',
            'product_ids.*' => 'exists:products,id'
        ]);

        $product_ids = $request->product_ids;

        $products = Product::whereIn('id', $product_ids)->get();

        foreach ($products as $product) {
            $this->deleteProductImages($product);

            $product->delete();
        }

        return redirect()->route('admin.products')->with('success','Products deleted successfully!');
    }

    public function generateThumbnailImage($image, $imageName, $folder, $width = 270, $height = 300)
    {
        $destinationPath = public_path($folder);

        if (! file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $img = Image::read($image);
        $img->resize($width, $height);
        $img->save($destinationPath . '/' . $imageName);
    }


    private function deleteProductImages(Product $product)
    {
        if ($product->image) {
            @unlink(public_path('uploads/products/' . $product->image));
            @unlink(public_path('uploads/products/thumbnails/' . $product->image));
        }

        foreach (explode(',', $product->images_gallery ?? '') as $image) {
            if (!$image) continue;

            @unlink(public_path('uploads/products/' . $image));
            @unlink(public_path('uploads/products/thumbnails/' . $image));
        }
    }

    public function productExport()
    {
        return Excel::download(new ProductExport(), 'products.xlsx');
    }
}
