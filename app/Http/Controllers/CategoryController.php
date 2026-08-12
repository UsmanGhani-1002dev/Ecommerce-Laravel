<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class CategoryController extends Controller
{
    public function category()
    {
        $query = Category::with('parent');

        if($search = request('search')){
            $query->where('name', 'LIKE', "%{$search}%");
        }

        if(request()->filled('status')){
            $query->where('status', request('status'));
        }

        $categories = $query->orderBy('id', 'DESC')->paginate(10)->withQueryString();

        return view('admin.category.index',compact('categories'));
    }

    public function addcategory()
    {
        $parentCategories = Category::whereNull('parent_id')->orderBy('name', 'ASC')->get();
        return view('admin.category.create', compact('parentCategories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'parent_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'status' => 'nullable|boolean',
            'slug' => 'required|string|max:255|unique:categories,slug',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->name);
        $category->parent_id = $request->parent_id ?: null;
        $category->status = $request->has('status') ? 1 : 0;

        if($request->hasFile('image')){
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $this->generateThumbnailImage($request->image, $imageName, 'uploads/categories', 124, 124);
            $request->image->move(public_path('uploads/categories'),$imageName);
            $category->image = $imageName;
        }

        $category->save();

        return redirect()->route('admin.category')->with('success', 'Category added successfully!');
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        $parentCategories = Category::whereNull('parent_id')->where('id', '!=', $id)->orderBy('name', 'ASC')->get();
        return view('admin.category.edit', compact('category', 'parentCategories'));
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'parent_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'status' => 'nullable|boolean',
            'slug' => 'required|string|max:255|unique:categories,slug,'. $id,
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->name);
        $category->parent_id = $request->parent_id ?: null;
        $category->status = $request->has('status') ? 1 : 0;

        if($request->hasFile('image')){

            if($category->image){
                @unlink(public_path('uploads/categories/'. $category->image));
                 @unlink(public_path('uploads/categories/thumbnails/'. $category->image));
            }

            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $this->generateThumbnailImage($request->image, $imageName, 'uploads/categories', 124, 124);
            $request->image->move(public_path('uploads/categories'),$imageName);
            $category->image = $imageName;
        }

        $category->save();

        return redirect()->route('admin.category')->with('success', 'Category updated successfully!');
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);

        if($category->image){
            @unlink(public_path('uploads/categories/'. $category->image));
            @unlink(public_path('uploads/categories/thumbnails/'. $category->image));
        }

        $category->delete();
        return redirect()->route('admin.category')->with('success', 'Category deleted successfully!');   
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
