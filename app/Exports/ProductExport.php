<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::with('brand','category')->get();
    }

    public function map($product): array
    {
        return [
            $product->id,
            $product->name,
            $product->SKU,
            $product->category->name ?? 'N/A',
            $product->brand->name ?? 'N/A',
            $product->regular_price,
            $product->sale_price ?? 0,
            $product->stock_status,
            $product->quantity,
            $product->image,
            
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'SKU',
            'Category',
            'Brand',
            'Regular Price',
            'Sale Price',
            'Stock Status',
            'Quantity',
            'Image',
        ];
    }
}
