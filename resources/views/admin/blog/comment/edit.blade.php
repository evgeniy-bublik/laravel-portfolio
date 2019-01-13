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
                    <li><a href="{{ route('admin.blog.comments.index') }}"><span>Комментарии</span></a></li>
                    <li class="active"><span>Редактирование комментария</span></li>
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
                            <h6 class="panel-title txt-dark">Комментарий к посту: {{ $comment->post_name }}</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap">
                                <form method="post" action="{{ route('admin.blog.comments.update', compact('comment')) }}">
                                    @csrf
                                    {{ method_field('PUT') }}

                                    <div class="{{ ($errors->first('user_name')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                        <label class="control-label mb-10 text-left">Имя пользователя</label>
                                        <input type="text" name="user_name" class="form-control" value="{{ $comment->user_name }}" disabled>

                                        @if ($errors->first('user_name'))

                                            <div class="help-block with-errors">
                                                <ul class="list-unstyled">
                                                    <li>{{ $errors->first('user_name') }}</li>
                                                </ul>
                                            </div>

                                        @endif

                                    </div>

                                    <div class="{{ ($errors->first('user_email')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                        <label class="control-label mb-10 text-left">Email пользователя</label>
                                        <input type="text" name="user_email" class="form-control" value="{{ $comment->user_email }}" disabled>

                                        @if ($errors->first('user_email'))

                                            <div class="help-block with-errors">
                                                <ul class="list-unstyled">
                                                    <li>{{ $errors->first('user_email') }}</li>
                                                </ul>
                                            </div>

                                        @endif

                                    </div>

                                    <div class="{{ ($errors->first('text')) ? 'form-group has-error has-feedback' : 'form-group' }}">
                                        <label class="control-label mb-10 text-left">Текст комментария</label>
                                        <textarea name="text" class="form-control">{{ old('text', $comment->text) }}</textarea>

                                        @if ($errors->first('text'))

                                            <div class="help-block with-errors">
                                                <ul class="list-unstyled">
                                                    <li>{{ $errors->first('text') }}</li>
                                                </ul>
                                            </div>

                                        @endif

                                    </div>

                                    <div class="form-group mb-30">
                                        <div class="checkbox checkbox-primary">
                                            <input type="checkbox" name="active" {{ (old('active', $comment->active)) ? 'checked' : '' }}>
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

@section('js')
    @parent

    <script src="https://cdnjs.cloudflare.com/ajax/libs/speakingurl/14.0.1/speakingurl.min.js"></script>
    <script type="text/javascript" src="/admin-assets/vendors/bower_components/slugify/slugify.min.js"></script>
    <script src="/admin-assets/dist/js/slugify.js"></script>

@stop