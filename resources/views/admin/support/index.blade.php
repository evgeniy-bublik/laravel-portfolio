@extends('layouts.admin')

@section('css')
    @parent

    <link href="/admin-assets/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="/admin-assets/dist/css/support.css">

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
                    <li class="active"><span>Support</span></li>
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
                            <h6 class="panel-title txt-dark">Support</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="inbox-body">
                                <div class="mail-option">
                                     <div class="chk-all">
                                         <input type="checkbox" class="mail-checkbox mail-group-checkbox">
                                         <div class="btn-group">
                                             <a href="#" class="btn mini all" aria-expanded="false">
                                                 All
                                             </a>
                                         </div>
                                     </div>

                                     <div class="btn-group hidden-phone">
                                         <a data-toggle="dropdown" href="#" class="btn mini blue" aria-expanded="false">
                                             More
                                             <i class="fa fa-angle-down "></i>
                                         </a>
                                         <ul class="dropdown-menu">
                                             <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                                             <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                         </ul>
                                     </div>

                                     {{ $supportMessages->links() }}
                                </div>
                                <table class="table table-inbox table-hover">
                                    <tbody>

                                        @foreach ($supportMessages as $message)

                                            <tr class="{{ ($message->is_new) ? 'unread' : '' }}" data-url="{{ route('admin.support.messages.view', compact('message')) }}">
                                                <td class="inbox-small-cells">
                                                    <input type="checkbox" class="mail-checkbox">
                                                </td>
                                                <td class="inbox-small-cells">{{ $message->name }}</td>
                                                <td class="view-message  dont-show">{{ $message->subject }}</td>
                                                <td class="view-message ">{{ str_limit($message->text, 20) }}</td>
                                                <td class="view-message  text-right">{{ $message->created_at }}</td>
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

    <script>
        $(document).on('click', '.table-inbox tr', function( e ) {
            e.preventDefault();

            location.href = $(this).data('url');
        });
    </script>

@stop