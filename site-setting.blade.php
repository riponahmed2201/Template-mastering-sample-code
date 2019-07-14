@extends('layouts.app')

@section('custom-meta')
    <title>Site Settings - {{ auth()->user()->siteSetting->company_name ?? auth()->user()->member->siteSetting->company_name }} </title>
@endsection

@section('content')
    <div class="container">
        <div class="content-heading clearfix">
            <div class="heading-left">
                <h1 class="page-title">Site Settings</h1>
            </div>
            <ul class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li>Settings</li>

            </ul>
        </div>

        <div class="row">
            <div class="col-md-6">
                <!-- SUBMIT TICKETS -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Branding</h3>
                    </div>

                    <div class="panel-body">
                        <form action="{{ is_null($site_setting) ? action('SiteSettingController@store') : action('SiteSettingController@update', $site_setting->id) }}"
                              method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                            @csrf
                            @if(!is_null($site_setting))@method('PUT')@endif
                            <fieldset>
                                <legend>General Information</legend>
                                <div class="form-group">
                                    <label for="ticket-name" class="col-sm-3 control-label">Company Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="company_name"
                                               value="{{ !is_null($site_setting) && $site_setting->company_name ? $site_setting->company_name : old('company_name') }}"
                                               class="form-control" id="ticket-name" placeholder="Company Name">
                                        @if($errors->has('company_name')) <span
                                                class="text-danger">{{ $errors->first('company_name') }}</span> @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ticket-name" class="col-sm-3 control-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="address"
                                               value="{{ !is_null($site_setting) && $site_setting->address ? $site_setting->address : old('address') }}"
                                               class="form-control" id="ticket-name" placeholder="Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ticket-email" class="col-sm-3 control-label">Default Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="default_email"
                                               value="{{ !is_null($site_setting) && $site_setting->default_email ? $site_setting->default_email : old('default_email') }}"
                                               class="form-control" id="ticket-email" placeholder="Email">
                                        @if($errors->has('default_email')) <span
                                                class="text-danger">{{ $errors->first('default_email') }}</span> @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ticket-email" class="col-sm-3 control-label">Company Phone</label>
                                    <div class="col-sm-9">
                                        <input type="phone" name="phone"
                                               value="{{ !is_null($site_setting) && $site_setting->phone ? $site_setting->phone : old('phone') }}"
                                               class="form-control" id="ticket-phone" placeholder="Phone No">
                                        @if($errors->has('phone')) <span
                                                class="text-danger">{{ $errors->first('phone') }}</span> @endif
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Brand Settings</legend>
                                <div class="form-group">
                                    <label for="ticket-email" class="col-sm-3 control-label">Branded URL</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="url" value="{{ !is_null($site_setting) && $site_setting->url ? $site_setting->url : old('url') }}" class="form-control" id="ticket-url" placeholder="URL">
                                        <p class="helper-text" style="font-size: 13.2px;">To set up custom white-labelled domain, please indicate it below and point its DNS settings to "gosms.xyz".
                                            Please note that it takes up to 24 hours for DNS records to be updated.</p>
                                        @if($errors->has('url')) <span class="text-danger">{{ $errors->first('url') }}</span> @endif
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="ticket-subject" class="col-sm-3 control-label">Brand Logo</label>
                                    <div class="col-md-9">
                                        @if(!is_null($site_setting) && $site_setting->logo)
                                            <img src="{{ asset(config('appconfig.logoPath').$site_setting->logo) }}"
                                                 alt="Logo" class="img-responsive">
                                        @endif
                                        <input type="file" name="logo" id="ticket-attachment">
                                        @if($errors->has('logo')) <span
                                                class="text-danger">{{ $errors->first('logo') }}</span> @endif
                                        <p class="help-block">
                                            <em>Valid file type: .jpg, .png File size max: 1 MB</em>
                                        </p>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <!-- Brand Settings -->

            </div>
            <div class="col-md-6">
                <!-- CONTACT FORM -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Outgoing Email Settings</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ !is_null($site_setting) ? action('SiteSettingController@smtpUpdate', $site_setting->id) : '' }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="smtpHost" class="control-label sr-only">SMTP Host</label>
                                <input type="text" name="smtpHost" class="form-control" value="{{ !is_null($site_setting) ? $site_setting->smtp_host : '' }}" placeholder="SMTP Host">
                                @if($errors->has('smtpHost')) <span class="text-danger">{{ $errors->first('smtpHost') }}</span> @endif
                            </div>
                            <div class="form-group">
                                <label for="smtpUser" class="control-label sr-only">SMTP User</label>
                                <input type="text" name="smtpUser" value="{{ !is_null($site_setting) ? $site_setting->smtp_username : '' }}" class="form-control" placeholder="SMTP User">
                                @if($errors->has('smtpUser')) <span class="text-danger">{{ $errors->first('smtpUser') }}</span> @endif
                            </div>
                            <div class="form-group">
                                <label for="smtpPassword" class="control-label sr-only">SMTP Password</label>
                                <input type="text" name="smtpPassword" value="{{ !is_null($site_setting) ? $site_setting->smtp_password : '' }}" class="form-control" placeholder="SMTP Password">
                                @if($errors->has('smtpPassword')) <span class="text-danger">{{ $errors->first('smtpPassword') }}</span> @endif
                            </div>
                            <div class="form-group">
                                <label for="smtpPort" class="control-label sr-only">SMTP Port</label>
                                <input type="text" name="smtpPort" value="{{ !is_null($site_setting) ? $site_setting->smtp_port : '' }}" class="form-control" placeholder="SMTP Port">
                                @if($errors->has('smtpPort')) <span class="text-danger">{{ $errors->first('smtpPort') }}</span> @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
                <!-- END CONTACT FORM -->
            </div>
        </div>
    </div>
@endsection