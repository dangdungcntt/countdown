@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-uppercase mt-1 mb-0 float-left">Edit site: <strong>{{ $site->name }}</strong>
                        </h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('sites.update', $site->id) }}" method="POST" id="form-create">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="inputSiteName" class="col-sm-2 col-form-label font-weight-bold">
                                    Site name <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSiteName" placeholder="Site name"
                                           name="name" value="{{ old('name') ?? $site->name }}"
                                           data-error="{{ $errors->first('name') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSiteURL" class="col-sm-2 col-form-label font-weight-bold">
                                    Site URL <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSiteURL" placeholder="Site URL"
                                           name="slug" value="{{ old('slug') ?? $site->slug }}"
                                           data-error="{{ $errors->first('slug') }}">
                                    <span>
                                        Public URL:
                                        <a href="{{ route('sites.show', $site->slug) }}" target="_blank">
                                            {{ str_limit(route('sites.show', $site->slug), 100) }}
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <hr>
                            <fieldset>
                                <legend style="font-size: 1.2rem">Site data</legend>
                                @foreach($siteDataFields as $field)
                                    <div class="form-group row">
                                        <label for="{{ data_get($field, 'id') }}"
                                               class="col-sm-2 col-form-label font-weight-bold">
                                            {{ data_get($field, 'label') }}
                                            @if (data_get($field, 'required'))
                                                <span class="text-danger">*</span>
                                            @endif
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="{{ data_get($field, 'type', 'text') }}" class="form-control" id="{{ data_get($field, 'id') }}"
                                                   placeholder="{{ data_get($field, 'placeholder') }}"
                                                   name="{{ data_get($field, 'name') }}" value="{{ old(data_get($field, 'value_key')) ?? data_get($site, data_get($field, 'value_key')) }}"
                                                   data-key="{{ data_get($field, 'key') }}"
                                                   data-error="{{ $errors->first(data_get($field, 'value_key')) }}">
                                        </div>
                                    </div>
                                @endforeach
                            </fieldset>
                            <hr>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">
                                    Site template <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <div style="display: grid;grid-template-columns: repeat(3, 1fr);grid-gap: 12px;">
                                        @foreach($templates as $index => $template)
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio"
                                                           name="template_id" value="{{ $template->id }}"
                                                           @if($site->template_id == $template->id) checked @endif>
                                                    {{ $template->name }}
                                                    <a href="{{ route('templates.preview', $template->id) }}"
                                                       class="btn-preview-template" title="Preview" target="_blank">
                                                        <i class="fa fa-external-link"></i>
                                                    </a>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    {{--For use NDD_SDK to show error automaticly --}}
                                    <input type="hidden" class="form-control" id="inputTemplateId"
                                           data-error="{{ $errors->first('template_id') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-10 offset-md-2">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('sites.index') }}" class="btn btn-light">
                                        <i class="fa fa-arrow-left"></i> Back
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('sites.partial.script')

