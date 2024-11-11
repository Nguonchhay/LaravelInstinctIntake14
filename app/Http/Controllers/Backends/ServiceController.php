<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreServiceRequest;
use App\Models\Category;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index() {
        $services = Service::get();
        return view('backends.services.index', [
            'services' => $services
        ]);
    }

    public function create() {
        $categories = Category::pluck('title', 'id')->toArray();
        return view('backends.services.create', [
            'categories' => $categories
        ]);
    }

    public function store(StoreServiceRequest $request) {
        $service = new Service();
        $service->category_id = $request->get('category_id');
        $service->title = $request->get('title');
        $service->icon = $request->get('icon');
        $service->content = $request->get('content') ?? '';

        $uploadImage = $request->file('image');
        if ($uploadImage) {
            $fileName = time() . '_' . $uploadImage->getClientOriginalName();
            $filePath = $uploadImage->storeAs('uploads', $fileName);
            $service->image = $filePath;
        }

        $service->save();
        return redirect(route('backends.services.index'));
    }

    public function show(Service $service) {

    }

    public function edit(Service $service) {

    }

    public function update(Service $service, Request $request) {

    }

    public function destroy(Service $service) {

    }
}
