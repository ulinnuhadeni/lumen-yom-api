<?php

namespace App\Repositories;

use App\Models\PropertyType;
use Illuminate\Support\Facades\DB;

class PropertyTypeRepository {

    public function __construct(PropertyType $type){
        $this->type = $type;
    }

    public function get(){
        $data = DB::table('properties_type')
                  ->select('type')
                  ->orderBy('id')
                  ->get();
        return $data;
    }

    public function find($id)
    {
        $result = $this->type->find($id);
        return $result;
    }

    public function findBy($column, $data)
    {
        $result = $this->type->where($column, $data)->get();
        return $result;
    }

    public function insert($input){
        $result = $this->type->create($input);
        return $result;
    }

    public function update($id, $input)
    {
        $result = $this->type->where('id', '=', $id)->update($input);
        return $result;
    }

    public function delete($id)
    {
        $result = $this->type->where('id', '=', $id)->delete();
        return $result;
    }
}
