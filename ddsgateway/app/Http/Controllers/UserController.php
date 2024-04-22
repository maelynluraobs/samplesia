<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;

use Validator; 

use App\Models\User;
Class UserController extends Controller {

   use ApiResponser;
    private $request;

 public function __construct(Request $request){
    $this->request = $request;
 }
    public function getUsers(){
    
    }

/**
 * Return the list of users
 * @return Illuminate\Http\Response
 */
    public function index()
    {
    
    
    }
    public function add(Request $request)
    {
    }
    
 /**
 * Obtains and show one user
 * @return Illuminate\Http\Response
 */
    public function show($id)
    {
    
 

 }
 /**
 * Update an existing author
 * @return Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
 }
 /**
 * Remove an existing user
 * @return Illuminate\Http\Response
 */
    public function delete($id)
    {
 }}