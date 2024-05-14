<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

/**
 * @OA\Get(path="/connection-check", tags={"connection"}, security={{"ApiKeyAuth": {}}},
 *         summary="Check connection.",
 *         @OA\Response( response=200, description="Connection status.")
 * )
 */
Flight::route('GET /api/connection-check', function(){
    Flight::OLPService();
});

/**
 * @OA\Get(path="/getCourses", tags={"courses"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all courses from the API. ",
 *         @OA\Response( response=200, description="List of courses.")
 * )
 */
Flight::route('GET /api/getCourses', function(){
    Flight::json(Flight::olpService()->getCourses());
});

/**
 * @OA\Get(path="/getLectures", tags={"lectures"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all lectures from the API. ",
 *         @OA\Response( response=200, description="List of lectures.")
 * )
 */
Flight::route('GET /api/getLectures', function(){
    Flight::json(Flight::olpService()->getLectures());
});

/**
 * @OA\Get(path="/getUsers", tags={"users"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all users from the API. ",
 *         @OA\Response( response=200, description="List of users.")
 * )
 */
Flight::route('GET /api/getUsers', function(){
    Flight::json(Flight::olpService()->getUsers());
});
/**
 * @OA\Post(
 *      path="/addMaterial", security={{"ApiKeyAuth": {}}},
 *      description="Add material",
 *      tags={"universities"},
 *      @OA\RequestBody(description="Add new material", required=true,
 *          @OA\MediaType(mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(property="title",type="string", example="HTML basics slides", description="material title"),
 *                  @OA\Property(property="file_path",type="string", example="html_basics_slides.pdf", description="file upload ")
 *        
 * )
 * )
 * ),
 *      @OA\Response(response=200, description="Material added."),
 *      @OA\Response(response=500,description="Error")
 * )
 */
Flight::route('POST /api/addMaterial', function() {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::olpService()->addMaterial($data));
});
/**
 * @OA\Post(
 *      path="/addCourse", security={{"ApiKeyAuth": {}}},
 *      description="Add course",
 *      tags={"courses"},
 *      @OA\RequestBody(description="Add new course", required=true,
 *          @OA\MediaType(mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(property="title",type="string", example="Introduction to Web Development", description="title of course"),
 *                  @OA\Property(property="description",type="string", example="Learn the basics of web development", description="course description"),
 *                  @OA\Property(property="instructor_id",type="int", example=1, description="professor id"),
 *                  @OA\Property(property="enrollment_status",type="string", example="open", description="status of enrollment")
 *                  @OA\Property(property="category",type="string", example="Web Development", description="category of course")
 * )
 * )
 * ),
 *      @OA\Response(response=200, description="Course added."),
 *      @OA\Response(response=500,description="Error")
 * )
 */
Flight::route('POST /api/addCourse', function() {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::olpService()->addCourse($data));
});
/**
 * @OA\Post(
 *      path="/addUser", security={{"ApiKeyAuth": {}}},
 *      description="Add user",
 *      tags={"users"},
 *      @OA\RequestBody(description="Add new user", required=true,
 *          @OA\MediaType(mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(property="name",type="string", example="John Doe", description="Name of the user"),             
 *                  @OA\Property(property="email",type="string", example="name.lastname@stu.ibu.edu.ba", description="Email"),
 *                  @OA\Property(property="password",type="string", example="S3curePa$$word", description="Password"),
 *                  @OA\Property(property="role",type="string", example="student", description="role of the user")
 * )
 * )
 * ),
 *      @OA\Response(response=200, description="User added."),
 *      @OA\Response(response=500,description="Error")
 * )
 */
Flight::route('POST /api/addUser', function() {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::olpService()->addUser($data));
});
/**
 * @OA\Delete(
 *      path="/deleteLecture/{id}", security={{"ApiKeyAuth": {}}},
 *      description="Delete lecture",
 *      tags={"lectures"},
 *      @OA\Parameter(in="path",name="id",example=1,description="Lecture ID"),
 *      @OA\Response(response=200, description="Lecture deleted."),
 *      @OA\Response(response=500,description="Error")
 * )
 */
Flight::route('DELETE /api/deleteLecture/@id', function($id) {
    Flight::olpService()->deleteLecture($id);
});
/**
 * @OA\Delete(
 *      path="/deleteCourse/{id}", security={{"ApiKeyAuth": {}}},
 *      description="Delete course",
 *      tags={"courses"},
 *      @OA\Parameter(in="path",name="id",example=1,description="Course ID"),
 *      @OA\Response(response=200, description="Course deleted."),
 *      @OA\Response(response=500,description="Error")
 * )
 */
Flight::route('DELETE /api/deleteCourse/@id', function($id) {
    Flight::olpService()->deleteCourse($id);
});
/**
 * @OA\Delete(
 *      path="/deleteUser/{id}", security={{"ApiKeyAuth": {}}},
 *      description="Delete user",
 *      tags={"users"},
 *      @OA\Parameter(in="path",name="id",example=1,description="User ID"),
 *      @OA\Response(response=200, description="User deleted."),
 *      @OA\Response(response=500,description="Error")
 * )
 */
Flight::route('DELETE /api/deleteUser/@id', function($id) {
    Flight::olpService()->deleteUser($id);
});
/**
* @OA\Post(
*     path="/../login",
*     description="Login",
*     tags={"login"},
*     @OA\RequestBody(description="Login", required=true,
*       @OA\MediaType(mediaType="application/json",
*         @OA\Schema(
*             @OA\Property(property="email", type="string", example="user@gmail.com", description="email" ),
*             @OA\Property(property="password", type="string", example="12345",  description="Password" ),
*        )
*     )),
*     @OA\Response(
*         response=200,
*         description="Logged in successfully"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/

Flight::route('POST /login', function(){
    $login = Flight::request()->data->getData();
    $uJsonu = Flight::olpService()->searchUsername($login['username']);
    $user = $uJsonu[0];
    // Flight::json(["KLJUCEVI SU" => $login['password']], 403);
    if (!empty($user['id'])){
      if($user['password'] == $login['password']){
        unset($user['password']);
        $jwt = JWT::encode($user, Config::JWT_SECRET(), 'HS256');
        Flight::json(['token' => $jwt]);
      } else {
        Flight::json(["message" => "Wrong password"], 403);
      }
    } else {
        Flight::json(["message" => "User doesn't exist"], 404);
    }
});
// Middleware
/* Flight::route('/api/*', function () {
    $header = Flight::header("Authorization");
    if (!$header) {
      Flight::json(["message" => "Authorization is missing"], 403);
      return FALSE;
    }else{
        try {
          $decoded = (array)JWT::decode($header, new Key(Config::JWT_SECRET(), 'HS256'));
          Flight::set('user', $decoded);
          return TRUE;
        } catch (\Exception $e) {
          Flight::json(["message" => "Authorization token is not valid"], 403);
          return FALSE;
        }
    }
  }); */


