<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AccomodationRepository;

class AccomodationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AccomodationRepository $accomodation)
    {
        $this->accomodation = $accomodation;
    }

    public function index(){
        $data = $this->accomodation->get();
        $dataResponse = $this->accomodation->jsonResponse('Accomodation data', $data, 200);
        return $dataResponse;
    }

    public function show($params){
        if(is_numeric($params)){
            $data = $this->accomodation->find($params);
            $dataResponse = $this->accomodation->jsonResponse('Accomodation data id : '.$params.'', $data, 200);
            return $dataResponse;
        } else {
            $data = $this->accomodation->findBy('name', $params);
            $dataResponse = $this->accomodation->jsonResponse('Accomodation data : '.$params.'', $data, 200);
            return $dataResponse;
        }
    }

    public function store(Request $request){

        $input = $request->all();
        $data = $this->accomodation->insert($input);
        $dataResponse = $this->accomodation->jsonResponse('Property data added', $data, 201);

        return $dataResponse;
    }

    public function update(Request $request, $id){

        $input = $request->all();
        $data  = $this->accomodation->update($id, $input);
        $dataResponse = $this->accomodation->jsonResponse('Property data by id : '.$id.' updated', $data, 201);
        return $dataResponse;
    }

    public function destroy($id){

        $data  = $this->accomodation->delete($id);
        if ($data){
            $dataResponse = $this->accomodation->jsonResponse('Property data by id : '.$id.' deleted', $data, 201);
            return $dataResponse;
        }

        $dataResponse = $this->accomodation->jsonResponse('Property data by id : '.$id.' not found', $data, 404);
        return $dataResponse;
    }

}
