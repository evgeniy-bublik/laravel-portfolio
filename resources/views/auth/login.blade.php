@extends('layouts.login')

@section('content')

<!-- Main Content -->
<div class="page-wrapper pa-0 ma-0 auth-page">
    <div class="container-fluid">
        <!-- Row -->
        <div class="table-struct full-width full-height">
            <div class="table-cell vertical-align-middle auth-form-wrap">
                <div class="auth-form  ml-auto mr-auto no-float">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="mb-30">
                                <h3 class="text-center txt-dark mb-10">Sign in</h3>
                                <h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>
                            </div>	
                            <div class="form-wrap">
                                <form action="{{ route('login') }}" method="post">
                        
                                    {{ csrf_field() }}

                                    <div class="form-group {{ ($errors->has('email')) ? 'has-error has-dange' : '' }}">
                                        <label class="control-label mb-10">Email address</label>
                                        <input name="email" class="form-control" value="{{ @old('email') }}">

                                        @if ($errors->has('email'))
                                        
                                            <div class="help-block with-errors">
                                                <ul class="list-unstyled">
                                                    <li>{{ $errors->first('email') }}</li>
                                                </ul>
                                            </div>

                                        @endif

                                    </div>
                                    <div class="form-group {{ ($errors->has('password')) ? 'has-error has-dange' : '' }}">
                                        <label class="control-label mb-10">Password</label>
                                        <input type="password" name="password" class="form-control">

                                        @if ($errors->has('password'))
                                        
                                            <div class="help-block with-errors">
                                                <ul class="list-unstyled">
                                                    <li>{{ $errors->first('password') }}</li>
                                                </ul>
                                            </div>

                                        @endif

                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="checkbox checkbox-primary pr-10 pull-left">
                                            <input id="checkbox_2" type="checkbox">
                                            <label for="checkbox_2"> Keep me logged in</label>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-success  btn-rounded">sign in</button>
                                    </div>
                                </form>
                            </div>
                        </div>	
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->	
    </div>
    
</div>
<!-- /Main Content -->

@stop