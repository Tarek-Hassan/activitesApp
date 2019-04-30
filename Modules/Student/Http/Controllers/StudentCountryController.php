<?php

namespace Modules\Student\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CountriesCities\Model\Country\Repositories\CountryRepository;
use Modules\Student\Model\StudentCountry\Requests\StoreStudentCountryRequest;
use Modules\Student\Model\StudentCountry\Requests\UpdateStudentCountryRequest;
// return view('student::index');

class StudentCountryController extends Controller
{
     /**
     * Display a listing of the resource.
     * @return Response
     */


    private $Country;
    /**
     * UserRepository constructor.
     * @param Country $Country
     */
    public function __construct(CountryRepository $Country)
    {
        $this->Country = $Country;
    }



  


    public function index()
    {
        $data=$this->Country->all();
        return view('student::StudentCountry.index',compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
  
    // public function create()
    // {
    //     return view('student::StudentCountry.create');
    // }

    

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    // public function store(StoreStudentCountryRequest $request)
    // {
    //     $this->Country->create($request->all());
    //     return redirect()->route('studentcountry.index');
    // }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    // public function show($id)
    // {
    //     return view('student::StudentCountry.show');
    // }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data=$this->Country->find($id);
        return view('student::StudentCountry.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateStudentCountryRequest $request, $id)
    {
    //    dd($request->all());
    //     //
        $this->Country->update($id,$request->all());
        return redirect()->route('studentcountry.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    // public function destroy($id)
    // {
    //     //
    //     $this->StudentCountry->delete($id);
    //     return redirect()->route('studentcountry.index');
    // }
}
