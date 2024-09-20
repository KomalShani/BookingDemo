<?php

namespace App\Http\Controllers;

use App\Services\DiscountService;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    protected $discountService;

    public function __construct(DiscountService $discountService)
    {
        $this->discountService = $discountService;
    }

    public function applyDiscount(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'schedule_id' => 'required|integer',
            'is_family' => 'boolean'
        ]);

        $result = $this->discountService->applyDiscount($validated['user_id'], $validated['schedule_id'], $validated['is_family']);

        return response()->json($result);
    }
}
