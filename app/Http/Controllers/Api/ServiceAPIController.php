<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Resources\ServiceResource;

class ServiceAPIController extends Controller
{
    public function index(Request $request) {
        $title = $request->get('title') ?? '';
        $services = Service::orderBy('title');
        if (!empty($title)) {
            $services = $services->where('title', 'LIKE', '%' . $title . '%');
        }
        $services = $services->get();
        return ServiceResource::collection($services);
    }
}
