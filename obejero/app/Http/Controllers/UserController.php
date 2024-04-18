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
    $users = User::all();
    return response()->json($users, 200);
    }

/**
 * Return the list of users
 * @return Illuminate\Http\Response
 */
    public function index()
    {
    $users = User::all();
    return $this->successResponse($users);
    
    }
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:50',
            'password' => 'required|max:20',
            'gender' => 'required|in:Male,Female',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    
        $user = new User();
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->gender = $request->input('gender');
        $user->save();
    
        return response()->json($user, Response::HTTP_CREATED);
    }
    
 /**
 * Obtains and show one user
 * @return Illuminate\Http\Response
 */
    public function show($id)
    {
    $user = User::findOrFail($id);
    return $this->successResponse($user);
 
 // old code 
 /*
 $user = User::where('userid', $id)->first();
 if($user){
 return $this->successResponse($user);
 }
 {
 return $this->errorResponse('User ID Does Not Exists', 
Response::HTTP_NOT_FOUND);
 }
 */
 }
 /**
 * Update an existing author
 * @return Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validator = Validator::make($request->all(), [
        'username' => 'max:50',
        'password' => 'max:20',
        'gender' => 'in:Male,Female',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()->first()], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    $user->username = $request->input('username');
    $user->password = $request->input('password');
    $user->gender = $request->input('gender');
    $user->save();

    return response()->json($user);

 
 // old code
 /*
 $this->validate($request, $rules);
 //$user = User::findOrFail($id);
 $user = User::where('userid', $id)->first();
 if($user){
 $user->fill($request->all());
 // if no changes happen
 if ($user->isClean()) {
 return $this->errorResponse('At least one value must 
change', Response::HTTP_UNPROCESSABLE_ENTITY);
 }
 $user->save();
 return $this->successResponse($user);
 }
 {
 return $this->errorResponse('User ID Does Not Exists', 
Response::HTTP_NOT_FOUND);
 }
 */
 }
 /**
 * Remove an existing user
 * @return Illuminate\Http\Response
 */
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return $this->successResponse($user);
 // old code 
 /*
 $user = User::where('userid', $id)->first();
 if($user){
 $user->delete();
 return $this->successResponse($user);
 }
 {
 return $this->errorResponse('User ID Does Not Exists', 
Response::HTTP_NOT_FOUND);
 }
 */
 }}