<?php

namespace projectflyer\Http\Requests;

use projectflyer\Flyer;
 use projectflyer\Http\Requests\Request;



class AddPhotoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Flyer::where([
            'name'=> $this->name,
            'user_id'=> $this->user()->id
        ])->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file'=> 'required|mimes:jpg,jpeg,bmap,gif,png',

        ];
    }
}


