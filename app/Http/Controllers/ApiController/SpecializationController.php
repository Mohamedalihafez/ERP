<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Http\Traits\Json;
use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    use Json;

    public function specializationData(Request $request)
    {
        $Data = Specialization::specializationData($request);

        return $this->result(200,$Data);
    }

    public function specializationDelete(Request $request)
    {
        $Data = Specialization::specializationDelete($request);

        return $this->result(200,$Data);
    }


    

}
