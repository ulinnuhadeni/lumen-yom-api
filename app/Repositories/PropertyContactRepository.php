<?php

namespace App\Repositories;

use App\Models\PropertyContact;

class PropertyContactRepository {

    public function __construct(PropertyContact $contact){
        $this->contact = $contact;
    }

    public function jsonResponse($message, $data, $code){
        return response()->json(['message' => $message, 'data' => $data], $code);
    }

    public function get(){
        $data = $this->contact->orderBy('id')->get();
        return $data;
    }

    public function find($id)
    {
        $result = $this->contact->find($id);
        return $result;
    }

    public function findBy($column, $data)
    {
        $result = $this->contact->where($column, $data)->get();
        return $result;
    }

    public function insert($input){
        $result = $this->contact->create($input);
        return $result;
    }

    public function update($id, $input)
    {
        $result = $this->contact->where('id', '=', $id)->update($input);
        return $result;
    }

    public function delete($id)
    {
        $result = $this->contact->where('id', '=', $id)->delete();
        return $result;
    }
}
