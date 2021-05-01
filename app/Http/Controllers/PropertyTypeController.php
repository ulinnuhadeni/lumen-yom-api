<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PropertyTypeRepository;

class PropertyTypeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PropertyTypeRepository $type)
    {
        $this->type = $type;
    }

    public function index(){
        $data = $this->type->get();
        $dataResponse = $this->type->jsonResponse('Accomodation type data', $data, 200);
        return $dataResponse;
    }

    public function show($params){
        if(is_numeric($params)){
            $data = $this->type->find($params);
            $dataResponse = $this->type->jsonResponse('Accomodation data type id : '.$params.'', $data, 200);
            return $dataResponse;
        } else {
            $data = $this->type->findBy('type', $params);
            $dataResponse = $this->type->jsonResponse('Accomodation data type : '.$params.'', $data, 200);
            return $dataResponse;
        }
    }

    public function store(Request $request){

        $input = $request->all();
        $data = $this->type->insert($input);
        $dataResponse = $this->type->jsonResponse('Property data type added', $data, 201);

        return $dataResponse;
    }

    public function update(Request $request, $id){

        $input = $request->all();
        $data  = $this->type->update($id, $input);
        $dataResponse = $this->type->jsonResponse('Property data type by id : '.$id.' updated', $data, 201);
        return $dataResponse;
    }

    public function destroy($id){

        $data  = $this->type->delete($id);
        if ($data){
            $dataResponse = $this->type->jsonResponse('Property data type by id : '.$id.' deleted', $data, 201);
            return $dataResponse;
        }

        $dataResponse = $this->type->jsonResponse('Property data type by id : '.$id.' not found', $data, 404);
        return $dataResponse;
    }

}
