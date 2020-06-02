@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action=" {{ route('upload_image') }}" enctype="multipart/form-data">
                        @csrf <!-- cross site request forgery -->

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Profile Picture') }}</label>

                            <div class="col-md-6">
                                <label for="avatar">Choose a profile picture:</label>
                                <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg, image/jpg">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Upload Image') }}
                                </button>

                            </div>
                        </div>


                    </form>
                </div> <!-- card body -->
            </div>
        </div>
    </div>
</div>
@endsection