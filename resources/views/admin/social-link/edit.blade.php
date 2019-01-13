@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Социальные ссылки</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.index') }}">Главная</a></li>
                    <li><a href="{{ route('admin.social.links.index') }}"><span>Социальные ссылки</span></a></li>
                    <li class="active"><span>Редактирование социальной ссылки</span></li>
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
                            <h6 class="panel-title txt-dark">Ссылка: {{ $socialLink->url }}</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap">
                                <form method="post" action="{{ route('admin.social.links.update', compact('socialLink')) }}">
                                    @csrf
                                    {{ method_field('PUT') }}

                                    <div class="{{ ($errors->first('link')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                        <label class="control-label mb-10 text-left">Ссылка</label>
                                        <input type="text" name="link" class="form-control" value="{{ old('link', $socialLink->link) }}">

                                        @if ($errors->first('link'))

                                            <div class="help-block with-errors">
                                                <ul class="list-unstyled">
                                                    <li>{{ $errors->first('link') }}</li>
                                                </ul>
                                            </div>

                                        @endif

                                    </div>
                                    <div class="{{ ($errors->first('additional_classes')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                        <label class="control-label mb-10 text-left">Html классы ссылки</label>
                                        <input type="text" name="additional_classes" class="form-control" value="{{ old('additional_classes', $socialLink->additional_classes) }}">

                                        @if ($errors->first('additional_classes'))

                                            <div class="help-block with-errors">
                                                <ul class="list-unstyled">
                                                    <li>{{ $errors->first('additional_classes') }}</li>
                                                </ul>
                                            </div>

                                        @endif

                                    </div>
                                    <div class="{{ ($errors->first('display_order')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                        <label class="control-label mb-10 text-left" for="example-email">Порядок отображения</label>
                                        <input type="text" name="display_order" class="form-control" value="{{ old('display_order', $socialLink->display_order) }}">

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
                                            <input type="checkbox" name="active" {{ (old('active', $socialLink->active)) ? 'checked' : '' }}>
                                            <label>Активно</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-anim"><i class="icon-rocket"></i><span class="btn-text">Обновить</span></button>
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