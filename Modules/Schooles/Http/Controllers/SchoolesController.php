<?php

namespace Modules\Schooles\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Schooles\Model\Schooles\Repositories\SchoolesRepository;
use Modules\Schooles\Model\Schooles\Requests\StoreSchoolesRequest;
use Modules\Schooles\Model\Schooles\Requests\UpdateSchoolesRequest;
use Modules\CountriesCities\Model\Country\Repositories\CountryRepository;
use Modules\Stages\Model\Stages\Repositories\StagesRepository;

// return view('schooles::index');

class SchoolesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */


    private $Schooles, $country ,$stage;
    /**
     * UserRepository constructor.
     * @param Schooles $Schooles
     */
    public function __construct(SchoolesRepository $Schooles,CountryRepository $country,StagesRepository $stage)
    {
        $this->Schooles = $Schooles;
        $this->country = $country;
        $this->stage = $stage;
    }


  


    public function index()
    {
        $data=$this->Schooles->allData();
        return view('schooles::Schooles.index',compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
  
    public function create()
    {
        $countries=$this->country->allData();
        $stages=$this->stage->all();
        return view('schooles::Schooles.create',compact('countries','stages'));
    }

    

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreSchoolesRequest $request)
    {
        $this->Schooles->create($request->all());
        return redirect()->route('schooles.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('schooles::Schooles.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $countries=$this->country->allData();
        $stages=$this->stage->all();
        $data=$this->Schooles->find($id);
        return view('schooles::Schooles.edit',compact('data','countries','stages'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateSchoolesRequest $request, $id)
    {
        //
        $this->Schooles->update($id,$request->all());
         return redirect()->route('schooles.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $this->Schooles->delete($id);
         return redirect()->route('schooles.index');
    }
}
