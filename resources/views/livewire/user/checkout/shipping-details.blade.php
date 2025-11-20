<div>
    <form action="{{ route('user.checkout.store') }}" method="post">
        @csrf
        <div class="checkout-wrapper">
            <div class="account-section billing-section">
                <h5 class="wrapper-heading">Billing Details</h5>
                <div class="review-form">

                    <div class="account-inner-form">
                        <div class="review-form-name">
                            <label for="fname" class="form-label">First Name*</label>
                            <input name="fname" type="text" id="fname" class="form-control"
                                placeholder="First Name" />
                            <x-error-validate field="fname" />
                        </div>
                        <div class="review-form-name">
                            <label for="lname" class="form-label">Last Name*</label>
                            <input name="lname" type="text" id="lname" class="form-control"
                                placeholder="Last Name" />
                            <x-error-validate field="lname" />
                        </div>
                    </div>

                    <div class="account-inner-form">
                        <div class="review-form-name">
                            <label for="email" class="form-label">Email*</label>
                            <input name="user_email" type="email" id="email" class="form-control"
                                placeholder="user@gmail.com" />
                            <x-error-validate field="user_email" />
                        </div>
                        <div class="review-form-name">
                            <label for="phone" class="form-label">Phone*</label>
                            <input name="user_phone" type="tel" id="phone" class="form-control"
                                placeholder="+880388**0899" />
                            <x-error-validate field="user_phone" />
                        </div>
                    </div>


                    {{-- Country Select --}}
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
                        <select name="city_id" wire:model.live="cityId" class="form-control" id="city_id">
                            <option value="" selected>Select City</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        @error('city_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="review-form-name">
                        <label for="street" class="form-label">street*</label>
                        <input name="street" type="text" id="street" class="form-control" placeholder="street" />
                        <x-error-validate field="street" />
                    </div>

                    <div class="review-form-name">
                        <label for="note" class="form-label">note*</label>
                        <input name="note" type="text" id="note" class="form-control" placeholder="note" />
                        <x-error-validate field="note" />
                    </div>
                    <br>

                    <button type="submit" class="shop-btn">Place Order Now</>



                </div>
            </div>
        </div>
    </form>
</div>
