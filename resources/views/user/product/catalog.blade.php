@extends('user.layouts.app')


@section('content')
  <div class="container" id="catalog">
    <div>
      <span class="title">Каталог товаров</span>
      <span class="badge">1000</span>
    </div>

    <div class="row">
      <form action="{{ route('product.all') }}" class="" method="get" id="product-all">

        <div class="col-auto dropdown">
          <a href="#" class="text-dark dropdown-toggle border-hover text-decoration-none" role="button" id="dropdownCategoryLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>Категория товаров</span>
          </a>
          <div class="dropdown-menu dropdown-shadow rounded-0 border-0 py-3 px-4 overflow-auto" aria-labelledby="dropdownCategoryLink">
            @foreach(\App\Models\Category::all() as $category)
              <div class="checkbox">
                <div class="row">
                  <div class="col-auto pr-0">
                    <input type="checkbox" class="form-check-input" id="category-{{$category->id}}" name="category[]" value="{{ $category->id }}" {{ in_array($category->id, $filter['category']) ? 'checked' : null }}>
                  </div>
                  <div class="col m-0">
                    <label class="form-check-label" for="category-{{$category->id}}">{{ $category->name }} <span class="text-muted pl-1">1000</span> </label>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>

        <div class="col-auto mr-auto">
          <button class="btn btn-primary">Применить</button>
        </div>

        <div class="col-auto dropdown ml-auto">
          <a href="#" class="text-dark dropdown-toggle text-decoration-none" role="button" id="dropdownOrderLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @if($filter['order'] === 'sort-old')
              <i class="fas fa-sort-amount-down"></i> С начало старые
            @elseif($filter['order'] === 'sort-new')
              <i class="fas fa-sort-amount-up"></i> Сначало новые
            @elseif($filter['order'] === 'sort-expensive')
              <i class="fas fa-sort-amount-up"></i> С начало дорогие
            @elseif($filter['order'] === 'sort-cheap')
              <i class="fas fa-sort-amount-down"></i> С начало дешёвые
            @endif
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-shadow rounded-0 border-0 py-3 px-4" aria-labelledby="dropdownOrderLink">
            <a href="#" role="button" onclick="orderSort('sort-old')" class="dropdown-item bg-transparent {{ $filter['order'] === 'sort-old' ? 'active' : '' }}"><i class="fas fa-sort-amount-down"></i> С начало старые</a>
            <a href="#" role="button" onclick="orderSort('sort-new')" class="dropdown-item bg-transparent {{ $filter['order'] === 'sort-new' ? 'active' : '' }}"><i class="fas fa-sort-amount-up"></i> С начало новые</a>
            <a href="#" role="button" onclick="orderSort('sort-expensive')" class="dropdown-item bg-transparent {{ $filter['order'] === 'sort-expensive' ? 'active' : '' }}"><i class="fas fa-sort-amount-up"></i> С начало дорогие</a>
            <a href="#" role="button" onclick="orderSort('sort-cheap')" class="dropdown-item bg-transparent {{ $filter['order'] === 'sort-cheap' ? 'active' : '' }}"><i class="fas fa-sort-amount-down"></i> С начало дешёвые</a>
          </div>
        </div>
      </form>
    </div>
    <hr>
    <div class="row ml-1">
      @foreach($filter['category'] as $value)
        <div class="col-auto px-2 py-1 m-1 filter-badge">
          <span class="font-weight-light">{{ \App\Models\Category::find($value)->name }}</span>
          <button class="btn bg-transparent h5 shadow-0 border-none p-0" onclick="uncheckProps($('#category-{{$value}}'))"><i class="bx bx-x"></i></button>
        </div>
      @endforeach
        <div class="col-auto px-2 py-1 m-1 clear-filters">
          <a href="#!">Очистить всё</a>
        </div>
    </div>
    <hr>
  </div>


  <div class="container">
    <div class="row">
      @foreach($items as $item)
        <div class="col-6 col-lg-4 col-xl-3 p-0">
          @include('user.layouts.item', array('item'=>$item))
        </div>
      @endforeach
    </div>
    <div class="row mt-4">
      <div class="col-auto">
        {{ $items->onEachSide(1)->appends($filter)->links('vendor.pagination.bootstrap-4') }}
      </div>
    </div>
  </div>

@endsection

@section('js')
  <script>
    window.onload = function() {
      $("#catalog .dropdown-menu").on('click', function (event) {
        event.stopPropagation();
      });
    }

    function uncheckProps(el) {
      el.prop('checked', false)
      $('#product-all').submit()
    }

    function orderSort(type) {
      $('#order').val(type)
      $('#product-all').submit()
    }
  </script>
@endsection
