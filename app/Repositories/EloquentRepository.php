<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\contracts\CategoryRepositoryInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all(): Collection
    {
        return Category::all();
    }

    public function allPaginated(int $limit=20, array $columns[]): Paginator
    {
        return Category::paginate();
    }

    public function store(array $validatedData): Category
    {
        return Category::create($validatedData);
    }

    public function show(string $slug): Category
    {
        return Category::findOrFail($slug);
    }

    public function update(string $slug, array $validatedData): bool
    {
        return Category::update($validatedData);
    }

    public function destroy(string $slug): bool
    {
        return Category::where('slug', $slug)->delete();
    }
}
