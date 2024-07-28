<?php

namespace App\Repositories\contracts;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
    public function all(array $columns = ['*'], array $relations = []): Collection;
    public function allPaginated(int $limit=20, array $columns = ['*']): Paginator;
    public function store(array $validatedData): Category;

    public function show(string $slug): Category;

    public function update(string $slug, array $data): bool;

    public function destroy(string $slug): bool;
}
