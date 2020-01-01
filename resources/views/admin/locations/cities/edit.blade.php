@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.city.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("admin.cities.update",[$city->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PATCH")
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">{{ trans('cruds.city.fields.name') }}*</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($city) ? $city->name : '') }}" required>
                    @if($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.city.fields.name_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('division') ? 'has-error' : '' }}">
                    <label for="division">{{ trans('cruds.city.fields.division') }}
                        <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                    <select name="division" id="cities" class="form-control select2">
                        @foreach($divisions as $id => $division)
                            <option value="{{ $id }}" {{ (old('division', isset($city) && $city->division_id == $id))  ? 'selected' : '' }}>{{ $division }}</option>
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
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>


        </div>
    </div>
@endsection
