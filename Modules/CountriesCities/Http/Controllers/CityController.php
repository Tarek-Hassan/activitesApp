<?php

namespace Modules\CountriesCities\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CountriesCities\Model\City\Repositories\CityRepository;
use Modules\CountriesCities\Model\City\Requests\StoreCityRequest;
use Modules\CountriesCities\Model\City\Requests\UpdateCityRequest;
use Modules\CountriesCities\Model\Country\Repositories\CountryRepository;

class CityController extends Controller
{
  /**
     * Display a listing of the resource.
     * @return Response
     */


    private $City, $country;
    /**
     * UserRepository constructor.
     * @param City $City
     */
    public function __construct(CityRepository $City,CountryRepository $country)
    {
        $this->City = $City;
        $this->country = $country;
    }


  


    public function index()
    {
        $data=$this->City->allData();
        return view('countriescities::City.index',compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
  
    public function create()
    {
        $countries=$this->country->all();
        return view('countriescities::City.create',compact('countries'));
    }

    

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreCityRequest $request)
    {
        $this->City->create($request->all());
        return redirect()->route('city.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('countriescities::City.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $countries=$this->country->all();
        $data=$this->City->find($id);
        return view('countriescities::City.edit',compact('data','countries'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateCityRequest $request, $id)
    {
        //
        $this->City->update($id,$request->all());
         return redirect()->route('city.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $this->City->delete($id);
         return redirect()->route('city.index');
    }
}
