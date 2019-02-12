@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-uppercase mt-1 mb-0 float-left">Sites</h5>
                        <a href="{{ route('sites.create') }}" class="btn btn-success btn-sm float-right">
                            <i class="fa fa-plus"></i> New Site
                        </a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Template</th>
                                <th>End Time</th>
                                <th>URL</th>
                                @can('index_all', \App\Site::class)
                                    <th>Author</th>
                                @endcan
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sites as $index => $site)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $site->name }}</td>
                                    <td>
                                        {{ data_get($site, 'template.name') }}
                                        <a href="{{ route('templates.preview', data_get($site, 'template.id')) }}"
                                           class="btn-preview-template" title="Preview" target="_blank">
                                            <i class="fa fa-external-link"></i>
                                        </a>
                                    </td>
                                    <td>{{ data_get($site, 'data.end_time') }}</td>
                                    <td>
                                        <a href="{{ route('sites.show', $site->slug) }}" target="_blank">
                                            {{ str_limit(route('sites.show', $site->slug), 50) }}
                                        </a>
                                    </td>
                                    @can('index_all', \App\Site::class)
                                        <td>{{ data_get($site, 'author.name') }}</td>
                                    @endcan
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('sites.edit', $site->id) }}"
                                               class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm btn-delete"
                                                    data-record-name="{{ $site->name }}"
                                                    data-end-point="{{ route('sites.destroy', $site->id) }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        NDD_SDK.bindDeleteAction('.btn-delete')
    </script>
@endpush
