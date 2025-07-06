<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MotivationRequest;
use App\Services\Motivation\MotivationService;

class MotivationController extends Controller
{
protected $motivationService;

    public function __construct(MotivationService $motivationService)
    {
        $this->motivationService = $motivationService;
    }

    public function index()
    {
        $data['motivations'] = $this->motivationService->getAllMotivation(true, ['multipleImages']);
        return view('admin.home_pages.motivation.index')->with($data);
    }

    public function create()
    {
        return view('admin.home_pages.motivation.add');
    }

    public function store(MotivationRequest $request)
    {
        $this->motivationService->storeMotivation($request);
        return redirect()->route('admin.motivations.index')->with('success', 'Motivation saved successfully.');
    }

    public function edit($id)
    {
        $data['motivation'] = $this->motivationService->getAMotivation($id);
        return view('admin.home_pages.motivation.edit')->with($data);
    }

    public function update(MotivationRequest $request, $id)
    {
        $this->motivationService->updateMotivation($request, $id);
        return redirect()->route('admin.motivations.index')->with('success', 'Motivation updated successfully.');
    }

    public function destroy($id)
    {
        $deleted = $this->motivationService->destroyMotivation($id);

        if (!$deleted) {
            return back()->withErrors(['error' => 'Motivation not found.']);
        }

        return redirect()->route('admin.motivations.index')->with('success', 'Motivation deleted successfully.');
    }
}
