<div class="form-row">
    <div class="col-md-6 form-group">
        <select class="form-control custom-select mt-15" name="province_id" wire:model="selectedProvince">
            <option selected value="">{{__('values.selected_province')}}</option>
            @foreach($provinces as $province)
            <option value="{{$province->id}}">{{$province->name}}</option>
            @endforeach
        </select>
        @if($errors->has('province_id'))<span
            class="error">{{ $errors->first('province_id') }}</span>@endif
    </div>

    @if(!is_null($selectedProvince))
        <div class="col-md-6 form-group">
            <select class="form-control custom-select mt-15" name="city_id">
                <option selected value="">{{__('values.selected_city')}}</option>
                @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
            @if($errors->has('city'))<span
                class="error">{{ $errors->first('city') }}</span>@endif
        </div>
    @endif

</div>
