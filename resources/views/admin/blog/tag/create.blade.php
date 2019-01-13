@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Блог</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.index') }}">Главная</a></li>
                    <li class="active"><span>Блог</span></li>
                    <li><a href="{{ route('admin.blog.tags.index') }}"><span>Теги</span></a></li>
                    <li class="active"><span>Добавление тега</span></li>
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
                            <h6 class="panel-title txt-dark">Добавление тега</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap">
                                <form method="post" action="{{ route('admin.blog.tags.store') }}">
                                    @csrf

                                    <div  class="tab-struct custom-tab-1">
                                        <ul role="tablist" class="nav nav-tabs">
                                            <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="main-tab" href="#main">Основное</a></li>
                                            <li role="presentation" class=""><a  data-toggle="tab" id="main-meta" role="tab" href="#meta" aria-expanded="false">Мета</a></li>
                                        </ul>
                                        <div class="tab-content" id="tabContent">
                                            <div  id="main" class="tab-pane fade active in" role="tabpanel">

                                                <!-- tag name -->
                                                <div class="{{ ($errors->first('name')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                                    <label class="control-label mb-10 text-left">Название</label>
                                                    <input type="text" id="tag-name" class="form-control" name="name" value="{{ old('name') }}">

                                                    @if ($errors->first('name'))

                                                        <div class="help-block with-errors">
                                                            <ul class="list-unstyled">
                                                                <li>{{ $errors->first('name') }}</li>
                                                            </ul>
                                                        </div>

                                                    @endif

                                                </div>
                                                <!-- end tag name -->

                                                <!-- tag slug -->
                                                <div class="{{ ($errors->first('slug')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                                    <label class="control-label mb-10 text-left">ЧПУ</label>
                                                    <input type="text" name="slug" class="form-control slugify" data-source="#tag-name" value="{{ old('slug') }}">

                                                    @if ($errors->first('slug'))

                                                        <div class="help-block with-errors">
                                                            <ul class="list-unstyled">
                                                                <li>{{ $errors->first('slug') }}</li>
                                                            </ul>
                                                        </div>

                                                    @endif

                                                </div>
                                                <!-- end tag slug -->

                                                <!-- tag display order -->
                                                <div class="{{ ($errors->first('display_order')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                                    <label class="control-label mb-10 text-left">Порядок отображения</label>
                                                    <input type="text" name="display_order" class="form-control" value="{{ old('display_order', 0) }}">

                                                    @if ($errors->first('display_order'))

                                                        <div class="help-block with-errors">
                                                            <ul class="list-unstyled">
                                                                <li>{{ $errors->first('display_order') }}</li>
                                                            </ul>
                                                        </div>

                                                    @endif

                                                </div>
                                                <!-- end tag display order -->

                                                <!-- tag active -->
                                                <div class="form-group mb-30">
                                                    <div class="checkbox checkbox-primary">
                                                        <input type="checkbox" name="active" {{ (old('active')) ? 'checked' : '' }}>
                                                        <label>Активно</label>
                                                    </div>
                                                </div>
                                                <!-- end tag active -->
                                            </div>
                                            <div  id="meta" class="tab-pane fade" role="tabpanel">

                                                <!-- tag meta title -->
                                                <div class="{{ ($errors->first('meta_title')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                                    <label class="control-label mb-10 text-left">Мета title</label>
                                                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}">

                                                    @if ($errors->first('meta_title'))

                                                        <div class="help-block with-errors">
                                                            <ul class="list-unstyled">
                                                                <li>{{ $errors->first('meta_title') }}</li>
                                                            </ul>
                                                        </div>

                                                    @endif

                                                    <div class="well mt-20">
                                                        <h5>Плейсхолдеры</h5>
                                                        <p>{tagName} - Название тега</p>
                                                        <p>{siteName} - Название сайта</p>
                                                    </div>

                                                </div>
                                                <!-- end tag meta title -->

                                                <!-- tag meta keywords -->
                                                <div class="{{ ($errors->first('meta_keywords')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                                    <label class="control-label mb-10 text-left">Мета keywords</label>
                                                    <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords') }}">

                                                    @if ($errors->first('meta_keywords'))

                                                        <div class="help-block with-errors">
                                                            <ul class="list-unstyled">
                                                                <li>{{ $errors->first('meta_keywords') }}</li>
                                                            </ul>
                                                        </div>

                                                    @endif

                                                </div>
                                                <!-- end tag meta keywords -->

                                                <!-- tag meta description -->
                                                <div class="{{ ($errors->first('meta_description')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                                    <label class="control-label mb-10 text-left">Мета description</label>
                                                    <textarea type="text" name="meta_description" class="form-control">{{ old('meta_description') }}</textarea>

                                                    @if ($errors->first('meta_description'))

                                                        <div class="help-block with-errors">
                                                            <ul class="list-unstyled">
                                                                <li>{{ $errors->first('meta_description') }}</li>
                                                            </ul>
                                                        </div>

                                                    @endif

                                                </div>
                                                <!-- end tag meta description -->

                                            </div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/speakingurl/14.0.1/speakingurl.min.js"></script>
    <script type="text/javascript" src="/admin-assets/vendors/bower_components/slugify/slugify.min.js"></script>
    <script src="/admin-assets/dist/js/slugify.js"></script>

@stop