<div class="form-row">
    <div class="col-md-6 form-group">
        <select class="form-control custom-select mt-15" name="gender" wire:model="selectedGender">
            <option selected value="">{{__('values.selected_gender')}}</option>
            <option value="female">{{__('values.female')}}</option>
            <option value="male">{{__('values.male')}}</option>
        </select>
        @if($errors->has('gender'))<span
            class="error">{{ $errors->first('gender') }}</span>@endif
    </div>
    @if(!is_null($this->selectedGender) && $this->selectedGender == 'male')
        <div class="col-md-6 form-group">
            <select class="form-control custom-select mt-15" name="military">
                <option disabled selected>{{__('values.selected_military')}}</option>
                <option value="end">{{__('values.end')}}</option>
                <option value="exempt">{{__('values.exempt')}}</option>
                <option value="doing">{{__('values.doing')}}</option>
            </select>
            @if($errors->has('military'))<span
                class="error">{{ $errors->first('military') }}</span>@endif
        </div>
    @endif
</div>
