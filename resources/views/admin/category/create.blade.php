<x-admin-layout>

<!-- Main Content Start -->

<main class="flex-1 overflow-y-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Add New Category</h1>
        <a href="{{ route('admin.category') }}" class="border border-gray-300 bg-white hover:bg-gray-50 text-gray-700 px-5 py-2.5 rounded-lg text-sm font-medium transition flex items-center gap-2">
            <i class="fa-solid fa-arrow-left"></i> Back to Categories
        </a>
    </div>

    <div class="max-w-3xl mx-auto">
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category Name *</label>
                    <input type="text" id="name" name="name" placeholder="e.g. Jacket" value="{{ old('name') }}" class="w-full border px-4 py-2 rounded-lg focus:ring-1 focus:ring-primary outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category Slug</label>
                    <input type="text" id="slug" name="slug" placeholder="jacket" value="{{ old('slug') }}" class="w-full border px-4 py-2 rounded-lg bg-gray-50 outline-none">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Parent Category</label>
                <select name="parent_id" class="w-full border px-4 py-2 rounded-lg outline-none focus:ring-1 focus:ring-primary bg-white text-gray-700">
                    <option value="">Select Parent Category</option>
                    @foreach($parentCategories as $parent)
                        <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                            {{ $parent->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Category Image</label>
                
                <div class="relative flex items-center justify-center w-full h-40">
                    
                    <label for="category-image" class="relative flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition overflow-hidden">
                        
                        <div id="upload-content" class="flex flex-col items-center justify-center pt-5 pb-6 z-10">
                            <i class="fa-solid fa-cloud-arrow-up text-3xl text-gray-400 mb-2"></i>
                            <p class="text-sm text-gray-500">Upload category icon or image</p>
                        </div>

                        <img id="image-preview" class="hidden absolute inset-0 w-full h-full object-contain p-2 z-20 bg-white" src="" alt="Category Image Preview">

                        <input type="file" id="category-image" name="image" class="hidden" accept="image/png, image/jpeg, image/jpg, image/webp" />
                    </label>

                    <button type="button" id="remove-image-btn" class="hidden absolute top-2 right-2 z-30 bg-white text-red-500 hover:text-white hover:bg-red-500 rounded-full w-8 h-8 flex items-center justify-center shadow-md border border-gray-200 transition-colors focus:outline-none" title="Remove image">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    
                </div>
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" id="status" name="status" value="1" class="w-4 h-4 text-primary rounded border-gray-300 focus:ring-primary">
                <label for="status" class="text-sm text-gray-700">Set as Active Category</label>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 p-3 rounded">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-600 text-sm">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="flex justify-end gap-3 pt-4 border-t">
                <a href="{{ route('admin.category') }}" class="px-6 py-2 border rounded-lg hover:bg-gray-50 transition text-sm">Cancel</a>
                <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-secondary transition text-sm font-medium">Save Category</button>
            </div>
        </form>
    </div>
</main>

<!-- Main Content End -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // ==========================================
        // 1. CATEGORY IMAGE PREVIEW & REMOVE LOGIC
        // ==========================================
        const imageInput = document.getElementById('category-image');
        const uploadContent = document.getElementById('upload-content');
        const imagePreview = document.getElementById('image-preview');
        const removeBtn = document.getElementById('remove-image-btn');

        if (imageInput) {
            // Handle file selection
            imageInput.addEventListener('change', function(event) {
                const file = event.target.files[0];

                if (file && file.type.startsWith('image/')) {
                    // Show preview
                    imagePreview.src = URL.createObjectURL(file);
                    uploadContent.classList.add('hidden');
                    imagePreview.classList.remove('hidden');
                    removeBtn.classList.remove('hidden');
                } else {
                    // Invalid file or canceled
                    resetImageState();
                }
            });
        }

        if (removeBtn) {
            // Handle remove button click
            removeBtn.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent accidental form submission
                resetImageState();
            });
        }

        // Helper function to reset the UI to its default state
        function resetImageState() {
            imageInput.value = ''; // Clear the actual file input
            imagePreview.src = '';
            
            // Toggle visibility classes back to default
            uploadContent.classList.remove('hidden');
            imagePreview.classList.add('hidden');
            removeBtn.classList.add('hidden');
        }


        // ==========================================
        // 2. AUTO-SLUG GENERATOR LOGIC
        // ==========================================
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');

        if (nameInput && slugInput) {
            nameInput.addEventListener('input', function() {
                const name = this.value;
                
                // Generate the slug
                const slug = name.toLowerCase()
                    .trim()                               // Remove whitespace from both ends
                    .replace(/[^a-z0-9 -]/g, '')          // Remove invalid characters
                    .replace(/\s+/g, '-')                 // Replace spaces with hyphens
                    .replace(/-+/g, '-');                 // Replace multiple hyphens with a single one
                    
                slugInput.value = slug;
            });
        }

    });
</script>

</x-admin-layout>