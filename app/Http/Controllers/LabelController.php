<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLabelRequest;
use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LabelController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Label::class, 'label');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $labels = Label::orderBy('id')->paginate(10);
        return view('label.index', compact('labels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $label = new Label();
        return view('label.create', compact('label'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLabelRequest $request)
    {
        Label::create($request->validated());
        flash(__('views.label.created'), 'success');
        return redirect()->route('labels.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Label $label)
    {
        return view('label.show', compact('label'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Label $label)
    {
        return view('label.edit', compact('label'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreLabelRequest $request, Label $label)
    {
        $label->fill($request->validated());
        $label->save();
        flash(__('views.label.updated'), 'success');
        return redirect()->route('labels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Label $label)
    {
        if (Gate::allows('delete', $label)) {
            $label->delete();
            flash(__('views.label.deleted'), 'success');
        } else {
            flash(__('views.label.cannot_delete'), 'error');
        }

        return redirect()->route('labels.index');
    }
}
