<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Cost;

class CostApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cost()
    {
        $cost = Cost::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/costs', $cost
        );

        $this->assertApiResponse($cost);
    }

    /**
     * @test
     */
    public function test_read_cost()
    {
        $cost = Cost::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/costs/'.$cost->id
        );

        $this->assertApiResponse($cost->toArray());
    }

    /**
     * @test
     */
    public function test_update_cost()
    {
        $cost = Cost::factory()->create();
        $editedCost = Cost::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/costs/'.$cost->id,
            $editedCost
        );

        $this->assertApiResponse($editedCost);
    }

    /**
     * @test
     */
    public function test_delete_cost()
    {
        $cost = Cost::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/costs/'.$cost->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/costs/'.$cost->id
        );

        $this->response->assertStatus(404);
    }
}
