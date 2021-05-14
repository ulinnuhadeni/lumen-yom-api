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
        $data = DB::table('properties')
                     ->join('properties_type', 'properties.type_id', '=', 'properties_type.id')
                     ->join('contacts', 'properties.contact_id', '=', 'contacts.id')
                     ->select('properties.id',
                              'properties.name',
                              'properties_type.type as type',
                              'contacts.name as owner',
                              'properties.license',
                              'properties.website',
                              'properties.address',
                              'properties.province',
                              'properties.country',
                              'properties.postal_code',
                              'properties.order_total_per_month as order_total',
                              'properties.credit_card_payment')
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
