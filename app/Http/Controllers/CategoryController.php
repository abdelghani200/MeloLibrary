<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(5);
        // dd($categories);

        return view('categories.index', compact('categories'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/categories';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Category::create($input);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'sometimes',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'sometimes',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/categories';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        // $category->update($input);

        $category->fill($input);
        $category->save();


        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Category $category)
    {
        // // Get all child music records associated with the category
        // $music = Music::where('category_id', $category->id)->get();

        // // Delete the child music records
        // foreach ($music as $song) {
        //     $song->delete();
        // }

        // Delete the category record
        $category->delete();

        return redirect()->route('categories.index');
    }
}
