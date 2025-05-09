@extends('layouts.admin')
@section('content')
    <!--@can('ship_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.ships.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.ship.title_singular') }}
                </a>
            </div>
        </div>
    @endcan--><br>
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.ship.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Ship">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.ship.fields.id') }}
                        </th>
                        <th style="min-width: 200px;"> &nbsp;</th>

                        <th style="min-width: 102px;">
                            {{ trans('cruds.ship.fields.ship_ids') }}
                        </th>
                        <th style="min-width: 70px">
                            {{ trans('cruds.ship.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.ship.fields.call_sign') }}
                        </th>
                        <th>
                            Send To Pertamina
                        </th>
                        <th style ="min-width:150px;">
                            {{ trans('cruds.ship.fields.owner') }}
                        </th>

                        <th style="min-width: 100px;">
                            Last Sent Time
                        </th>

                        <th width="150">
                            Last Sent Destination
                        </th>

                        <th style="min-width: 100px;">
                            Last Sent Status
                        </th>

                        <!--<th width="40">
                            {{ trans('cruds.ship.fields.region_name') }}
                        </th>
                        <th style="min-width: 120px;">
                            {{ trans('cruds.ship.fields.last_registration_utc') }}
                        </th>

                        <th>
                            {{ trans('cruds.ship.fields.type') }}
                        </th>-->
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ships as $key => $ship)
                        <tr data-entry-id="{{ $ship->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $ship->id ?? '' }}
                            </td>
                            <td style="text-align: center;">
                                @can('ship_show')
                                    <a class="btn btn-xs btn-success" href="{{ route('admin.ships.show', $ship->id) }}">
                                        {{ trans('global.go_to_table') }}
                                    </a>
                                @endcan

                                @can('ship_ptp')
                                   <a class="btn btn-xs btn-danger" href="{{ route('admin.ships.ptps', $ship->id) }}" style="color: #fff;">
                                        PTP
                                   </a>
                                @endcan

                                <!--@can('ship_delete')
                                    <form action="{{ route('admin.ships.destroy', $ship->id) }}" method="POST"
                                          onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                          style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger"
                                               value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan-->
                                @can('ship_logs')
                                    <a class="btn btn-xs btn-warning" href="{{ route('admin.ships.logs', $ship->id) }}" style="color: #fff;">
                                        Logs
                                    </a>
                                @endcan

                                @can('ship_edit')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.ships.edit', $ship->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                            </td>
                            <td>
                                {{ $ship->ship_ids ?? '' }}
                            </td>
                            <td>
                                {{ $ship->name ?? '' }}
                            </td>
                            <td style="text-align: center;">
                                {{ $ship->call_sign ?? '' }}
                            </td>
                            <td style="text-align: center;">
                                {{ $ship->send_to_pertamina == 1 ? 'Enabled' :  'Disabled' }}
                                {{-- {{ $ship->send_to_pertamina == 1 ? 'Disabled' :  'Enabled' }} --}}
                            </td>
                            <td>
                                {{ $ship->owner ?? '' }}
                            </td>
                            <td>
                                {{ $ship->emailSendPertaminaLast()->created_at ?? '' }}
                            </td>
                            <td>
                                {{ $ship->emailSendPertaminaLast()->last_sent_destination ?? '' }}
                            </td>
                            <td style="text-align: center;">
                                {{ $ship->emailSendPertaminaLast()->last_sent_status ?? '' }}
                            </td>
                            <!--<td>
                                {{ $ship->region_name ?? '' }}
                            </td>
                            <td>
                                {{ $ship->last_registration_utc ?? '' }}
                            </td>

                            <td>
                                {{ App\Ship::TYPE_SELECT[$ship->type] ?? '' }}
                            </td>-->
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
                @can('ship_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.ships.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({selected: true}).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSuredeleteterminal') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: {ids: ids, _method: 'DELETE'}
                        })
                            .done(function () {
                                location.reload()
                            })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                order: [[1, 'desc']],
                pageLength: 100,
                select: {
                //style:    'multi',
                style:    'single',
                selector: 'td:first-child'
                }
            });
            $('.datatable-Ship:not(.ajaxTable)').DataTable({buttons: dtButtons})
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
