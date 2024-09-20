<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schedule;
use Tests\TestCase;

class DiscountFeatureTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testFamilyMemberDiscount()
    {
        $user = User::factory()->create();
        

        $response = $this->postJson('/api/discounts/apply', [
            'user_id' => $user->id,
            'schedule_id' => 101,
            'is_family' => true
        ]);

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'total_discount',
                    'applied_discounts'
                ]);
    }
}
