<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailRegistry extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules($email)
    {
        //Split email to get extension
        $email_array = explode("@",$email); //Divide el string
        if(strcmp($email_array[1],"itesm.mx") == 0){
          return true;
        }
        else return false;


    }
}
