<?php

namespace App\Http\Services;

use App\Http\Enums\CategoryStatus;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function getCategories(?int $limit = null): Collection
    {
        $query = Category::query()
            ->where('status', CategoryStatus::ACTIVE);
        if($limit) {
            $query->limit($limit);
        }
        return $query->get();
    }
}
