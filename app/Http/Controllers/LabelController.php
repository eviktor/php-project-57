<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class LabelController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show'])
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => __('views.label.name_required'),
            'name.unique' => __('views.label.name_unique'),
        ];
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:labels',
            'description' => ''
        ], $this->messages());

        $label = new Label($validatedData);
        $label->save();
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
    public function update(Request $request, Label $label)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:labels,name,' . $label->id,
            'description' => ''
        ], $this->messages());

        $label->fill($validatedData);
        $label->save();
        flash(__('views.label.updated'), 'success');
        return redirect()->route('labels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Label $label)
    {
        if ($label->tasks()->exists()) {
            flash(__('views.label.cannot_delete'), 'error');
        } else {
            $label->delete();
            flash(__('views.label.deleted'), 'success');
        }

        return redirect()->route('labels.index');
    }
}
