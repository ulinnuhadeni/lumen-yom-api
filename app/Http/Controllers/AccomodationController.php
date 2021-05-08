<?php

namespace App\Http\Controllers;

use App\Libraries\Helper;
use Illuminate\Http\Request;
use App\Repositories\AccomodationRepository;

class AccomodationController extends Controller
{

    public function __construct(AccomodationRepository $accomodation, Helper $helper)
    {
        $this->helper = $helper;
        $this->accomodation = $accomodation;
    }

    public function index(){
        $data = $this->accomodation->get();
        $dataResponse = $this->helper->jsonResponse('Accomodation data', $data, 200);
        return $dataResponse;
    }

    public function show($params){
        if(is_numeric($params)){
            $data = $this->accomodation->find($params);
            $dataResponse = $this->helper->jsonResponse('Accomodation data id : '.$params.'', $data, 200);
            return $dataResponse;
        } else {
            $data = $this->accomodation->findBy('name', $params);
            $dataResponse = $this->helper->jsonResponse('Accomodation data : '.$params.'', $data, 200);
            return $dataResponse;
        }
    }

    public function store(Request $request){

        $input = $request->all();

        $data = $this->accomodation->insert($input);
        $dataResponse = $this->helper->jsonResponse('Property data added', $data, 201);

        return $dataResponse;
    }

    public function update(Request $request, $id){

        $input = $request->all();
        $data  = $this->accomodation->update($id, $input);
        $dataResponse = $this->helper->jsonResponse('Property data by id : '.$id.' updated', $data, 201);
        return $dataResponse;
    }

    public function destroy($id){

        $data  = $this->accomodation->delete($id);

        if ($data){
            $dataResponse = $this->helper->jsonResponse('Property data by id : '.$id.' deleted', $data, 201);
        } else {
            $dataResponse = $this->helper->jsonResponse('Property data by id : '.$id.' not found', null, 404);
        }

        return $dataResponse;
    }

}
