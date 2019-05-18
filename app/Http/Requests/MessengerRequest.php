<?php

namespace App\Http\Requests;

class MessengerRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method())
        {
            case 'POST':
                return [
                    'name' => 'required|max:100|unique:messengers,name',
                    'phone' => 'required|min:7|max:12|unique:messengers,phone',
                ];
                break;
            case 'PUT':
            case 'PATCH':
                return [
                    'name' => 'required|max:100|unique:messengers,name,' . $this->id,
                    'phone' => 'required|min:7|max:12|unique:messengers,phone,' . $this->id,
                ];
                break;
            default:
                return [];
                break;
        }
    }
}
