@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-uppercase mt-1 mb-0 float-left">Templates</h5>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($templates as $index => $template)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $template->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('templates.preview', $template->id) }}" target="_blank"
                                                class="btn btn-light btn-sm" title="Preview">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            @if (data_get($template, 'download_path'))
                                                <a href="{{ url($template->download_path) }}" target="_blank"
                                                   class="btn btn-primary btn-sm" title="Download template">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                            @endif
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
