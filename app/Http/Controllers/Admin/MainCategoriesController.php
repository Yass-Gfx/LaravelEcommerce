<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Support\Str;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use App\Http\Requests\MainCategoryRequest;

class MainCategoriesController extends Controller
{
    public function index()
    {
        $defaultLang = getDefaultLang();
        $maincategories = MainCategory::where('translation_lang', $defaultLang)->selection()->get();
        return view('admin.maincategories.index', compact('maincategories'));
    }

    public function create()
    {
        return view('admin.maincategories.create');
    }

    public function store(MainCategoryRequest $request)
    {

        try {
            /** Begin Data Transtion in DB */
            DB::beginTransaction();


            $request_main_categories = collect($request->category);
            /** Filter Category to get the main one */
            $filterCat = $request_main_categories->filter(function ($value, $key) {
                return $value['abbr'] == getDefaultLang();
            });
            /** grap the first array */
            $default_category =  array_values($filterCat->all())[0];
            /** upload image and return path to add in db */
            $filePath = '';
            if ($request->has('photo')) {
                $filePath = uploadImage('maincategories', $request->photo);
            }

            /** save the main category and get the id */
            $default_cateogry_id = MainCategory::insertGetId([
                'translation_lang' => $default_category['abbr'],
                'name' => $default_category['name'],
                'translation_of' => 0,
                'slug' => str::slug($default_category['name'], '-'),
                'photo' => $filePath
            ]);
            /** filter the request id to get the rest categories */
            $not_main_category = $request_main_categories->filter(function ($value, $key) {
                return $value['abbr'] != getDefaultLang();
            });
            /** Check if there is data in the array */
            if (isset($not_main_category) && $not_main_category->count()) {
                /** make empty array to save all data to save performance */
                $categories_arr = [];
                foreach ($not_main_category as $category) {
                    /** loop and push data to the empty array */
                    $categories_arr[] = [
                        'translation_lang' => $category['abbr'],
                        'name' => $category['name'],
                        'translation_of' => $default_cateogry_id,
                        'slug' => str::slug($category['name'], '-'),
                        'photo' => $filePath
                    ];
                }
                /** insert data in DB */
                MainCategory::insert($categories_arr);
            }
            /** Commit Data Transaction */
            DB::commit();
            /** return view with data */
            return redirect()->route('admin.maincategories')->with(['success' => 'تم اضافة القسم بنجاح']);
        } catch (\Exception $ex) {
            /** if there error in insert data roll back insert db */
            DB::rollback();
            return redirect()->route('admin.maincategories')->with(['error' => 'حدثت مشكلة يجب المحاولة مرة اخرى']);
        }
    }

    public function edit($id)
    {
        $mainCategory = MainCategory::selection()->find($id);
        if (!$mainCategory) {
            return redirect()->route('admin.maincategories')->with(['error' => 'هذا القسم غير موجود']);
        }
        return view('admin.maincategories.edit', compact('mainCategory'));
    }

    public function update($id)
    {
    }

    public function destroy($id)
    {
    }
}