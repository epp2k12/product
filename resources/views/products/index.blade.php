@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product List') }}</div>

                <div class="card-body">

                {{ dd($products) }}


                </div> <!-- card body -->
            </div>
        </div>
    </div>
</div>
@endsection