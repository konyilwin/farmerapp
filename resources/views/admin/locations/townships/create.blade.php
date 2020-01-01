@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.township.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.townships.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.township.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($city) ? $city->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.township.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('division') ? 'has-error' : '' }}">
                <label for="division">{{ trans('cruds.township.fields.division') }}
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="division" id="townships" class="form-control select2">
                    @foreach($divisions as $id => $division)
                        <option value="{{ $id }}" {{ (old('division', isset($township) && $township->division_id == $id))  ? 'selected' : '' }}>{{ $division }}</option>
                    @endforeach
                </select>
                @if($errors->has('division'))
                    <em class="invalid-feedback">
                        {{ $errors->first('division') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.product.fields.division_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                <label for="city">{{ trans('cruds.township.fields.city') }}
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="city" id="townships" class="form-control select2">
                    @foreach($cities as $id => $city)
                        <option value="{{ $id }}" {{ (old('city', isset($township) && $township->city_id == $id))  ? 'selected' : '' }}>{{ $city }}</option>
                    @endforeach
                </select>
                @if($errors->has('city'))
                    <em class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.township.fields.city_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
