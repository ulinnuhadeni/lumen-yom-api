<?php

namespace App\Http\Controllers;

use App\Libraries\Helper;
use Illuminate\Http\Request;
use App\Repositories\PropertyContactRepository;
use Illuminate\Support\Facades\Hash;

class PropertyContactController extends Controller
{

    public function __construct(PropertyContactRepository $contact, Helper $helper)
    {
        $this->helper = $helper;
        $this->contact = $contact;
    }

    public function index()
    {
        $data = $this->contact->get();
        $dataResponse = $this->helper->jsonResponse('Contact data', $data, 200);
        return $dataResponse;
    }

    public function show($params)
    {
        if (is_numeric($params)) {
            $data = $this->contact->find($params);
            if ($data == null) {
                $dataResponse = $this->helper->jsonResponse('Contact data id : ' . $params . '', 'Data not Available or Not Found', 404);
            } else {
                $dataResponse = $this->helper->jsonResponse('Contact data id : ' . $params . '', $data, 200);
            }
        } else {
            $data = $this->contact->findBy('name', $params);
            if (isset($data)) {
                $dataResponse = $this->helper->jsonResponse('Contact data id : ' . $params . '', 'Data not Available or Not Found', 404);
            } else {
                $dataResponse = $this->helper->jsonResponse('Contact data : ' . $params . '', $data, 200);
            }
        }

        return $dataResponse;
    }

    public function store(Request $request)
    {

        $input = $request->all();
        $input['password'] = Hash::make($request->password);

        $data = $this->contact->insert($input);
        $dataResponse = $this->helper->jsonResponse('Property data contact added', $data, 201);

        return $dataResponse;
    }

    public function update(Request $request, $id)
    {

        $input = $request->all();
        $input['password'] = Hash::make($request->password);

        $data  = $this->contact->update($id, $input);
        $dataResponse = $this->helper->jsonResponse('Property data contact by id : ' . $id . ' updated', $data, 201);
        return $dataResponse;
    }

    public function destroy($id)
    {

        $data  = $this->contact->delete($id);

        if ($data) {
            $dataResponse = $this->helper->jsonResponse('Property data contact by id : ' . $id . ' deleted', $data, 201);
        } else {
            $dataResponse = $this->helper->jsonResponse('Property data contact by id : ' . $id . ' not found', $data, 404);
        }

        return $dataResponse;
    }
}
