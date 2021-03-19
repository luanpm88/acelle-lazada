@extends('layouts.backend')

@section('title', trans('lazada::messages.lazada_plugin_for_acelle'))

@section('page_script')
    <script type="text/javascript" src="{{ URL::asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/validate.js') }}"></script>
@endsection

@section('page_header')

    <div class="page-title">				
        <ul class="breadcrumb breadcrumb-caret position-right">
            <li><a href="{{ action("Admin\HomeController@index") }}">{{ trans('messages.home') }}</a></li>
            <li><a href="{{ action("Admin\PluginController@index") }}">{{ trans('messages.plugins') }}</a></li>
        </ul>
        <div class="d-flex align-items-center">
            <div class="mr-4">
                <img width="80px" height="80px" src="{{ url('/images/plugin.svg') }}" />
            </div>
            <div>
                <h1 class="mt-0 mb-2">
                    {{ $plugin->title }}
                </h1>
                <p class="mb-1">
                    {{ $plugin->description }}
                </p>
                <div class="text-muted">
                    {{ trans('lazada::messages.version') }}: {{ $plugin->version }}
                </div>
            </div>		
        </div>		
    </div>

@endsection

@section('content')
    
    <div class="row">
        <div class="col-md-6">
            <form style="float:left" method="POST">
                @csrf

                <p>
                    {{ trans('lazada::messages.lazada.wording') }}
                </p>
                <div class="row mb-4">
                    <div class="col-md-12 pr-0 form-groups-bottom-0">
                        @include('helpers.form_control', [
                            'type' => 'text',
                            'class' => '',
                            'label' => trans('lazada::messages.lazada_key'),
                            'name' => 'lazada_key',
                            'value' => isset($data['lazada_key']) ? $data['lazada_key'] : null,
                            'help_class' => 'lazada_key',
                            'rules' => ['lazada_key' => 'required']
                        ])
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-12 pr-0 form-groups-bottom-0">
                        @include('helpers.form_control', [
                            'type' => 'password',
                            'class' => '',
                            'eye' => true,
                            'label' => trans('lazada::messages.lazada_secret'),
                            'name' => 'lazada_secret',
                            'value' => isset($data['lazada_secret']) ? $data['lazada_secret'] : null,
                            'help_class' => 'lazada_secret',
                            'rules' => ['lazada_secret' => 'required']
                        ])
                    </div>
                </div>
                <div class="">
                    <input class="btn btn-mc_primary" type="submit"
                        formaction="{{ action('\Acelle\Plugin\Lazada\Controllers\MainController@save') }}"
                        value="{{ trans('lazada::messages.save') }}">
                </div>
            
        </div>
    </div>
@endsection
