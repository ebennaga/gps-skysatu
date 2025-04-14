<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>
    <!--<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"/>-->

    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="{{ asset('css/all.css') }}" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
    <link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/select.dataTables.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/coreui.min.css') }}" rel="stylesheet"/>

<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.3.2/dist/js/coreui.bundle.min.js" integrity="sha384-yaqfDd6oGMfSWamMxEH/evLG9NWG7Q5GHtcIfz8Zg1mVyx2JJ/IRPrA28UOLwAhi" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <link href="{{ asset('css/dropzone.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/custom.css?v=').time()}} }}" rel="stylesheet"/>

    @yield('styles')
    <style>
        .select2-results__option[aria-selected=true] {
            display: none;
        }
        body {
            font-family: Roboto, 'Segoe UI', Tahoma, sans-serif !important;
        }
    </style>

</head>


{{--<body class="app header-fixed sidebar-fixed aside-menu-fixed pace-done sidebar-lg-show ">--}}
<body class="app header-fixed aside-menu-fixed pace-done sidebar-hidden">


{{--<nav>--}}
{{--    <ul class="sidebar ">--}}
{{--        <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>--}}
{{--        <li><a href="{{ route("admin.home") }}"> {{ trans('global.dashboard') }}</a></li>--}}

{{--        @can('ship_access')--}}
{{--        <li ><a href="{{ route("admin.ships.index") }}">{{ trans('cruds.ship.title') }}</a></li>--}}
{{--        @endcan--}}
{{--        @can('email_destination_access')--}}
{{--        <li ><a href="{{ route("admin.email-destination.index") }}">Destination Email</a></li>--}}
{{--        @endcan--}}
{{--        @can('user_management_access')--}}
{{--        <li >--}}
{{--            <a href="#">{{ trans('cruds.userManagement.title') }}</a>--}}
{{--            <ul class="dropdown">--}}
{{--                @can('permission_access')--}}
{{--                <li><a href="{{ route("admin.permissions.index") }}">{{ trans('cruds.permission.title') }}</a></li>--}}
{{--               @endcan--}}
{{--               @can('role_access')--}}
{{--               <li><a href="{{ route("admin.roles.index") }}">{{ trans('cruds.role.title') }}</a></li>--}}
{{--                @endcan--}}
{{--                @can('user_access')--}}
{{--                <li><a href="{{ route("admin.users.index") }}">{{ trans('cruds.user.title') }}</a></li>--}}
{{--                @endcan--}}
{{--                @can('distributor_access')--}}
{{--                <li><a href="{{ route("admin.distributors.index") }}">{{ trans('cruds.distributor.title') }}</a></li>--}}
{{--                @endcan--}}
{{--                @can('manager_access')--}}
{{--                <li><a href="{{ route("admin.managers.index") }}">{{ trans('cruds.manager.title') }}</a></li>--}}
{{--                @endcan--}}
{{--                <li ><a href="{{ route("admin.change-password") }}">  {{ trans('cruds.user.fields.change_password') }}</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        @endcan--}}
{{--        @can('setting_access')--}}

{{--        <li >--}}
{{--            <a href="#">{{ trans('cruds.setting.title') }}</a>--}}
{{--            <ul class="dropdown">--}}
{{--                <li><a href="{{ route("admin.change-timezone") }}">Timezone</a></li>--}}

{{--            </ul>--}}
{{--        </li>--}}
{{--        @endcan--}}
{{--        <li >--}}
{{--            <a href="#"--}}
{{--               onclick="event.preventDefault(); document.getElementById('logoutform').submit();">--}}
{{--                {{ trans('global.logout') }}--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--    <ul>--}}
{{--        <li><a href="{{ route("admin.home") }}">  {{ trans('panel.site_title') }}</a></li>--}}
{{--        <li class="hideOnMobile"><a href="{{ route("admin.home") }}">  {{ trans('global.dashboard') }}</a></li>--}}
{{--        @can('ship_access')--}}
{{--        <li class="hideOnMobile"><a href="{{ route("admin.ships.index") }}">{{ trans('cruds.ship.title') }}</a></li>--}}
{{--        @endcan--}}
{{--        @can('email_destination_access')--}}
{{--        <li class="hideOnMobile"><a href="{{ route("admin.email-destination.index") }}">Destination Email</a></li>--}}
{{--        @endcan--}}
{{--        @can('user_management_access')--}}
{{--        <li class="hideOnMobile">--}}
{{--            <a href="#">{{ trans('cruds.userManagement.title') }}</a>--}}
{{--            <ul class="dropdown">--}}
{{--                @can('permission_access')--}}
{{--                <li><a href="{{ route("admin.permissions.index") }}">{{ trans('cruds.permission.title') }}</a></li>--}}
{{--               @endcan--}}
{{--               @can('role_access')--}}
{{--               <li><a href="{{ route("admin.roles.index") }}">{{ trans('cruds.role.title') }}</a></li>--}}
{{--                @endcan--}}
{{--                @can('user_access')--}}
{{--                <li><a href="{{ route("admin.users.index") }}">{{ trans('cruds.user.title') }}</a></li>--}}
{{--                @endcan--}}
{{--                @can('distributor_access')--}}
{{--                <li><a href="{{ route("admin.distributors.index") }}">{{ trans('cruds.distributor.title') }}</a></li>--}}
{{--                @endcan--}}
{{--                @can('manager_access')--}}
{{--                <li><a href="{{ route("admin.managers.index") }}">{{ trans('cruds.manager.title') }}</a></li>--}}
{{--                @endcan--}}
{{--                <li class="hideOnMobile"><a href="{{ route("admin.change-password") }}">  {{ trans('cruds.user.fields.change_password') }}</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        @endcan--}}
{{--        @can('setting_access')--}}

