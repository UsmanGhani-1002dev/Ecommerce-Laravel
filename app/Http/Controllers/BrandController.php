<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class BrandController extends Controller
{
    public function brands()
    {
        $query = Brand::query();

        if($search = request('search')){
            $query->where('name', 'LIKE', "%{$search}%");
        }

        if(request()->filled('status')){
            $query->where('status', request('status'));
        }

        $brands = $query->orderBy('id', 'DESC')->paginate(10)->withQueryString();

        return view('admin.brands.index',[
            'brands' => $brands
        ]);
    }

    public function addBrand()
    {
        return view('admin.brands.create');
    }

    public function storeBrand(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'status' => 'nullable|boolean',
            'slug' => 'required|string|max:255|unique:brands,slug',
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->name);
        $brand->status = $request->has('status') ? 1 : 0;

        if($request->hasFile('image')){
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $this->generateThumbnailImage($request->image, $imageName, 'uploads/brands', 124, 124);
            $request->image->move(public_path('uploads/brands'),$imageName);
            $brand->image = $imageName;
        }

        $brand->save();

        return redirect()->route('admin.brands')->with('success', 'Brand added successfully!');
    }

    public function editBrand($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    public function updateBrand(Request $request, $id)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'status' => 'nullable|boolean',
            'slug' => 'required|string|max:255|unique:brands,slug,'. $id,
        ]);

        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;
        $brand->slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->name);
        $brand->status = $request->has('status') ? 1 : 0;

        if($request->hasFile('image')){

            if($brand->image){
                @unlink(public_path('uploads/brands/'. $brand->image));
                 @unlink(public_path('uploads/brands/thumbnails/'. $brand->image));
            }

            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $this->generateThumbnailImage($request->image, $imageName, 'uploads/brands', 124, 124);
            $request->image->move(public_path('uploads/brands'),$imageName);
            $brand->image = $imageName;
        }

        $brand->save();

        return redirect()->route('admin.brands')->with('success', 'Brand updated successfully!');
    }

    public function deleteBrand($id)
    {
        $brand = Brand::findOrFail($id);

        if($brand->image){
            @unlink(public_path('uploads/brands/'. $brand->image));
            @unlink(public_path('uploads/brands/thumbnails/'. $brand->image));
        }

        $brand->delete();
        return redirect()->route('admin.brands')->with('success', 'Brand deleted successfully!');   
    }

    public function generateThumbnailImage($image, $imageName, $folder, $width = 124, $height = 124)
    {
        $thumbnailPath = public_path($folder . '/thumbnails');

        if (! file_exists($thumbnailPath)) {
            mkdir($thumbnailPath, 0755, true);
        }

        $img = Image::read($image);

        $img->resize($width, $height);

        $img->save($thumbnailPath . '/' . $imageName);
    }
}