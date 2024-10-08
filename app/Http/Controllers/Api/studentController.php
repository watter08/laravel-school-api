<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class studentController extends Controller
{
    public function getAll()
    {
        $student = Student::all();
        if($student->isEmpty()){
            $data = [
                'message' => 'No se encontraron Estudiantes',
                'status' => 204,
                'data' => null
            ];
            return response()->json($data,200);
        }else{
            $data = [
                'message' =>  'Estudiantes encontrados',
                'status' => 200,
                'data' => $student
            ];
            return response()->json($data,200);
        }
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|email|unique:student',
            'phone' => 'required|digits:10',
            'subject' => 'required|in:Sociales,Naturales,Español',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de las propiedades',
                'errors' => $validator->errors(),
                'status' => 400,
                'data' => null
            ];
            return response()->json($data,200);
        }

        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
        ]);

        if(!$student){
            $data = [
                'message' => 'Error: No se pudo crear el usuario!',                
                'status' => 500,
                'data' => null
            ];
            return response()->json($data,200);
        }

        $data = [
            'message' => 'Estudiante creado exitosamente!',
            'status' => 201,
            'data' => $student
        ];

        return response()->json($data,200);
    }

    public function getStudentById($id)
    {
        $student = Student::find($id);
        if($student){
           $data = [
            'message' => 'Estudiante Encontrado',
            'status' => 200,
            'data' => $student,
            'errors' => null
           ];
           return response()->json($data,200);
        }
        $data = [
            'message' => 'Estudiante no encontrado',
            'status' => 404,
            'data' => null,
            'errors' => ['Estudiante no encontrado']
        ];
        return response()->json($data, 200);
    }

    public function deleteStudentById($id)
    {
        $student = Student::find($id);
        if(!$student){
            $data = [
                'message' => 'Estudiante no encontrado',
                'status' => 404,
                'data' => null,
                'errors' => ['Estudiante no encontrado']
            ];
            return response()->json($data, 200);
        }       

        $student->delete();
        
        $data = [
            'message' => 'Estudiante Eliminado',
            'status' => 200,
            'data' => $student,
            'errors' => null
           ];
           return response()->json($data,200);
    }

    public function updateStudent(Request $request, $id)
    {
        $student = Student::find($id);
        if(!$student){
            $data = [
                'message' => 'Estudiante no encontrado',
                'status' => 404,
                'data' => null,
                'errors' => ['Estudiante no encontrado']
            ];
            return response()->json($data, 200);
        } 

        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|email|unique:student',
            'phone' => 'required|digits:10',
            'subject' => 'required|in:Sociales,Naturales,Español',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de las propiedades',
                'errors' => $validator->errors(),
                'status' => 400,
                'data' => null
            ];
            return response()->json($data,200);
        }

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->subject = $request->subject;

        $student->save();

        $data = [
            'message' => 'Estudiante Actualizado correctamente!',
            'status' => 200,
            'data' => $student,
            'errors' => null
           ];
           return response()->json($data,200);
    }

    public function updateStudentPartial(Request $request, $id)
    {
        $student = Student::find($id);
        if(!$student){
            $data = [
                'message' => 'Estudiante no encontrado',
                'status' => 404,
                'data' => null,
                'errors' => ['Estudiante no encontrado']
            ];
            return response()->json($data, 200);
        } 

        $validator = Validator::make($request->all(),[
            'name' => 'max:255',
            'email' => 'email|unique:student',
            'phone' => 'digits:10',
            'subject' => 'in:Sociales,Naturales,Español',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de las propiedades',
                'errors' => $validator->errors(),
                'status' => 400,
                'data' => null
            ];
            return response()->json($data,200);
        }

        if($request->has('name')){
            $student->name = $request->name;
        }

        if($request->has('email')){
            $student->email = $request->email;
        }

        if($request->has('phone')){
            $student->phone = $request->phone;
        }

        if($request->has('subject')){
            $student->subject = $request->subject;
        }

        $student->save();

        $data = [
            'message' => 'Estudiante Actualizado Partial correctamente!',
            'status' => 200,
            'data' => $student,
            'errors' => null
           ];
           return response()->json($data,200);
    }
}