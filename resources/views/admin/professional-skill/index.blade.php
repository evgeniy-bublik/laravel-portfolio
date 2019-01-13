@extends('layouts.admin')

@section('css')
    @parent

    <link href="/admin-assets/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

@stop

@section('content')

    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5></h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.index') }}">Главная</a></li>
                    <li class="active"><span>Профессиональные навыки</span></li>
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
                            <h6 class="panel-title txt-dark">Профессиональные навыки</h6>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('admin.professional.skills.create') }}">Создать</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="data-table-professional-skills" class="table table-hover table-bordered display mb-30" data-ajax-url="{{ route('admin.professional.skills.ajaxdata') }}">
                                        <thead>
                                            <tr>
                                                <th>Навык</th>
                                                <th>Процент</th>
                                                <th>Порядок отображения</th>
                                                <th>Активно</th>
                                                <th>Действия</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Навык</th>
                                                <th>Процент</th>
                                                <th>Порядок отображения</th>
                                                <th>Активно</th>
                                                <th>Действия</th>
                                            </tr>
                                        </tfoot>
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

    <script src="/admin-assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/admin-assets/dist/js/dataTables-data.js"></script>

@stop