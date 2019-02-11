<?php

namespace App\Http\Requests\Site;

use App\Site;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\Unique;

class SiteUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('update', $this->route('site'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'slug' => "required|string|unique:sites,slug,{$this->route()->originalParameter('site')}",
            'template_id' => 'required|exists:templates,id',
            'author' => 'required|exists:users,id',
            'data' => 'required|array',
            'data.end_time' => 'required|date',
            'data.logo_url' => 'nullable|url',
            'data.background_url' => 'nullable|url',
            'data.facebook_url' => 'nullable|url',
            'data.twitter_url' => 'nullable|url',
            'data.googleplus_url' => 'nullable|url',
            'data.instagram_url' => 'nullable|url',
        ];
    }

    public function messages()
    {
        return trans('validate.site_store');
    }

    public function prepareForValidation()
    {
        $this->merge([
            'slug' => str_slug($this->get('slug')),
            'author' => Auth::user()->getAuthIdentifier()
        ]);
    }
}
