@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header">{{ __('Product Details') }}</div>

                <div class="product_image d-flex justify-content-end">
                    <img src=" {{ asset('storage/images/products/' . $product->product_image ) }}" alt="product image" width="150" />
                </div>

                <dl class="row show_product_detail">

                    <dt class="col-sm-3">Product Code</dt>
                    <dd class="col-sm-9">{{ ($product->product_code === null)?'???-'.$product->id:$product->product_code }}</dd>

                    <dt class="col-sm-3">Product Name</dt>
                    <dd class="col-sm-9">{{ strtoupper($product->name) }}</dd>

                    <dt class="col-sm-3">Product Description</dt>
                    <dd class="col-sm-9">{{ $product->description }}</dd>

                    <dt class="col-sm-3">Main Category</dt>
                    <dd class="col-sm-9">{{ ucfirst($product->category) }}</dd>

                    <dt class="col-sm-3">Dish Type</dt>
                    <dd class="col-sm-9">{{ ucfirst($product->country) }}</dd>

                    <dt class="col-sm-3">Selling Price</dt>
                    <dd class="col-sm-9">{{ $product->price }}</dd>

                    <dt class="col-sm-3">Date added</dt>
                    <dd class="col-sm-9">{{ date('Y-m-d', strtotime($product->created_at)) }}</dd>

                    <dt class="col-sm-3">Last Update</dt>
                    <dd class="col-sm-9">{{ date('Y-m-d', strtotime($product->updated_at)) }}</dd>

                </dl>

                <div class="container">
                <div class="row">
                    <div class="col-sm">
                    <form method="GET" action="{{ route('product.edit', $product->id ) }}" accept-charset="UTF-8">
                        <input class="btn btn-primary btn-edit my_buttons" type="submit" value=" EDIT ">
                    </form>
                    </div>
                    <div class="col-sm">
                    <form method="POST" action="{{ route('product.destroy', $product->id ) }}" accept-charset="UTF-8">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input class="btn btn-danger btn-delete my_buttons" onclick="return myFunction()" type="submit" value="DELETE">
                    </form>
                    </div>
                    <div class="col-sm" style="margin-bottom:4px">
                        <a class="btn btn-secondary my_buttons" href="{{ url()->previous() }}" role="button" > << BACK </a>
                    </div>
                </div>
                </div>

            </div> <!-- card body -->
        </div>
    </div>
</div>
</div>
@endsection
<script>
    function myFunction() {
        if (!confirm('Are you sure?')) {
               event.preventDefault();
        }

    }
</script>