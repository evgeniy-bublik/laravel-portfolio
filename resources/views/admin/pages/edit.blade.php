@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Страницы сайта</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.index') }}">Главная</a></li>
                    <li><a href="{{ route('admin.pages.index') }}"><span>Страницы сайта</span></a></li>
                    <li class="active"><span>Редактирование страницы сайта</span></li>
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
                            <h6 class="panel-title txt-dark">Страница: {{ $page->name }}</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap">
                                <form method="post" action="{{ route('admin.pages.update', compact('page')) }}">
                                    @csrf
                                    {{ method_field('PUT') }}

                                    <div class='form-group'>
                                        <label class="control-label mb-10 text-left">Url страницы</label>
                                        <input type="text" name="slug" class="form-control" value="{{ $page->url }}" disabled>
                                    </div>

                                    <div class="{{ ($errors->first('meta_title')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                        <label class="control-label mb-10 text-left">Заголовок страницы</label>
                                        <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $page->base_meta_title) }}">

                                        @if ($errors->first('meta_title'))

                                            <div class="help-block with-errors">
                                                <ul class="list-unstyled">
                                                    <li>{{ $errors->first('meta_title') }}</li>
                                                </ul>
                                            </div>

                                        @endif

                                        <div class="well mt-20">
                                            <h5>Плейсхолдеры</h5>
                                            <p>{siteName} - Название сайта</p>
                                        </div>

                                    </div>

                                    <div class="{{ ($errors->first('meta_keywords')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                        <label class="control-label mb-10 text-left">Ключевые слова страницы</label>
                                        <textarea name="meta_keywords" class="form-control">{{ old('meta_keywords', $page->meta_keywords) }}</textarea>

                                        @if ($errors->first('meta_keywords'))

                                            <div class="help-block with-errors">
                                                <ul class="list-unstyled">
                                                    <li>{{ $errors->first('meta_keywords') }}</li>
                                                </ul>
                                            </div>

                                        @endif

                                    </div>

                                    <div class="{{ ($errors->first('meta_description')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                        <label class="control-label mb-10 text-left">Мета описание страницы</label>
                                        <textarea name="meta_description" class="form-control">{{ old('meta_description', $page->meta_description) }}</textarea>

                                        @if ($errors->first('meta_description'))

                                            <div class="help-block with-errors">
                                                <ul class="list-unstyled">
                                                    <li>{{ $errors->first('meta_description') }}</li>
                                                </ul>
                                            </div>

                                        @endif

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