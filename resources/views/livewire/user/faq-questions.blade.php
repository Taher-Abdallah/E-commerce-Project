<div>
    <form wire:submit.prevent="submit">
        <div class="question-section login-section ">
            <div class="review-form">
                <h5 class="comment-title">{{ __('keywords.have_any_question') }}</h5>
                <div class=" account-inner-form">
                    <div class="review-form-name">
                        <label for="fname" class="form-label">{{ __('keywords.name') }}*</label>
                        <input wire:model.live="name" type="text" id="fname" class="form-control"
                            placeholder="{{ __('keywords.name') }}">
                            <x-error-validate field="name" />
                    </div>
                    <div class="review-form-name">
                        <label for="email" class="form-label">{{ __('keywords.email') }}*</label>
                        <input wire:model.live="email" type="email" id="email" class="form-control"
                            placeholder="user@gmail.com">
                            <x-error-validate field="email" />
                    </div>
                    <div class="review-form-name">
                        <label for="subject" class="form-label">{{ __('keywords.subject') }}*</label>
                        <input wire:model.live="subject" type="text" id="subject" class="form-control"
                            placeholder="{{ __('keywords.subject') }}">
                            <x-error-validate field="subject" />
                    </div>
                </div>
                <div class="review-textarea">
                    <label for="floatingTextarea">{{ __('keywords.message') }}*</label>
                    <textarea wire:model.live="message" class="form-control" placeholder="{{ __('keywords.write_message') }}..."
                        id="floatingTextarea" rows="3"></textarea>
                        <x-error-validate field="message" />
                </div>
                <div class="login-btn">
                    <button type="submit" class="shop-btn">{{ __('keywords.send') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>

