<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCostAPIRequest;
use App\Http\Requests\API\UpdateCostAPIRequest;
use App\Models\Cost;
use App\Repositories\CostRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CostController
 * @package App\Http\Controllers\API
 */

class CostAPIController extends AppBaseController
{
    /** @var  CostRepository */
    private $costRepository;

    public function __construct(CostRepository $costRepo)
    {
        $this->costRepository = $costRepo;
    }

    /**
     * Display a listing of the Cost.
     * GET|HEAD /costs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $costs = $this->costRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($costs->toArray(), 'Costs retrieved successfully');
    }

    /**
     * Store a newly created Cost in storage.
     * POST /costs
     *
     * @param CreateCostAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCostAPIRequest $request)
    {
        $input = $request->all();

        $cost = $this->costRepository->create($input);

        return $this->sendResponse($cost->toArray(), 'Cost saved successfully');
    }

    /**
     * Display the specified Cost.
     * GET|HEAD /costs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cost $cost */
        $cost = $this->costRepository->find($id);

        if (empty($cost)) {
            return $this->sendError('Cost not found');
        }

        return $this->sendResponse($cost->toArray(), 'Cost retrieved successfully');
    }

    /**
     * Update the specified Cost in storage.
     * PUT/PATCH /costs/{id}
     *
     * @param int $id
     * @param UpdateCostAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCostAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cost $cost */
        $cost = $this->costRepository->find($id);

        if (empty($cost)) {
            return $this->sendError('Cost not found');
        }

        $cost = $this->costRepository->update($input, $id);

        return $this->sendResponse($cost->toArray(), 'Cost updated successfully');
    }

    /**
     * Remove the specified Cost from storage.
     * DELETE /costs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Cost $cost */
        $cost = $this->costRepository->find($id);

        if (empty($cost)) {
            return $this->sendError('Cost not found');
        }

        $cost->delete();

        return $this->sendSuccess('Cost deleted successfully');
    }
}
