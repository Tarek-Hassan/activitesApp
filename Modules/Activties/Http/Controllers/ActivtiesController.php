<?php

namespace Modules\Activties\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Activties\Model\Activties\Repositories\ActivtiesRepository;
use Modules\Activties\Model\Activties\Requests\StoreActivtiesRequest;
use Modules\Activties\Model\Activties\Requests\UpdateActivtiesRequest;
// return view('activties::index');

class ActivtiesController extends Controller
{
/**
     * Display a listing of the resource.
     * @return Response
     */


    private $Activties;
    /**
     * UserRepository constructor.
     * @param Activties $Activties
     */
    public function __construct(ActivtiesRepository $Activties)
    {
        $this->Activties = $Activties;
    }


  


    public function index()
    {
        $data=$this->Activties->all();
        return view('activties::Activties.index',compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
  
    public function create()
    {
        return view('activties::Activties.create');
    }

    

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreActivtiesRequest $request)
    {
        $this->Activties->create($request->all());
        return redirect()->route('activties.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('activties::Activties.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data=$this->Activties->find($id);
        return view('activties::Activties.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateActivtiesRequest $request, $id)
    {
       
        //
        $this->Activties->update($id,$request->all());
        return redirect()->route('activties.index');
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
        $this->Activties->delete($id);
        return redirect()->route('activties.index');
    }
}
