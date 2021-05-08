<?php

namespace App\Repositories;

use App\Models\Accomodation;
use Illuminate\Support\Facades\DB;

class AccomodationRepository {

    public function __construct(Accomodation $accomodation){
        $this->accomodation = $accomodation;
    }

    public function jsonResponse($message, $data, $code){
        return response()->json(['message' => $message, 'data' => $data], $code);
    }

    public function get(){
        $data = $this->accomodation
                     ->select('name',
                              'type_id',
                              'contact_id',
                              'license',
                              'website',
                              'address',
                              'country',
                              'province',
                              'postal_code',
                              'order_total_per_month as order_total' ,
                              'credit_card_payment')
                     ->orderBy('id')
                     ->get();
        return $data;
    }

    public function find($id)
    {
        $result = $this->accomodation->find($id);
        return $result;
    }

    public function findBy($column, $data)
    {
        $result = $this->accomodation->where($column, $data)->get();
        return $result;
    }

    public function insert($input){
        $result = $this->accomodation->create($input);
        return $result;
    }

    public function update($id, $input)
    {
        $result = $this->accomodation->where('id', '=', $id)->update($input);
        return $result;
    }

    public function delete($id)
    {
        $result = $this->accomodation->where('id', '=', $id)->delete();
        return $result;
    }
}
