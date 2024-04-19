<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\User2Service;

class User2Controller extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the User2 Microservice
     * @var User2Service
     */
    public $user2Service;

    /**
     * Create a new controller instance
     * @param User2Service $user2Service
     * @return void
     */
    public function __construct(User2Service $user2Service)
    {
        $this->user2Service = $user2Service;
    }

    /**
     * Return the list of users from Site2
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->user2Service->obtainUsers2());
    }

    /**
     * Create a new user in Site2
     * @param Request $request
     * @return Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        return $this->successResponse($this->user2Service->createUser2($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Show user details from Site2 based on ID
     * @param int $id
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->successResponse($this->user2Service->obtainUser2($id));
    }

    /**
     * Update user details in Site2 based on ID
     * @param Request $request
     * @param int $id
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->user2Service->editUser2($request->all(), $id));
    }

    /**
     * Delete user from Site2 based on ID
     * @param int $id
     * @return Illuminate\Http\Response
     */
    public function delete($id)
    {
        return $this->successResponse($this->user2Service->deleteUser2($id));
    }
}
