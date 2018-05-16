<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoriesController extends Controller
{
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
            return back()->withWarning(__('messages.site.alerts.something_went_wrong'));
        }

        return redirect()
            ->route('dashboard.categories.list')
            ->withSuccess(__('messages.dashboard.alerts.categories.added'))
        ;
    }

    public function list()
    {
        $categories = Category::query()->orderByDesc('id');

        return view('dashboard.categories.list', [
            'categories' => $categories->paginate(10)
        ]);
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
            return back()->withWarning(__('messages.site.alerts.something_went_wrong'));
        }

        return redirect()
            ->route('dashboard.categories.list')
            ->withSuccess(__('messages.dashboard.alerts.categories.edited'))
        ;
    }

    public function delete(Category $category)
    {
        try {
            $category->delete();
        } catch (\Exception $exception) {
            return back()->withWarning(__('messages.site.alerts.something_went_wrong'));
        }

        return back()->withSuccess(__('messages.dashboard.alerts.categories.deleted'));
    }
}