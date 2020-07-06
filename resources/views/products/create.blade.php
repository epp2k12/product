@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Product') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action=" {{ route('upload_product_image') }}" enctype="multipart/form-data">
                    @csrf 
                    <div class="row">
                        <div class="col-md-3">

                        <div class="product_image_preview_container" id="product_image_preview_container">
                            <img onmouseover="" src="{{ asset('storage/images/products/product.jpeg' ) }}" alt="product" class="product_image_preview" name="product_image_preview" id="product_image_preview" width="130" />
                        </div>

                        </div>
                        <div class="form-group col-md-9">
                            <div class="col-md-6">


                                <label for="product_image">Choose a product image:</label>
                                <input type="file" class="product_image_file" id="prod_img_file" name="prod_img_file" accept="image/png, image/jpeg, image/jpg">

                    <!--            <button type="submit" class="btn btn-primary" style="margin:10px 0" onclick="test()">
                                    {{ __('Upload Image') }}
                                </button>       
                    --> 

                            </div>
                        </div>
                    </div>
                    </form>

                    <form method="POST" action=" {{ route('product.store') }}">
                        @csrf
                        <!-- cross site request forgery -->
                        <!--            
                        <div class="form-group row">
                            <label for="prefix" class="col-sm-2 col-form-label">Prefix</label>
                            <div class="col-sm-10">
                                  <select class="form-control" id="prefix" name="prefix">
                                    <option value="ABC">ABC</option>
                                    <option value="DEF">DEF</option>
                                    <option value="GHI">GHI</option>
                                    <option value="JKL">JKL</option>
                                </select>
                            </div>
                        </div>
        -->
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" required>
                            </div>
                        </div>
                <!--    
                        <div class="form-group row">
                            <label for="dish_type" class="col-sm-2 col-form-label">Dish Type</label>
                            <div class="col-sm-10">
                            <select class="form-control" id="dish_type" name="dish_type">
                                    <option value="House Special">House Special</option>
                                    <option value="Spanish">Spanish</option>
                                    <option value="Filipino">Filipino</option>
                                    <option value="Japanese">Japanese</option>
                                    <option value="Chinese">Chinese</option>
                                </select>                               
                            </div>
                        </div>
                -->

                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" rows="5" id="description" placeholder="Enter Description" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2" id="testID">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- card body -->
            </div>
        </div>
    </div>
</div>
@endsection