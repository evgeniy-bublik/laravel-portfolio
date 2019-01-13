@extends('layouts.admin')

@section('css')

    <!-- Bootstrap Datetimepicker CSS -->
    <link href="/admin-assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap Dropify CSS -->
    <link href="/admin-assets/vendors/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css"/>
    <!-- select2 CSS -->
    <link href="/admin-assets/vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>

@stop

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
                    <li><a href="{{ route('admin.blog.posts.index') }}"><span>Посты</span></a></li>
                    <li class="active"><span>Добавление поста</span></li>
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
                            <h6 class="panel-title txt-dark">Добавление поста</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap">
                                <form method="post" action="{{ route('admin.blog.posts.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div  class="tab-struct custom-tab-1">
                                        <ul role="tablist" class="nav nav-tabs">
                                            <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="main-tab" href="#main">Основное</a></li>
                                            <li role="presentation" class=""><a  data-toggle="tab" id="main-meta" role="tab" href="#meta" aria-expanded="false">Мета</a></li>
                                        </ul>
                                        <div class="tab-content" id="tabContent">
                                            <div  id="main" class="tab-pane fade active in" role="tabpanel">

                                                <!-- post categories -->
                                                <div class="{{ ($errors->first('category_id')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                                    <label class="control-label mb-10 text-left">Категория</label>
                                                    <select name="category_id" class="form-control select2">
                                                        <option value=""></option>

                                                        @foreach($listCategories as $category)

                                                            <option value="{{ $category->id }}" {{ (old('category_id') == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>

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
                                                <!-- end post categories -->

                                                <!-- post name -->
                                                <div class="{{ ($errors->first('name')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                                    <label class="control-label mb-10 text-left">Название</label>
                                                    <input type="text" id="post-name" class="form-control" name="name" value="{{ old('name') }}">

                                                    @if ($errors->first('name'))

                                                        <div class="help-block with-errors">
                                                            <ul class="list-unstyled">
                                                                <li>{{ $errors->first('name') }}</li>
                                                            </ul>
                                                        </div>

                                                    @endif

                                                </div>
                                                <!-- end post name -->

                                                <!-- post slug -->
                                                <div class="{{ ($errors->first('slug')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                                    <label class="control-label mb-10 text-left">ЧПУ</label>
                                                    <input type="text" name="slug" class="form-control slugify" data-source="#post-name" value="{{ old('slug') }}">

                                                    @if ($errors->first('slug'))

                                                        <div class="help-block with-errors">
                                                            <ul class="list-unstyled">
                                                                <li>{{ $errors->first('slug') }}</li>
                                                            </ul>
                                                        </div>

                                                    @endif

                                                </div>
                                                <!-- end post slug -->

                                                <!-- post small description -->
                                                <div class="{{ ($errors->first('small_description')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                                    <label class="control-label mb-10 text-left">Короткое описание</label>
                                                    <textarea name="small_description" class="form-control" rows="10">{{ old('small_description') }}</textarea>

                                                    @if ($errors->first('small_description'))

                                                        <div class="help-block with-errors">
                                                            <ul class="list-unstyled">
                                                                <li>{{ $errors->first('small_description') }}</li>
                                                            </ul>
                                                        </div>

                                                    @endif

                                                </div>
                                                <!-- end post small description -->

                                                <!-- post description -->
                                                <div class="{{ ($errors->first('description')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                                    <label class="control-label mb-10 text-left">Полное описание</label>
                                                    <textarea name="description" class="form-control" rows="10">{{ old('description') }}</textarea>

                                                    @if ($errors->first('description'))

                                                        <div class="help-block with-errors">
                                                            <ul class="list-unstyled">
                                                                <li>{{ $errors->first('description') }}</li>
                                                            </ul>
                                                        </div>

                                                    @endif

                                                </div>
                                                <!-- end post description -->

                                                <!-- post image -->
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
                                                <!-- end post image -->

                                                <!-- post tags -->
                                                <div class="{{ ($errors->first('tags')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                                    <label class="control-label mb-10 text-left">Теги</label>
                                                    <select name="tags[]" class="form-control select2-taggable" multiple="multiple">

                                                        @if (is_array(old('tags')))
                                                            @foreach(old('tags') as $tag)

                                                                <option value="{{ $tag }}" selected>{{ $tag }}</option>

                                                            @endforeach
                                                            @foreach ($listTags as $tag)
                                                                @if (in_array($tag->name, old('tags')))
                                                                    @continue
                                                                @else

                                                                    <option value="{{ $tag->name }}" selected>{{ $tag->name }}</option>

                                                                @endif
                                                            @endforeach
                                                        @else

                                                            @foreach($listTags as $tag)

                                                                <option value="{{ $tag->name }}">{{ $tag->name }}</option>

                                                            @endforeach

                                                        @endif

                                                    </select>

                                                    @if ($errors->first('tags'))

                                                        <div class="help-block with-errors">
                                                            <ul class="list-unstyled">
                                                                <li>{{ $errors->first('tags') }}</li>
                                                            </ul>
                                                        </div>

                                                    @endif

                                                </div>
                                                <!-- end post tags -->

                                                <!-- post date -->
                                                <div class="{{ ($errors->first('date')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                                    <label class="control-label mb-10 text-left">Дата</label>
                                                    <div class='input-group datetimepicker'>
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
                                                <!-- end post date -->

                                                <!-- post active -->
                                                <div class="form-group mb-30">
                                                    <div class="checkbox checkbox-primary">
                                                        <input type="checkbox" name="active" {{ (old('active')) ? 'checked' : '' }}>
                                                        <label>Активно</label>
                                                    </div>
                                                </div>
                                                <!-- end post active -->
                                            </div>
                                            <div  id="meta" class="tab-pane fade" role="tabpanel">

                                                <!-- post meta title -->
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
                                                        <p>{postName} - Название поста</p>
                                                        <p>{siteName} - Название сайта</p>
                                                    </div>

                                                </div>
                                                <!-- end post meta title -->

                                                <!-- post meta keywords -->
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
                                                <!-- end post meta keywords -->

                                                <!-- post meta description -->
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
                                                <!-- end post meta description -->

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

    <!-- Moment JavaScript -->
    <script type="text/javascript" src="/admin-assets/vendors/bower_components/moment/min/moment-with-locales.min.js"></script>
    <!-- Bootstrap Datetimepicker JavaScript -->
    <script type="text/javascript" src="/admin-assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/speakingurl/14.0.1/speakingurl.min.js"></script>
    <script type="text/javascript" src="/admin-assets/vendors/bower_components/slugify/slugify.min.js"></script>
    <script src="/admin-assets/dist/js/slugify.js"></script>
    <!-- Bootstrap Daterangepicker JavaScript -->
    <script src="/admin-assets/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Form Picker Init JavaScript -->
    <script src="/admin-assets/dist/js/form-picker-data.js"></script>

    <script src="/admin-assets/vendors/bower_components/dropify/dist/js/dropify.min.js"></script>

    <!-- Form Flie Upload Data JavaScript -->
    <script src="/admin-assets/dist/js/form-file-upload-data.js"></script>

    <!-- Select2 JavaScript -->
    <script src="/admin-assets/vendors/bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- Form Advance Init JavaScript -->
    <script src="/admin-assets/dist/js/select2-data.js"></script>

@stop