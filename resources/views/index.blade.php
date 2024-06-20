
    <div class="container text-center">
        <h1 class="mb-4 mt-4">Burmese Laravel Developer</h1>
        <div class="row">
            <div class="col-4">
                @can('dashboard')
                    <a href="{{route('categoryIndex')}}" class="btn btn-sm btn-info text-white">Category</a>
                @endcan
            </div>
            <div class="col-4">
                @can('product_listing')
                    <a href="{{route('productIndex')}}" class="btn btn-sm btn-info text-white">Product</a>
                @endcan
            </div>
            <div class="col-4">
                <a href="{{route('articles.index')}}" class="btn btn-sm btn-info text-white">Article</a>
            </div>
        </div>
    </div>

