<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class DraftCollectionController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json([
            'html' => view('components.draft-collection-form'),
        ]);
    }
}
