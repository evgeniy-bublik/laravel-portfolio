@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Портфолио</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.index') }}">Главная</a></li>
                    <li class="active"><span>Портфолио</span></li>
                    <li><a href="{{ route('admin.portfolio.categories.index') }}"><span>Категории</span></a></li>
                    <li class="active"><span>Создание категории</span></li>
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
                            <h6 class="panel-title txt-dark">Создание категории</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap">
                                <form method="post" action="{{ route('admin.portfolio.categories.store') }}">
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

    <script src="/admin-assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/admin-assets/dist/js/dataTables-data.js"></script>

@stop