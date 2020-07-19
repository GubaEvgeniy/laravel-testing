<?php


namespace App\Http\Request;


use Illuminate\Foundation\Http\FormRequest;

class BaseWebRequest extends FormRequest
{
    public function authorize(): bool
    {
        return \Auth::guard()->check();
    }
}
