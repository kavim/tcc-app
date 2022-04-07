<div class="row">
    <div class="col-12">
        <img id="preview-image" src="{{ $company ? $company->getAvatar() : asset('images/default-img.jpg') }}"
             alt="preview image" style="max-height: 200px; max-width: 200px">
        <br>
        <small>(300x300)</small>
        <i class="bi bi-cloud-arrow-up"></i>
        <br>
        <label for="file-upload" class="custom-file-upload">
            <i class="fa-solid fa-cloud-arrow-up"></i> {{ trans('sentences.company_logo') }}
        </label>
        <input id="file-upload" type="file" name="image"/>
    </div>
</div>

<hr>

<div class="row mb-3">
    <label for="company_name"
           class="col-md-4 col-form-label text-md-end">{{ __('sentences.company.company_name') }}</label>

    <div class="col-md-6">
        <input id="company_name" type="text"
               class="form-control @error('company_name') is-invalid @enderror"
               name="company_name" value="{{ old('company_name') ?? $company->name ?? '' }}" required
               autocomplete="company_name" autofocus>

        @error('company_name')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="company_email"
           class="col-md-4 col-form-label text-md-end">{{ __('sentences.company.company_email') }}</label>

    <div class="col-md-6">
        <input id="company_email" type="text"
               class="form-control @error('company_email') is-invalid @enderror"
               name="company_email" value="{{ old('company_email') ?? $company->email ?? '' }}" required
               autocomplete="company_email">

        @error('company_email')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="phone"
           class="col-md-4 col-form-label text-md-end">{{ __('sentences.company.phone') }}</label>

    <div class="col-md-6">
        <input id="phone" type="text"
               class="form-control @error('phone') is-invalid @enderror"
               name="phone" value="{{ old('phone') ?? $company->phone ?? '' }}" required autocomplete="phone"
               >

        @error('phone')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="website"
           class="col-md-4 col-form-label text-md-end">{{ __('sentences.company.website') }}</label>

    <div class="col-md-6">
        <input id="website" type="text"
               class="form-control @error('website') is-invalid @enderror"
               name="website" value="{{ old('website') ?? $company->website ?? '' }}" required autocomplete="website"
               autofocus>

        @error('website')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="resume"
           class="col-md-4 col-form-label text-md-end">{{ __('sentences.company.resume') }}</label>

    <div class="col-md-6">

        <textarea class="form-control" name="resume"
                  id="resume">{{ old('resume') ?? $company->resume ?? 'resume' }}</textarea>

        @error('resume')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="bio"
           class="col-md-4 col-form-label text-md-end">{{ __('sentences.company.bio') }} /
        bio</label>

    <div class="col-md-6">
        <input id="bio" type="text" class="form-control @error('bio') is-invalid @enderror"
               name="bio" value="{{ old('bio') ?? $company->bio ?? 'bio' }}" required autocomplete="bio" autofocus>

        @error('bio')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<hr>

<strong>Redes</strong>
@foreach($social_networks as $key => $rede)
    <div class="row mb-3">
        <label for="social_networks_{{ $key }}"
            class="col-md-4 col-form-label text-md-end">{{ $key }}</label>

        <div class="col-md-6">

            <input id="social_networks_{{ $key }}" type="text" class="form-control"
                name="{{ 'social_networks['.$key.']' }}" value="{{ $social_networks[$key] }}"
                placeholder="{{$key}}">

            @error('social_networks')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
@endforeach
