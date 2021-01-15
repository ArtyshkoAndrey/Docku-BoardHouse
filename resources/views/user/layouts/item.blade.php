<div class="card bg-transparent shadow-0 {{ $item->on_sale ? 'sale' : null }}">

  <div class="card-body mx-auto">
    <div class="row">
      <div class="col-12">
        <div class="img-wrapper">
          <div class="sale-badge">Sale</div>
          <picture>
            <source type="image/webp" srcset="{{ $item->getThumbnailWebp() }}">
            <source type="image/jpeg" srcset="{{ $item->getThumbnailJpg() }}">
            <img src="{{ $item->getThumbnailJpg() }}" class="img-fluid" alt="{{ $item->name }}">
          </picture>
          {{--      TODO: Изменить asset, когда будут таблицы --}}
        </div>
      </div>
    </div>
    <div class="row pt-3">
      <div class="col-12">
        <a class="title" href="#">{{ $item->title }} Lorem ipsum dolor sit amet.</a>
      </div>
    </div>
    <div class="row context">
      <div class="col-12 col-md-5 d-flex flex-column justify-content-center pl-2">
        @if($item->price_sale)
          <span class="old-price">{{ $cost($store.state.currency.ratio * <? echo $item->price ?>) }} @{{ $store.state.currency.symbol }}</span>
          <span class="price">{{ $cost($store.state.currency.ratio * <? echo $item->price_sale ?>) }} @{{ $store.state.currency.symbol }}</span>
        @else
          <span class="price">{{ $cost($store.state.currency.ratio * <? echo $item->price ?>) }} @{{ $store.state.currency.symbol }}</span>
        @endif
      </div>
      <div class="col-12 col-md-7 d-flex justify-content-center align-items-center p-0 px-2">
        @if($item->skuses()->count() > 0)
          <a href="{{ route('product.show', $item->id) }}" class="btn btn-outline-dark btn-to-cart">
            <i class="bx bx-cart"></i>
            <span>Выбрать</span>
          </a>
        @else
          <button class="btn btn-outline-dark btn-to-cart w-100 mt-2 mt-md-0">
            <i class="bx bx-cart"></i>
            <span>В корзину</span>
          </button>
        @endif

      </div>
    </div>
  </div>
</div>
