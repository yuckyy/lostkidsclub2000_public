@include('admin.header')
<!-- resources/views/products/create.blade.php -->
<div class="container">
    <h1>Create New Product</h1>

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Product Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Product Description UA</label>
            <textarea class="form-control" id="description_ua" name="description_ua" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" class="form-control" id="image" name="image">
            <div id="imagePreview" style="margin-top: 10px;">
                <img id="previewImg" src="" alt="Image Preview" style="display: none; max-width: 20%; height: auto;">
            </div>
        </div>

        <script>
            document.getElementById('image').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const previewImg = document.getElementById('previewImg');
                        previewImg.src = e.target.result;
                        previewImg.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                }
            });
        </script>

        <div class="mb-3">
            <label for="images" class="form-label">Product Images</label>
            <input type="file" class="form-control" id="imagesNew" name="imagesNew" multiple>
            <div id="imagesPreview" style="margin-top: 10px; display: flex; gap: 10px; flex-wrap: wrap;">
            </div>
        </div>

        <script>
            document.getElementById('imagesNew').addEventListener('change', function(event) {
                const files = event.target.files;
                const previewContainer = document.getElementById('imagesPreview');
                previewContainer.innerHTML = '';

                Array.from(files).forEach(file => {
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const imgElement = document.createElement('img');
                            imgElement.src = e.target.result;
                            imgElement.style.maxWidth = '100px';
                            imgElement.style.height = 'auto';
                            previewContainer.appendChild(imgElement);
                        }
                        reader.readAsDataURL(file);
                    }
                });
            });
        </script>


        <div class="mb-3">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Category</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category">
                    @foreach($AllCategiries as $AllCategirie)
                        <option value="{{$AllCategirie->pid}}"
                                data-placeholder="{{$AllCategirie->name}}">{{$AllCategirie->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Price</label>
            <input type="text" class="form-control" id="name" name="price" required>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <label for="xs" class="form-label">XS</label>
                <input type="checkbox" name="xs" aria-label="Checkbox for following text input">
                <label for="s" class="form-label">S</label>
                <input type="checkbox" name="s" aria-label="Checkbox for following text input">
                <label for="m" class="form-label">M</label>
                <input type="checkbox" name="m" aria-label="Checkbox for following text input">
                <label for="l" class="form-label">L</label>
                <input type="checkbox" name="l" aria-label="Checkbox for following text input">
                <label for="xl" class="form-label">XL</label>
                <input type="checkbox" name="xl" aria-label="Checkbox for following text input">
            </div>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Show</label>
            <input type="checkbox" name="show" aria-label="Checkbox for following text input">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">New</label>
            <input type="checkbox" name="new" aria-label="Checkbox for following text input">
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>


<br>
<div class="items-page mt-5">
    <div class="container">
        <div class="row">
            @foreach($products as $product)

                <div class="col-6 col-md-6 col-lg-4 col-xl-3 item-food-main-block " data-aos="zoom-in">
                    <div class="item-food-main-block-inner">
                        <div class="img-top-block">
                            <img class="img-food-main-block-item square-image" data-bs-toggle="modal"
                                 data-bs-target="#exampleModal{{$product->id}}"
                                 src="{{asset('img').'/product/'.$product->image}}">
                        </div>
                        <div class="main-item-desc">
                            <span>{{$product->name}}</span><br>
                            <button
                                class="btn   btn-light-my-tabs-items btn-food-add-main black-border-focus "><span class="price-adm"
                                    onclick="addToCart({{ $product->id }}, 'opened')">{{ $product->price}}<span class="price-adm">&nbsp;EUR &nbsp;<i
                                            class="fa-solid fa-plus"></i></span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">


                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="row modal-row-block">
                                <form action="{{ route('products.update', ['id' => $product->id])}}" method="post"
                                      enctype="multipart/form-data">
                                    <div class="row">
                                        @csrf
                                        @method('POST')
                                        <div class="col-12 col-md-6 ">
                                            <label for="imageNew" class="img-food-main-block-item-modal">
                                                <input type="file" id="imageNew" name="imageNew" accept="image/*"
                                                       style="display: none;" onchange="displayImage(this)">
                                                <img class="img-food-main-block-item-modal" id="img_cart_id{{ $product->id}}"
                                                     src="{{asset('img').'/product/'.$product->image}}"
                                                     alt="{{ $product->name }}">
                                            </label>
                                        </div>

                                        <script>
                                            function displayImage(input) {
                                                var imgElement = document.getElementById('img_cart_id{{ $product->id}}');
                                                var file = input.files[0];

                                                if (file) {
                                                    var reader = new FileReader();

                                                    reader.onload = function (e) {
                                                        imgElement.src = e.target.result;
                                                    };

                                                    reader.readAsDataURL(file);
                                                }
                                            }
                                        </script>

                                        <div class="col-12 col-md-6">
                                            <div class="modal-description-block">
                                                <div class="row text-right">
                                                    <div class="col-12">
                                                        <button type="button" class="btn-close btn-close-modal"
                                                                data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                </div>
                                                <div class="row desc-text-block">
                                                    <div class="col-12">
                                                        <h5><input class="form-control" type="text" name="name"
                                                                   value="{{$product->name}}">
                                                        </h5>
                                                        <br>
                                                        <span>RU</span>
                                                        <textarea class="form-control" name="description"
                                                                  rows="10">{!! $product->description !!}</textarea>
                                                        <span>UA</span>
                                                        <textarea class="form-control" name="description_ua"
                                                                  rows="10">{!! $product->description_ua !!}</textarea>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 text-center">
                                                        <input type="number" id="price" name="price"
                                                               value="{{$product->price}}" placeholder="{{$product->price}}">EUR
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Category</label>
                                                                <select class="form-control" id="exampleFormControlSelect1"
                                                                        name="category">
                                                                    @foreach($AllCategiries as $AllCategirie)
                                                                        <option
                                                                            @if($AllCategirie->pid == $product->cat_id) selected
                                                                            @endif value="{{$AllCategirie->pid}}"
                                                                            data-placeholder="{{$AllCategirie->name}}">{{$AllCategirie->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Show</label>
                                                            <input name="show" type="checkbox" @if($product->show == 1) checked
                                                                   @endif
                                                                   aria-label="Checkbox for following text input">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mb-3">
                                                        <label for="xs" class="form-label">XS</label>
                                                        <input type="checkbox" @if($product->xs == 'on') checked @endif name="xs" aria-label="Checkbox for following text input">
                                                        <label for="s" class="form-label">S</label>
                                                        <input type="checkbox" @if($product->s == 'on') checked @endif name="s" aria-label="Checkbox for following text input">
                                                        <label for="m" class="form-label">M</label>
                                                        <input type="checkbox" @if($product->m == 'on') checked @endif name="m" aria-label="Checkbox for following text input">
                                                        <label for="l" class="form-label">L</label>
                                                        <input type="checkbox" @if($product->l == 'on') checked @endif name="l" aria-label="Checkbox for following text input">
                                                        <label for="xl" class="form-label">XL</label>
                                                        <input type="checkbox" @if($product->xl == 'on') checked @endif name="xl" aria-label="Checkbox for following text input">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-12 text-center">
                                                        <button type="submit" class="btn btn-dark btn-add-to-cart"
                                                                {{--                                                        data-bs-dismiss="modal"--}}
                                                                onclick="save({{$product->id}},'modalStuff')"><span class="price-adm">SAVE<span class="price-adm">&nbsp; &nbsp;<i
                                                                        class="fa-solid fa-plus"></i></span></span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                                <div class="col-12 text-center">
                                    <form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="post">
                                        @csrf
                                        @method('POST')

                                        <button style="max-width: 50%;margin: 10px;background: red;" class="btn btn-dark btn-add-to-cart" type="submit" onclick="return confirm('Are you sure you want to delete this product?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            @endforeach
        </div>
    </div>

</div>
@include('admin.footer')
