@extends('layouts.admin')

@section('css')

    <link rel="stylesheet" href="/admin-assets/vendors/bower_components/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.css" />
    <!-- Bootstrap Datetimepicker CSS -->
    <link href="/admin-assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap Dropify CSS -->
    <link href="/admin-assets/vendors/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css"/>

@stop

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
                    <li><a href="{{ route('admin.portfolio.works.index') }}"><span>Работы</span></a></li>
                    <li class="active"><span>Добавление работы</span></li>
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
                            <h6 class="panel-title txt-dark">Добавление работы</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap">
                                <form method="post" action="{{ route('admin.portfolio.works.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div  class="tab-struct custom-tab-1 mt-40">
                                        <ul role="tablist" class="nav nav-tabs">
                                            <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="main-tab" href="#main">Основное</a></li>
                                            <li role="presentation" class=""><a  data-toggle="tab" id="main-meta" role="tab" href="#meta" aria-expanded="false">Мета</a></li>
                                        </ul>
                                        <div class="tab-content" id="tabContent">
                                            <div  id="main" class="tab-pane fade active in" role="tabpanel">

                                                <!-- work category -->
                                                <div class="{{ ($errors->first('category_id')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                                    <label class="control-label mb-10 text-left">Категория</label>

                                                    <select name="category_id" class="form-control">

                                                        @foreach ($listCategories as $category)

                                                            <option value="{{ $category->id }}" {{ ($category->id == old('category_id') ) ? 'selected' : '' }}>{{ $category->name }}</option>

                                                        @endforeach

                                                    </select>

                                                    @if ($errors->first('category_id'))

                                                        <div class="help-block with-errors">
                                                            <ul class="list-unstyled">
                                                                <li>{{ $errors->first('category_id') }}</li>
                                                            </ul>
                                                        </div>

                                                    @endif

                                                </div>
                                                <!-- end work category -->

                                                <!-- work name -->
                                                <div class="{{ ($errors->first('name')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                                    <label class="control-label mb-10 text-left">Название</label>
                                                    <input type="text" id="work-name" name="name" class="form-control" value="{{ old('name') }}">

                                                    @if ($errors->first('name'))

                                                        <div class="help-block with-errors">
                                                            <ul class="list-unstyled">
                                                                <li>{{ $errors->first('name') }}</li>
                                                            </ul>
                                                        </div>

                                                    @endif

                                                </div>
                                                <!-- end work name -->

                                                <!-- work slug -->
                                                <div class="{{ ($errors->first('slug')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                                    <label class="control-label mb-10 text-left">ЧПУ</label>
                                                    <input type="text" name="slug" class="form-control slugify" data-source="#work-name" value="{{ old('slug') }}">

                                                    @if ($errors->first('slug'))

                                                        <div class="help-block with-errors">
                                                            <ul class="list-unstyled">
                                                                <li>{{ $errors->first('slug') }}</li>
                                                            </ul>
                                                        </div>

                                                    @endif

                                                </div>
                                                <!-- end work slug -->

                                                <!-- work description -->
                                                <div class="{{ ($errors->first('description')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                                    <label class="control-label mb-10 text-left">Описание</label>
                                                    <textarea name="description" class="textarea_editor form-control">{{ old('description') }}</textarea>

                                                    @if ($errors->first('description'))

                                                        <div class="help-block with-errors">
                                                            <ul class="list-unstyled">
                                                                <li>{{ $errors->first('description') }}</li>
                                                            </ul>
                                                        </div>

                                                    @endif

                                                </div>
                                                <!-- end work description -->

                                                <!-- work url -->
                                                <div class="{{ ($errors->first('url')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                                    <label class="control-label mb-10 text-left">Ссылка</label>
                                                    <input type="text" name="url" class="form-control" value="{{ old('url') }}">

                                                    @if ($errors->first('url'))

                                                        <div class="help-block with-errors">
                                                            <ul class="list-unstyled">
                                                                <li>{{ $errors->first('url') }}</li>
                                                            </ul>
                                                        </div>

                                                    @endif

                                                </div>
                                                <!-- end work url -->

                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-6 ol-md-6 col-xs-12">
                                                        <div class="panel panel-default card-view">
                                                            <div class="panel-heading">
                                                                <div class="pull-left">
                                                                    <h6 class="panel-title txt-dark">Изображение</h6>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="panel-wrapper collapse in">
                                                                <div class="panel-body">
                                                                    <input type="file" name="image" id="input-file-now-custom-2" class="dropify" accept="image/jpeg,image/png,image/jpg" data-allowed-file-extensions="jpeg jpg png" data-height="300" />

                                                                    @if ($errors->first('image'))

                                                                        <div class="help-block with-errors">
                                                                            <ul class="list-unstyled">
                                                                                <li>{{ $errors->first('image') }}</li>
                                                                            </ul>
                                                                        </div>

                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- work date -->
                                                <div class="{{ ($errors->first('date')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                                    <label class="control-label mb-10 text-left">Дата</label>
                                                    <div class='input-group datepicker'>
                                                      <input type='text' value="{{ old('date') }}" name="date" class="form-control">
                                                        <span class="input-group-addon">
                                                            <span class="fa fa-calendar"></span>
                                                        </span>
                                                    </div>

                                                    @if ($errors->first('date'))

                                                        <div class="help-block with-errors">
                                                            <ul class="list-unstyled">
                                                                <li>{{ $errors->first('date') }}</li>
                                                            </ul>
                                                        </div>

                                                    @endif

                                                </div>
                                                <!-- end work date -->

                                                <!-- work technologies -->
                                                <div class="{{ ($errors->first('technologies')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                                    <label class="control-label mb-10 text-left">Применяемые технологии</label>
                                                    <input type="text" name="technologies" class="form-control" value="{{ old('technologies') }}">

                                                    @if ($errors->first('technologies'))

                                                        <div class="help-block with-errors">
                                                            <ul class="list-unstyled">
                                                                <li>{{ $errors->first('technologies') }}</li>
                                                            </ul>
                                                        </div>

                                                    @endif

                                                </div>
                                                <!-- end work technologies -->

                                                <!-- work active -->
                                                <div class="form-group mb-30">
                                                    <div class="checkbox checkbox-primary">
                                                        <input type="checkbox" name="active" {{ (old('active')) ? 'checked' : '' }}>
                                                        <label>Активно</label>
                                                    </div>
                                                </div>
                                                <!-- end work active -->
                                            </div>
                                            <div  id="meta" class="tab-pane fade" role="tabpanel">

                                                <!-- work meta title -->
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

                                                </div>
                                                <!-- end work meta title -->

                                                <!-- work meta keywords -->
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
                                                <!-- end work meta keywords -->

                                                <!-- work meta description -->
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
                                                <!-- end work meta description -->

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

    <!-- wysuhtml5 Plugin JavaScript -->
    <script src="/admin-assets/vendors/bower_components/wysihtml5x/dist/wysihtml5x.min.js"></script>
    <script src="/admin-assets/vendors/bower_components/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.js"></script>
    <!-- Moment JavaScript -->
    <script type="text/javascript" src="/admin-assets/vendors/bower_components/moment/min/moment-with-locales.min.js"></script>
    <!-- Bootstrap Datetimepicker JavaScript -->
    <script type="text/javascript" src="/admin-assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/speakingurl/14.0.1/speakingurl.min.js"></script>
    <script type="text/javascript" src="/admin-assets/vendors/bower_components/slugify/slugify.min.js"></script>
    <!-- Bootstrap Daterangepicker JavaScript -->
    <script src="/admin-assets/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Bootstrap Wysuhtml5 Init JavaScript -->
    <script src="/admin-assets/dist/js/bootstrap-wysuhtml5-data.js"></script>
    <!-- Form Picker Init JavaScript -->
    <script src="/admin-assets/dist/js/form-picker-data.js"></script>

    <script src="/admin-assets/vendors/bower_components/dropify/dist/js/dropify.min.js"></script>

    <!-- Form Flie Upload Data JavaScript -->
    <script src="/admin-assets/dist/js/form-file-upload-data.js"></script>
    <script src="/admin-assets/dist/js/slugify.js"></script>

@stop