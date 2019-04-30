<?php

namespace Modules\Student\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Student\Model\Student\Repositories\StudentRepository;
use Modules\Student\Model\Student\Requests\StoreStudentRequest;
use Modules\Student\Model\Student\Requests\UpdateStudentRequest;
use Modules\CountriesCities\Model\Country\Repositories\CountryRepository;
use Modules\Schooles\Model\Schooles\Repositories\SchoolesRepository;
use Modules\Stages\Model\Stages\Repositories\StagesRepository;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    private $Student,$Country,$Schooles,$Stage;
    /**
     * UserRepository constructor.
     * @param Country $Country
     */
    public function __construct(CountryRepository $Country,StudentRepository $Student,SchoolesRepository $Schooles,StagesRepository $Stage)
    {
        $this->Student = $Student;
        $this->Country = $Country;
        $this->Schooles = $Schooles;
        $this->Stage = $Stage;
    }

    public function index()
    {
        $data=$this->Student->allData();
        $countries=$this->Country->selectedCountry();
        return view('student::Student.index',compact('data','countries'));
        
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
  
    public function create()
    {
        $schooles=$this->Schooles->allData();
        $countries=$this->Country->selectedCountry();
        $stages=$this->Stage->all();
     
        return view('student::Student.create',compact('schooles','countries','stages'));
    }

    

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreStudentRequest $request)
    {
        $this->Student->create($request->all());
        return redirect()->route('student.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('student::Student.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $schooles=$this->Schooles->allData();
        $countries=$this->Country->selectedCountry();
        $stages=$this->Stage->all();
        $data=$this->Student->find($id);
        return view('student::Student.edit',compact('data','schooles','countries','stages'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateStudentRequest $request, $id)
    {
       
        //
        $this->Student->update($id,$request->all());
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $this->Student->delete($id);
        return redirect()->route('student.index');
    }
}
