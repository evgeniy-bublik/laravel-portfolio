@extends('layouts.admin')

@section('css')

    <!-- Ion.RangeSlider -->
    <link href="/admin-assets/vendors/bower_components/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css">
    <link href="/admin-assets/vendors/bower_components/ion.rangeSlider/css/ion.rangeSlider.skinModern.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap Colorpicker CSS -->
    <link href="/admin-assets/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css"/>

@stop

@section('content')

    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Профессиональные навыки</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.index') }}">Главная</a></li>
                    <li><a href="{{ route('admin.professional.skills.index') }}"><span>Профессиональные навыки</span></a></li>
                    <li class="active"><span>Добавление навыка</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->
        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Добавление навыка</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap">
                                <form method="post" action="{{ route('admin.professional.skills.store') }}">
                                    @csrf

                                    <div class="{{ ($errors->first('name')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                        <label class="control-label mb-10 text-left">Название</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">

                                        @if ($errors->first('name'))

                                            <div class="help-block with-errors">
                                                <ul class="list-unstyled">
                                                    <li>{{ $errors->first('name') }}</li>
                                                </ul>
                                            </div>

                                        @endif

                                    </div>
                                    <div class="{{ ($errors->first('value')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                        <label class="control-label mb-10 text-left">Значение</label>
                                        <input type="text" name="value" class="form-control percentage-range" value="{{ old('value') }}">

                                        @if ($errors->first('value'))

                                            <div class="help-block with-errors">
                                                <ul class="list-unstyled">
                                                    <li>{{ $errors->first('value') }}</li>
                                                </ul>
                                            </div>

                                        @endif

                                    </div>
                                    <div class="{{ ($errors->first('color_bar')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                        <label class="control-label mb-10 text-left" for="example-email">Цвет навыка</label>
                                        <div  class="simple-colorpicker input-group colorpicker-component">
                                            <input type="text" name="color_bar" class="form-control" value="{{ old('color_bar', '#000') }}">
                                            <span class="input-group-addon"><i></i></span>
                                        </div>

                                        @if ($errors->first('color_bar'))

                                            <div class="help-block with-errors">
                                                <ul class="list-unstyled">
                                                    <li>{{ $errors->first('color_bar') }}</li>
                                                </ul>
                                            </div>

                                        @endif

                                    </div>
                                    <div class="{{ ($errors->first('display_order')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                        <label class="control-label mb-10 text-left" for="example-email">Порядок отображения</label>
                                        <input type="text" name="display_order" class="form-control" value="{{ old('display_order', 0) }}">

                                        @if ($errors->first('display_order'))

                                            <div class="help-block with-errors">
                                                <ul class="list-unstyled">
                                                    <li>{{ $errors->first('display_order') }}</li>
                                                </ul>
                                            </div>

                                        @endif

                                    </div>
                                    <div class="form-group mb-30">
                                        <div class="checkbox checkbox-primary">
                                            <input type="checkbox" name="active" {{ (old('active')) ? 'checked' : '' }}>
                                            <label>Активно</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">Создать</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- Footer -->
    <footer class="footer container-fluid pl-30 pr-30">
        <div class="row">
            <div class="col-sm-12">
                <p>2018 &copy; Droopy. Pampered by Hencework</p>
            </div>
        </div>
    </footer>
    <!-- /Footer -->

@stop

@section('js')
    @parent

    <!-- Ion.RangeSlider -->
    <script src="/admin-assets/vendors/bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <!-- RangeSlider Init JavaScript -->
    <script src="/admin-assets/dist/js/rangeslider-data.js"></script>

    <!-- Bootstrap Colorpicker JavaScript -->
    <script src="/admin-assets/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- Form Picker Init JavaScript -->
    <script src="/admin-assets/dist/js/form-picker-data.js"></script>

@stop