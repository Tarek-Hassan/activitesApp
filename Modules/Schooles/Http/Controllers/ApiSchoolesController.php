<?php

namespace Modules\Schooles\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Schooles\Model\Schooles\Repositories\SchoolesRepository;

class ApiSchoolesController extends Controller
{
    private $Schoole;
    /**
     * SchooleRepository constructor.
     * @param Schoole $Schoole
     */
    public function __construct(SchoolesRepository $Schoole)
    {
        $this->Schoole = $Schoole;
    }



    public function all()
    {
        
       
        $Schooles= $this->Schoole->allData();
        return response()->json($Schooles);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('Schoole::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreSchooleRequest $request)
    {
        //
       
        
        $Schooles= $this->Schoole->create($request->all());

        return response()->json([
            'message' => ' success! ',
            'Schoole' => $Schooles
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        
        $Schooles= $this->Schoole->find($id);
        return response()->json([
            'message' => ' Schoole'.$id,
            'Schoole' => $Schooles
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('Schoole::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update($id,UpdateSchooleRequest $request )
    {
        //
        
        $Schooles= $this->Schoole->update($id,$request->all());
        return response()->json([
            'message' => ' updated! ',
            'Schoole' => $Schooles
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
        
        $this->Schoole->delete($id);
        return response()->json([
            'message' => 'Successfully deleted !'
        ]);
    }
}
