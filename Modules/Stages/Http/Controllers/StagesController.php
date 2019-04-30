<?php

namespace Modules\Stages\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Stages\Model\Stages\Repositories\StagesRepository;
use Modules\Stages\Model\Stages\Requests\StoreStagesRequest;
use Modules\Stages\Model\Stages\Requests\UpdateStagesRequest;

class StagesController extends Controller
{
   /**
     * Display a listing of the resource.
     * @return Response
     */


    private $Stages;
    /**
     * UserRepository constructor.
     * @param Stages $Stages
     */
    public function __construct(StagesRepository $Stages)
    {
        $this->Stages = $Stages;
    }


  


    public function index()
    {
        $data=$this->Stages->all();
        return view('stages::Stages.index',compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
  
    public function create()
    {
        return view('stages::Stages.create');
    }

    

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreStagesRequest $request)
    {
        $this->Stages->create($request->all());
        return redirect()->route('stages.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('stages::Stages.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data=$this->Stages->find($id);
        return view('stages::Stages.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateStagesRequest $request, $id)
    {
       
        //
        $this->Stages->update($id,$request->all());
        return redirect()->route('stages.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        dd($id);
        $this->Stages->delete($id);
        return redirect()->route('stages.index');
    }
}
