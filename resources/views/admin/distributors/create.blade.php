@extends('layouts.admin')
@section('content')
<div style="margin-top:40px;">
</div>

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.distributor.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.distributors.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">{{ trans('cruds.distributor.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                           id="name" value="{{ old('name', '') }}" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.distributor.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="username">{{ trans('cruds.distributor.fields.username') }}</label>
                    <input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" type="text"
                           name="username" id="username" value="{{ old('username') }}" required>
                    @if($errors->has('username'))
                        <div class="invalid-feedback">
                            {{ $errors->first('username') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.distributor.fields.username_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="password">{{ trans('cruds.distributor.fields.password') }}</label>
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                           name="password" id="password" required>
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.distributor.fields.password_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="roles">{{ trans('cruds.distributor.fields.roles') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                              style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                              style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]"
                            id="roles" multiple required>
                        @foreach($roles as $id => $roles)
                            <option
                                value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $roles }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('roles'))
                        <div class="invalid-feedback">
                            {{ $errors->first('roles') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.distributor.fields.roles_helper') }}</span>
                </div>
                <!--<div class="form-group">
                    <label for="terminals">{{ trans('cruds.distributor.fields.terminal') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('terminals') ? 'is-invalid' : '' }}" name="terminals[]" id="terminals" multiple>
                        @foreach($terminals ?? '' as $id => $terminal)
                            <option value="{{ $id }}" {{ in_array($id, old('terminals', [])) ? 'selected' : '' }}>{{ $id .' - '.$terminal }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('terminals'))
                        <div class="invalid-feedback">
                            {{ $errors->first('terminals') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.distributor.fields.terminal_helper') }}</span>
                </div>-->
                <div class="form-group">
                    <label for="ships">{{ trans('cruds.distributor.fields.ship') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                              style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                              style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('ships') ? 'is-invalid' : '' }}" name="ships[]"
                            id="ships" multiple >

                        @foreach($ships as $ship)
                            <option
                                value="{{ $ship->id }}" {{ in_array($ship->id, old('ships', [])) ? 'selected' : '' }}>{{ $ship->ship_ids .' - '. $ship->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('ships'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ships') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.distributor.fields.ship_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="email">{{ trans('cruds.distributor.fields.destinasion-email') }}</label>
                    <div class="clone-email">
                        <div class="form-inline">
                            <input class="form-control col-md-8 {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                   type="email" name="email[]" id="email">
                            <span class="col-md-1"></span>
                            <div class="btn btn-warning col-md-2 delete-clone-email" style="display: none">- Delete Email</div>
                        </div>
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.distributor.fields.roles_helper') }}</span>
                        <br>
                    </div>
                    <span class="clone-last"></span>
                    <!--<div class="btn btn-info add-clone-email">+ Add New Email</div>-->
                </div>
                <div class="form-group">

                </div><br>
                <div class="form-group">
                    <button class="btn btn-danger pull-left" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var count = 1;
        $(document).ready(function () {
            $(".add-clone-email").on('click', function () {
                if(count >= 9 ){
                    $(".add-clone-email").hide();
                }

                var clone = $('.clone-email:last').clone();
                    // clone.removeClass('clone-email').addClass('clone-email'+count);
                    clone.find("#email").attr({ name: "email[]"});
                    clone.find("#email").val("");
                    clone.find(".delete-clone-email").show();
                    clone.appendTo('.clone-last');
                count++;
            });
        });

        $(document).on('click', ".delete-clone-email", function () {
            $(this).closest(".clone-email").remove();
            count--;
        });
    </script>
@endsection
