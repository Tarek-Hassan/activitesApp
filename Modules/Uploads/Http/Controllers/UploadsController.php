<?php

namespace Modules\Uploads\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Uploads\Model\Uploads\Repositories\UploadsRepository;
use Modules\Uploads\Model\Uploads\Requests\StoreUploadsRequest;
use Modules\Uploads\Model\Uploads\Requests\UpdateUploadsRequest;
use Modules\Schooles\Model\Schooles\Repositories\SchoolesRepository;
use Modules\CountriesCities\Model\Country\Repositories\CountryRepository;
use Modules\Activties\Model\Activties\Repositories\ActivtiesRepository;
use Modules\Stages\Model\Stages\Repositories\StagesRepository;


class UploadsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */


    private $Uploads,$schooles,$countries,$activties,$stages;
    /**
     * UserRepository constructor.
     * @param Uploads $Uploads
     */
    public function __construct(UploadsRepository $Uploads,SchoolesRepository $schooles,CountryRepository $countries,ActivtiesRepository $activties,StagesRepository $stages)
    {
        $this->Uploads = $Uploads;
        $this->schooles = $schooles;
        $this->countries = $countries;
        $this->activties = $activties;
        $this->stages = $stages;
    }


  


    public function index()
    {
        $data=$this->Uploads->allData();
        $countries=$this->countries->allData();
        $activties=$this->activties->all();
        return view('uploads::Uploads.index',compact('data','countries','activties'));
        
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
  
    public function create()
    {
        $schooles=$this->schooles->allData();
        $countries=$this->countries->allData();
        $activties=$this->activties->all();
        $stages=$this->stages->all();
        return view('uploads::Uploads.create',compact('schooles','countries','activties','stages'));
    }

    

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        
        
        $this->Uploads->create($request->all());
        return redirect()->route('uploads.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('uploads::Uploads.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $schooles=$this->schooles->allData();
        $countries=$this->countries->allData();
        $activties=$this->activties->all();
        $stages=$this->stages->all();
        $data=$this->Uploads->find($id);
        return view('uploads::Uploads.edit',compact('data','schooles','countries','activties','stages'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateUploadsRequest $request, $id)
    {
       
        //
        $this->Uploads->update($id,$request->all());
        return redirect()->route('uploads.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
      
        $this->Uploads->delete($id);
        return redirect()->route('uploads.index');
    }
}
