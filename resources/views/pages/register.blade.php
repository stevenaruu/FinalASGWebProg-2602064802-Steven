@extends('contents.auth')

@section('auth')
    <div class="shadow card border-secondary custom-card">
        <div class="fw-bold card-header bg-secondary text-white text-center">@lang('lang.register')</div>
        <div class="card-body custom-card-body">
            <form method="POST" action="{{ route('do-register') }}">
                @csrf
                <div class="mb-3">
                    <label for="gender" class="form-label">@lang('lang.gender')</label>
                    <select class="form-select border-secondary" name="gender" id="gender">
                        @foreach ($genders as $gender)
                            <option value="{{ $gender->id }}" {{ old('gender') == $gender->id ? 'selected' : '' }}>
                                {{ $gender->gender == 'Male' ? __('lang.male') : __('lang.female') }}
                            </option>
                        @endforeach
                    </select>
                    @error('gender')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3" id="hobby-container">
                    <div class="d-grid gap-2 mb-3">
                        <button type="button" id="add-hobby-btn" class="fw-bold text-white btn btn-secondary">
                            @lang('lang.add_hobby')
                        </button>
                    </div>
                    @foreach (old('hobbies', ['', '', '']) as $i => $hobby)
                        <div class="row g-2 mb-3 align-items-center hobby-row">
                            <div class="col-auto">
                                <label for="hobby-{{ $i }}" class="col-form-label">@lang('lang.hobby')
                                    {{ $i + 1 }}:</label>
                            </div>
                            <div class="col">
                                <input type="text" name="hobbies[]" id="hobby-{{ $i }}"
                                    class="form-control border-secondary" value="{{ $hobby }}" required
                                    placeholder="@lang('lang.hobby') {{ $i + 1 }}">
                            </div>
                        </div>
                    @endforeach
                    @error('hobbies')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                    @error('hobbies.*')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">@lang('lang.username')</label>
                    <input type="text" name="username" id="username" placeholder="http://www.instagram.com/username"
                        class="form-control border-secondary" required>
                    @error('username')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="mobile_number" class="form-label">@lang('lang.mobile_number')</label>
                    <input type="text" name="mobile_number" id="mobile_number" class="form-control border-secondary"
                        required placeholder="0123456789">
                    @error('mobile_number')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">@lang('lang.password')</label>
                    <input type="password" name="password" id="password" placeholder="**********"
                        class="form-control border-secondary" required>
                    @error('password')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">@lang('lang.confirm_password')</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="**********"
                        class="form-control border-secondary" required>
                    @error('password_confirmation')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="fw-bold text-white btn btn-secondary">@lang('lang.register')</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('login') }}" class="text-warning">@lang('lang.already_have_account')</a>
        </div>
    </div>
@endsection