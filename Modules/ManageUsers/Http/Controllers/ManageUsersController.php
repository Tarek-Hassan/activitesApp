<?php

namespace Modules\ManageUsers\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ManageUsers\Model\ManageUsers\Repositories\ManageUsersRepository;
use Modules\ManageUsers\Model\ManageUsers\Requests\StoreManageUsersRequest;
use Modules\ManageUsers\Model\ManageUsers\Requests\UpdateManageUsersRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Modules\CountriesCities\Model\Country\Repositories\CountryRepository;
use Modules\Stages\Model\Stages\Repositories\StagesRepository;
use Modules\Schooles\Model\Schooles\Repositories\SchoolesRepository;
// return view('manageusers::index');
class ManageUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */


    private $ManageUsers,$country,$stage,$schoole;
    /**
     * UserRepository constructor.
     * @param ManageUsers $ManageUsers
     */
    public function __construct(ManageUsersRepository $ManageUsers,CountryRepository $country ,StagesRepository $stage ,SchoolesRepository $schoole)
    {
        $this->ManageUsers = $ManageUsers;
        $this->country = $country;
        $this->stage = $stage;
        $this->schoole = $schoole;
    }


  


    public function index()
    {
        $data=$this->ManageUsers->allData();
        return view('manageusers::ManageUsers.index',compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
  
    public function create()
    {
        $countries=$this->country->allData();
        $stages=$this->stage->all();
        $schooles=$this->schoole->all();
        return view('manageusers::ManageUsers.create',compact('countries','stages','schooles'));
    }

    

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreManageUsersRequest $request)
    {
        $this->ManageUsers->create($request->all());
       return redirect()->route('manageusers.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('manageusers::ManageUsers.show');
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
        $schooles=$this->schoole->all();
        $data=$this->ManageUsers->find($id);
        return view('manageusers::ManageUsers.edit',compact('data','countries','stages','schooles'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateManageUsersRequest $request, $id)
    {
       
        //
        $this->ManageUsers->update($id,$request->all());
       return redirect()->route('manageusers.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $this->ManageUsers->delete($id);
       return redirect()->route('manageusers.index');
        
    }
}
