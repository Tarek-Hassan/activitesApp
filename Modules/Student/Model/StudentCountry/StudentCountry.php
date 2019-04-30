<?php

namespace Modules\Student\Model\StudentCountry;
use Modules\CountriesCities\Model\Country\Country;
use Illuminate\Database\Eloquent\Model;

class StudentCountry extends Country
{
    protected $fillable = ['selected'];
}
