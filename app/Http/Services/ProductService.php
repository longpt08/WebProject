<?php


namespace App\Http\Services;


use App\Http\Enums\ProductStatus;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public function getProducts(?int $limit = null): Collection
    {
        $query = Product::query()
            ->where('status', ProductStatus::ACTIVE)
            ->orderByDesc('average_rating');
        if ($limit) {
            $query->limit($limit);
        }
        return $query->get();
    }

    public function getProductById(int $id): Product
    {
        return Product::query()
            ->where('id', $id)
            ->first();
    }

    public function search(string $search): Collection
    {
        return Product::query()->whereRaw("name like '%".$search."%'")->get();
    }

    public function filterPrice(int $from, int $to): Collection
    {
        return Product::query()->whereBetween('price', [$from, $to])->get();
    }

    public function reduceQuantity(Product $product, int $quantity): bool
    {
        $product->quantity -= $quantity;
        return $product->save();
    }

    public function checkQuantity(int $id, int $quantity)
    {
        $product = Product::query()->find($id);
        if ($quantity > $product->quantity) {
            return false;
        }
        return true;
    }
}
