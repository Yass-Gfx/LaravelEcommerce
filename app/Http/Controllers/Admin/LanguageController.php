<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::selection()->paginate(PAGINATION_COUNT);
        return view('admin.languages.index', compact('languages'));
    }

    public function create()
    {
        return view('admin.languages.create');
    }

    public function store(LanguageRequest $request)
    {
        try {
            if (empty($request->active)) {
                $request->request->add(['active' => 0]);
            }

            Language::create($request->except(['_token']));
            return redirect()->route('admin.languages')->with(['success' => 'تم حفظ اللغة بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.languages')->with(['error' => 'حدثت مشكلة يجب المحاولة مرة اخرى']);
        }
    }

    public function edit($id)
    {
        $language = Language::selection()->find($id);
        if (!$language) {
            return redirect()->route('admin.languages')->with(['error' => 'هذه اللغة غير موجودة']);
        }

        return view('admin.languages.edit', compact('language'));
    }

    public function update(LanguageRequest $request, $id)
    {
        // Update Language in DB
        try {

            $language = Language::find($id);
            if (!$language) {
                return redirect()->route('admin.languages.edit', $id)->with(['error' => 'هذه اللغة غير موجودة']);
            }

            if (empty($request->active)) {
                $request->request->add(['active' => 0]);
            }

            $language->update($request->except(['_token']));
            return redirect()->route('admin.languages')->with(['success' => 'تم تحديث اللغة بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.languages')->with(['error' => 'حدثت مشكلة يجب المحاولة مرة اخرى']);
        }
    }


    public function destroy($id)
    {
        try {
            $language = Language::find($id);
            if (!$language) {
                return redirect()->route('admin.languages')->with(['error' => 'هذه اللغة غير موجودة']);
            }

            $language->delete($id);
            return redirect()->route('admin.languages')->with(['success' => 'تم حذف اللغة بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.languages')->with(['error' => 'حدثت مشكلة يجب المحاولة مرة اخرى']);
        }
    }
}