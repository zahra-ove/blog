<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Repositories\contracts\CategoryRepositoryInterface;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $categoryService, protected CategoryRepositoryInterface $categoryRepository)
    {
    }

    public function index(): JsonResponse
    {
        $categories = request()->filled('paginated')
                        ? $this->categoryRepository->paginate()
                        : $this->categoryRepository->all();

        return response()->json($categories, Response::HTTP_OK);
    }

    public function store(CategoryStoreRequest $request, $categoryRepository): JsonResponse
    {
        $category = $this->categoryRepository->store($request->validate());
        return response()->json($category, Response::HTTP_CREATED);
    }

    public function findById(int $id): JsonResponse
    {
        $category = $this->categoryRepository->find($id);
        return response()->json($category, Response::HTTP_OK);
    }

    public function findBySlug(string $slug): JsonResponse
    {
        $category = $this->categoryRepository->findBy('slug', $slug);
        return response()->json($category, Response::HTTP_OK);
    }

    public function update(CategoryUpdateRequest $request, string $id)
    {
        $result = $this->categoryRepository->update($id, $request->validated());
        return response()->json($result, Response::HTTP_OK);
    }

    public function destroy(string $id): JsonResponse
    {
        $this->categoryRepository->destroy($id);
        return response()->json('', Response::HTTP_NO_CONTENT);
    }
}
