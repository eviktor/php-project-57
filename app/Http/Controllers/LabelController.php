<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $labels = Label::orderBy('id')->paginate(10);
        $inputName = $request->input('name');

        return view('label.index', compact('labels', 'inputName'));
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:labels',
            'description' => ''
        ]);

        $label = new Label($validatedData);
        $label->save();
        flash(__('Label created successfully'), 'success');
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
    public function update(Request $request, Label $label)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:labels',
            'description' => ''
        ]);

        $label->fill($validatedData);
        $label->save();
        flash(__('Label updated successfully'), 'success');
        return redirect()->route('labels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Label $label)
    {
        if ($label->tasks()->exists()) {
            flash(__('Cannot delete label'), 'error');
        } else {
            $label->delete();
            flash(__('Label removed successfully'), 'success');
        }

        return redirect()->route('labels.index');
    }
}
