@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.index') }}">Главная</a></li>
                    <li class="active"><span>Информация обо мне</span></li>
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
                            <h6 class="panel-title txt-dark">Информация обо мне</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table style="clear: both" class="table table-bordered table-striped" id="user_2">
                                        <tbody>

                                            @foreach ($aboutMe as $elementAboutMe)

                                                <tr>
                                                    <td style="width:35%">{{ $elementAboutMe->humanTitleByKey }}</td>
                                                    <td style="width:65%"><a href="#" data-url="{{ route('admin.ajax.save.about.me') }}" class="simple-xeditable" data-pk="{{ $elementAboutMe->id }}" data-type="{{ $elementAboutMe->xeditableType }}" data-name="{{ $elementAboutMe->key }}" data-title="{{ $elementAboutMe->xeditableTitle }}">{{ $elementAboutMe->humanValue }}</a></td>
                                                </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->
    </div>

@stop

@section('js')
    @parent

    <script type="text/javascript" src="/admin-assets/vendors/bower_components/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <!-- Form-xeditable Init JavaScript -->
    <script src="/admin-assets/dist/js/form-xeditable-data.js"></script>

@stop