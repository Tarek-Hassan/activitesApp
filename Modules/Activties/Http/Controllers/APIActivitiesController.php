<?php

namespace Modules\Activties\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Activties\Model\Activties\Repositories\ActivtiesRepository;
use Modules\Activties\Model\Activties\Requests\StoreActivtiesRequest;
use Modules\Activties\Model\Activties\Requests\UpdateActivtiesRequest;

class APIActivitiesController extends Controller
{
    private $activities;
    /**
     * uploadRepository constructor.
     * @param activities $activities
     */
    public function __construct(ActivtiesRepository $activities)
    {
        $this->activities = $activities;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $activities= $this->activities->allApiData();
        return response()->json($activities);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreactivitiesRequest $request)
    {
        //
        $activities= $this->activities->create($request->all());

        return response()->json([
            'message' => ' success! ',
            'upload' => $activities
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $activities= $this->activities->find($id);
        return response()->json([
            'message' => ' upload'.$id,
            'upload' => $activities
        ]);
    }

  

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateactivitiesRequest $request, $id)
    {
        //
        $activities= $this->activities->update($id,$request->all());
        return response()->json([
            'message' => ' updated! ',
            'upload' => $activities
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $this->activities->delete($id);
        return response()->json([
            'message' => 'Successfully deleted !'
        ]);
    }
}
