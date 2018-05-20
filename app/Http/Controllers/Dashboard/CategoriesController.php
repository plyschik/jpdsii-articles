<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use Illuminate\Http\Request;
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
            return back()->with('warning', __('messages.site.alerts.something_went_wrong'));
        }

        return redirect()
            ->route('dashboard.categories.list')
            ->with('success', __('messages.dashboard.alerts.categories.added'))
        ;
    }

    public function list(Request $request)
    {
        $categories = Category::query()->latest('id');

        if ($request->has('search')) {
            $search = $request->get('search');

            $categories->where('name', 'LIKE', "{$search}%");
        }

        return view('dashboard.categories.list', [
            'categories' => $categories->paginate(10)
        ]);
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(StoreCategory $request, Category $category)
    {
        try {
            $category->update([
                'name' => $request->get('name')
            ]);
        } catch (ModelNotFoundException $exception) {
            return back()->with('warning', __('messages.site.alerts.something_went_wrong'));
        }

        return redirect()
            ->route('dashboard.categories.list')
            ->with('success', __('messages.dashboard.alerts.categories.edited'))
        ;
    }

    public function delete(Category $category)
    {
        try {
            $category->delete();
        } catch (\Exception $exception) {
            return back()->with('warning', __('messages.site.alerts.something_went_wrong'));
        }

        return back()->with('success', __('messages.dashboard.alerts.categories.deleted'));
    }
}