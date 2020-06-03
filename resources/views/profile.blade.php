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

                
                    <div class="row">
                
                        <div class="col-md-3">
                           @if(Auth::user()->avatar)
                                <img src="{{ asset('storage/images/'. Auth::user()->avatar ) }}" alt="avatar" width="120" />
                           @endif
       
                        </div>

                        <div class="form-group col-md-9">
                            <div class="col-md-6">
                                <label for="avatar">Choose a profile picture:</label>
                                <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg, image/jpg">
 
                                <button type="submit" class="btn btn-primary" style="margin:10px 0">
                                    {{ __('Upload Image') }}
                                </button>
 
                            </div>
                        </div>


                    </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">


                            </div>
                        </div>
                    </form>




                </div> <!-- card body -->
            </div>
        </div>
    </div>
</div>
@endsection