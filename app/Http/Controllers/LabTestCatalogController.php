<?php

namespace App\Http\Controllers;

use App\Models\LabTestCatalog;
use Illuminate\Http\Request;

class LabTestCatalogController extends Controller
{
    public function index()
    {
        if (!\Auth::user()->can('manage lab test catalog')) {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

        $catalogs = LabTestCatalog::where('created_by', \Auth::user()->creatorId())
            ->orderBy('name')
            ->get();

        return view('lab_test_catalog.index', compact('catalogs'));
    }

    public function create()
    {
        if (!\Auth::user()->can('create lab test catalog')) {
            return response()->json(['error' => __('Permission denied.')], 401);
        }

        return view('lab_test_catalog.create');
    }

    public function store(Request $request)
    {
        if (!\Auth::user()->can('create lab test catalog')) {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'code' => 'nullable|string|max:255',
            'sample_type' => 'nullable|string|max:255',
            'unit' => 'nullable|string|max:255',
            'reference_range' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'instructions' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->getMessageBag()->first());
        }

        LabTestCatalog::create([
            'name' => $request->name,
            'code' => $request->code,
            'sample_type' => $request->sample_type,
            'unit' => $request->unit,
            'reference_range' => $request->reference_range,
            'price' => $request->price ?: 0,
            'critical_supported' => $request->has('critical_supported'),
            'instructions' => $request->instructions,
            'is_active' => $request->has('is_active'),
            'created_by' => \Auth::user()->creatorId(),
        ]);

        return redirect()->route('lab-test-catalogs.index')->with('success', __('Lab test successfully created.'));
    }

    public function show($id)
    {
        if (!\Auth::user()->can('show lab test catalog')) {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

        $catalog = LabTestCatalog::where('created_by', \Auth::user()->creatorId())->findOrFail($id);

        return view('lab_test_catalog.show', compact('catalog'));
    }

    public function edit($id)
    {
        if (!\Auth::user()->can('edit lab test catalog')) {
            return response()->json(['error' => __('Permission denied.')], 401);
        }

        $catalog = LabTestCatalog::where('created_by', \Auth::user()->creatorId())->findOrFail($id);

        return view('lab_test_catalog.edit', compact('catalog'));
    }

    public function update(Request $request, $id)
    {
        if (!\Auth::user()->can('edit lab test catalog')) {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

        $catalog = LabTestCatalog::where('created_by', \Auth::user()->creatorId())->findOrFail($id);

        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'code' => 'nullable|string|max:255',
            'sample_type' => 'nullable|string|max:255',
            'unit' => 'nullable|string|max:255',
            'reference_range' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'instructions' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->getMessageBag()->first());
        }

        $catalog->update([
            'name' => $request->name,
            'code' => $request->code,
            'sample_type' => $request->sample_type,
            'unit' => $request->unit,
            'reference_range' => $request->reference_range,
            'price' => $request->price ?: 0,
            'critical_supported' => $request->has('critical_supported'),
            'instructions' => $request->instructions,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('lab-test-catalogs.index')->with('success', __('Lab test successfully updated.'));
    }

    public function destroy($id)
    {
        if (!\Auth::user()->can('delete lab test catalog')) {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

        $catalog = LabTestCatalog::where('created_by', \Auth::user()->creatorId())->findOrFail($id);
        $catalog->delete();

        return redirect()->route('lab-test-catalogs.index')->with('success', __('Lab test successfully deleted.'));
    }
}
