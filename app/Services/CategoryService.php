<?php

namespace App\Services;

use App\Repositories\contracts\CategoryRepositoryInterface;

class CategoryService
{
    public function __construct(protected CategoryRepositoryInterface $categoryRepository)
    {
    }


}
