<?php namespace Tests\Repositories;

use App\Models\Cost;
use App\Repositories\CostRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CostRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CostRepository
     */
    protected $costRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->costRepo = \App::make(CostRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cost()
    {
        $cost = Cost::factory()->make()->toArray();

        $createdCost = $this->costRepo->create($cost);

        $createdCost = $createdCost->toArray();
        $this->assertArrayHasKey('id', $createdCost);
        $this->assertNotNull($createdCost['id'], 'Created Cost must have id specified');
        $this->assertNotNull(Cost::find($createdCost['id']), 'Cost with given id must be in DB');
        $this->assertModelData($cost, $createdCost);
    }

    /**
     * @test read
     */
    public function test_read_cost()
    {
        $cost = Cost::factory()->create();

        $dbCost = $this->costRepo->find($cost->id);

        $dbCost = $dbCost->toArray();
        $this->assertModelData($cost->toArray(), $dbCost);
    }

    /**
     * @test update
     */
    public function test_update_cost()
    {
        $cost = Cost::factory()->create();
        $fakeCost = Cost::factory()->make()->toArray();

        $updatedCost = $this->costRepo->update($fakeCost, $cost->id);

        $this->assertModelData($fakeCost, $updatedCost->toArray());
        $dbCost = $this->costRepo->find($cost->id);
        $this->assertModelData($fakeCost, $dbCost->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cost()
    {
        $cost = Cost::factory()->create();

        $resp = $this->costRepo->delete($cost->id);

        $this->assertTrue($resp);
        $this->assertNull(Cost::find($cost->id), 'Cost should not exist in DB');
    }
}
