<?php
namespace App\Http\Requests;

class RideRequest extends BaseRequest
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
            {
                return [
                    'name' => 'required|max:100',
                    'phone' => 'required|min:7|max:15',
                    'address' => 'required|max:200'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required|max:100',
                    'phone' => 'required|min:7|max:15',
                    'address' => 'required|max:200'
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            }
        }
    }
}
