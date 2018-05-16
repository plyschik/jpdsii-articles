<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoriesController extends Controller
{
    public function list()
    {
        $categories = Category::query()
            ->orderByDesc('id')
            ->paginate(10)
        ;

        return view('dashboard.categories.list', [
            'categories' => $categories
        ]);
    }

    public function delete(Category $category)
    {
        try {
            $category->delete();
        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }

        return back()->withSuccess(__('messages.dashboard.alerts.categories.deleted'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(StoreCategory $request)
    {
        $created = Category::create([
            'name' => $request->get('name')
        ]);

        if (!$created) {
            abort(500, 'Category was not created.');
        }

        return redirect()
            ->route('dashboard.categories.list')
            ->withSuccess(__('messages.dashboard.alerts.categories.added'))
        ;
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(StoreCategory $request, Category $category)
    {
        try {
            $category->update([
                'name' => $request->get('name')
            ]);
        } catch (ModelNotFoundException $exception) {
            abort(404, 'Category not found.');
        }

        return redirect()
            ->route('dashboard.categories.list')
            ->withSuccess(__('messages.dashboard.alerts.categories.edited'))
        ;
    }
}