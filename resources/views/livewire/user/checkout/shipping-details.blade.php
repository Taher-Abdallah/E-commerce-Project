<div>
    <div class="checkout-wrapper">
        <div class="account-section billing-section">
            <h5 class="wrapper-heading">Billing Details</h5>
            <div class="review-form">
                <div class="account-inner-form">
                    <div class="review-form-name">
                        <label for="fname" class="form-label">First Name*</label>
                        <input type="text" id="fname" class="form-control" placeholder="First Name" />
                    </div>
                    <div class="review-form-name">
                        <label for="lname" class="form-label">Last Name*</label>
                        <input type="text" id="lname" class="form-control" placeholder="Last Name" />
                    </div>
                </div>
                <div class="account-inner-form">
                    <div class="review-form-name">
                        <label for="email" class="form-label">Email*</label>
                        <input type="email" id="email" class="form-control" placeholder="user@gmail.com" />
                    </div>
                    <div class="review-form-name">
                        <label for="phone" class="form-label">Phone*</label>
                        <input type="tel" id="phone" class="form-control" placeholder="+880388**0899" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="country_id">Country</label>
                    <select name="country_id" wire:model.live="countryId" class="form-control" id="country_id">
                        <option value="" selected>Select Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }} ">{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @error('country_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                {{-- Governerate Select --}}
                <div class="form-group">
                    <label for="governorate_id">Governorate</label>
                    <select name="governorate_id" wire:model.live="governorateId" class="form-control"
                        id="governorate_id">
                        <option value="" selected>Select Governorate</option>
                        @foreach ($governorates as $governorate)
                            <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                        @endforeach
                    </select>
                    @error('governorate_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                {{-- City Select --}}
                <div class="form-group">
                    <label for="city_id">City</label>
                    <select name="city_id" wire:model="cityId" class="form-control" id="city_id">
                        <option value="" selected>Select City</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                    @error('city_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="review-form-name checkbox">
                    <div class="checkbox-item">
                        <input type="checkbox" id="account" />
                        <label for="account" class="form-label">
                            Create an account?</label>
                    </div>
                </div>
                <div class="review-form-name shipping">
                    <h5 class="wrapper-heading">Shipping Address</h5>
                    <div class="checkbox-item">
                        <input type="checkbox" id="remember" />
                        <label for="remember" class="form-label">
                            Create an account?</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
