<?php

namespace Modules\Student\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CountriesCities\Model\Country\Repositories\CountryRepository;
use Modules\Student\Model\Student\Repositories\StudentRepository;
use Modules\Student\Model\StudentCountry\Requests\StoreStudentCountryRequest;
use Modules\Student\Model\StudentCountry\Requests\UpdateStudentCountryRequest;

class APIStudentsController extends Controller
{
    private $country,$student;
    /**
     * uploadRepository constructor.
     * @param country $country
     */
    public function __construct(CountryRepository $country,StudentRepository $student)
    {
        $this->country = $country;
        $this->student=$student;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $student= $this->student->allData();
        return response()->json($student);
    }

    public function countrySelcted()
    {
        $country= $this->country->selectedCountry();
        return response()->json($country);
    }
    

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreStudentCountryRequest $request)
    {
        //
        $student= $this->student->create($request->all());

        return response()->json([
            'message' => ' success! ',
            'student' => $student
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $student= $this->student->findCountry($id);
        return response()->json([  
            'student' => $student
        ]);
    }

  

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateStudentCountryRequest $request, $id)
    {
        //
        $student= $this->student->update($id,$request->all());
        return response()->json([
            'message' => ' updated! ',
            'student' => $student
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
        $this->student->delete($id);
        return response()->json([
            'message' => 'Successfully deleted !'
        ]);
    }
}