{{--        <li class="hideOnMobile">--}}
{{--            <a href="#">{{ trans('cruds.setting.title') }}</a>--}}
{{--            <ul class="dropdown">--}}
{{--                <li><a href="{{ route("admin.change-timezone") }}">Timezone</a></li>--}}

{{--            </ul>--}}
{{--        </li>--}}
{{--        @endcan--}}
{{--        <li class="hideOnMobile">--}}
{{--            <a href="#" class="nav-link"--}}
{{--               onclick="event.preventDefault(); document.getElementById('logoutform').submit();">--}}
{{--                {{ trans('global.logout') }}--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>--}}
{{--    </ul>--}}


{{--</nav>--}}
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand d-flex align-items-end" href="/" style="padding-right: 130px; margin-top: 1.5rem;">
        <img src="{{ asset('images/logo-s1.png') }}" alt="Logo" style="height: 80px; width: auto; margin-left: -10px;">
        <span style="margin-left: -10px; font-size: 24px; font-weight: 500; color: grey; padding-bottom: 18px;">Asset Tracking</span>
    </a>
    <button class="navbar-toggler mr-auto mr-lg-auto mr-md-auto mr-xl-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    @include('partials.nav_menu')
</nav>


<div>
{{--    @include('partials.menu')--}}
    <main class="main">
        <div class="container-fluid">
            @if(session('message'))
                <div class="row mb-2">
                    <div class="col-lg-12">
                        <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                    </div>
                </div>
            @endif
            @if($errors->count() > 0)
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')

        </div>


    </main>
    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</div>
<!--@include('partials.spinner')-->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!--<script src="{{ asset('js/popper.min.js') }}"></script>-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
<script src="{{ asset('js/coreui.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('js/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/jszip.min.js') }}"></script>
<script src="{{ asset('js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('js/ckeditor.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/dropzone.min.js') }}"></script>
<!--<script src="{{ asset('js/bootstrap-tagsinput.js') }}"></script>-->
<script src="{{ asset('js/main.js') }}"></script>
<script>
    $(function () {
        let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
        let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
        let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
        let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
        let printButtonTrans = '{{ trans('global.datatables.print') }}'
        let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'

        let languages = {
            'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json',
            'id': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json'
        };

        $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {className: 'btn'})
        $.extend(true, $.fn.dataTable.defaults, {
            language: {
                url: languages['{{ app()->getLocale() }}']
            },
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }, {
                orderable: false,
                searchable: false,
                targets: -1
            }],
            select: {
                style: 'multi+shift',
                selector: 'td:first-child'
            },
            order: [],
            scrollX: true,
            pageLength: 100,
            dom: 'lBfrtip<"actions">',
            buttons: [
                {
                    extend: 'copy',
                    className: 'btn-default',
                    text: copyButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csv',
                    className: 'btn-default',
                    text: csvButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excel',
                    className: 'btn-default',
                    text: excelButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    className: 'btn-default',
                    text: pdfButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    className: 'btn-default',
                    text: printButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'colvis',
                    className: 'btn-default',
                    text: colvisButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ]
        });

        $.fn.dataTable.ext.classes.sPageButton = '';
    });

</script>
<script>
    $(document).ready(function () {
        $('.searchable-field').select2({
            minimumInputLength: 3,
            ajax: {
                url: '{{ route("admin.globalSearch") }}',
                dataType: 'json',
                type: 'GET',
                delay: 200,
                data: function (term) {
                    return {
                        search: term
                    };
                },
                results: function (data) {
                    return {
                        data
                    };
                }
            },
            escapeMarkup: function (markup) {
                return markup;
            },
            templateResult: formatItem,
            templateSelection: formatItemSelection,
            placeholder: '{{ trans('global.search') }}...',
            language: {
                inputTooShort: function (args) {
                    var remainingChars = args.minimum - args.input.length;
                    var translation = '{{ trans('global.search_input_too_short') }}';

                    return translation.replace(':count', remainingChars);
                },
                errorLoading: function () {
                    return '{{ trans('global.results_could_not_be_loaded') }}';
                },
                searching: function () {
                    return '{{ trans('global.searching') }}';
                },
                noResults: function () {
                    return '{{ trans('global.no_results') }}';
                },
            }

        });

        function formatItem(item) {
            if (item.loading) {
                return '{{ trans('global.searching') }}...';
            }
            var markup = "<div class='searchable-link' href='" + item.url + "'>";
            markup += "<div class='searchable-title'>" + item.model + "</div>";
            $.each(item.fields, function (key, field) {
                markup += "<div class='searchable-fields'>" + item.fields_formated[field] + " : " + item[field] + "</div>";
            });
            markup += "</div>";

            return markup;
        }

        function formatItemSelection(item) {
            if (!item.model) {
                return '{{ trans('global.search') }}...';
            }
            return item.model;
        }

        $(document).delegate('.searchable-link', 'click', function () {
            var url = $(this).attr('href');
            window.location = url;
        });
    });

    $(window).on('load', function(){
        if($('#overlay-box').length > 0) {
            $('#overlay-box').fadeOut('slow', function(){
                $(this).hide()
            });
        }
    });
</script>
<script>
    function showSidebar(){
        const sidebar = document.querySelector('.sidebar')
        sidebar.style.display='flex'
        console.log('masuk')
    }
    function hideSidebar(){
        const sidebar = document.querySelector('.sidebar')
        sidebar.style.display='none'
    }
</script>
{{--<script>  --}}
{{--    setTimeout(function(){  --}}
{{--        location.reload();  --}}
{{--    },300000);  --}}
{{-- </script> --}}
@yield('scripts')

</body>

</html>
