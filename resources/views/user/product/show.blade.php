@extends('user.layouts.app')

@section('title', 'DOCKU | ' . $product->title)

@section('content')
  <div class="container item-page">
    <div class="row">
      <div class="col-12 col-md-7">
        <div class="row">
          <div class="col-3 d-flex justify-content-center">
            <button id="prev" class="slider-button"><i class="far fa-chevron-up"></i></button>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-7 slider">
        <div class="row" style="overflow: hidden;">
          <div class="col-3 slider-nav">
            <div class="scroll-wrapper">

              @foreach($product->photos as $photo)

                <div class="item">
                  <div class="img-wrapper" data-image-id="{{ $photo->id }}">
                    <picture>
                      <source type="image/webp" srcset="{{ $photo->thumbnail_url_webp }}">
                      <source type="image/jpeg" srcset="{{ $photo->thumbnail_url_jpg }}">
                      <img class="w-100" src="{{ $photo->thumbnail_url_jpg }}" alt="{{ $photo->name }}">
                    </picture>

                  </div>
                </div>

              @endforeach

            </div>
          </div>
          <div class="col-9 slider-for">

            @foreach($product->photos as $index => $photo)
              <div class="img-wrapper {{ $index === 0 ? 'active' : null }}" data-id="{{ $photo->id }}">
                <picture>
                  <source type="image/webp" srcset="{{  $photo->url_webp }}">
                  <source type="image/jpeg" srcset="{{  $photo->url_jpg }}">
                  <img class="w-100 img-product" src="{{ $photo->url_jpg }}" alt="{{ $photo->name }}">
                </picture>
              </div>
            @endforeach
            <button class="expand-button" onclick="alert(1)">
              <i class="bx bx-expand"></i>
            </button>

          </div>
          <div class="col-12">
            <div class="row">
              <div class="col-3 d-flex justify-content-center">
                <button id="next" class="slider-button"><i class="far fa-chevron-down"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-5 pl-3 pl-md-4">
        <div class="row flex-column">
          <div class="col-12 breadcrumb">

            @foreach($categories as $category)
              {{ $category->name }} /
            @endforeach
            {{ $product->title }}

          </div>
          <div class="col-12 title-wrapper mb-2">{{ $product->title }}</div>
          <div class="col-12 prices-wrapper sale mb-2">
            @if($product->on_sale)
              <span class="old-price">{{ $cost($store.state.currency.ratio * <? echo $product->price ?>) }} @{{ $store.state.currency.symbol }}</span>
            @endif
            <span class="price">{{ $cost($store.state.currency.ratio * <? echo $product->on_sale ? $product->price_sale : $product->price?>) }} @{{ $store.state.currency.symbol }}</span>
          </div>
          <div class="col-12 sizes-wrapper mb-2">
            <div class="row">
              <div class="col-auto mr-auto font-weight-bold" style="color: #2D3134;">Выберите размер</div>
              <div class="col-auto">
                <a href="#!">Как выбрать нужный размер</a>
              </div>
              <div class="col-12 mt-2 size-table">
               <div class="row">
                 @foreach($product->skuses as $skus)
                   <div class="col-auto">
                     <div class="size-box p-2 {{ $skus->pivot->stock === 0 ? 'disabled' : null }}"
                          :class="selectSkus === {{$skus->pivot->id}} ? 'selected' : null"
                          @click="selectSkus = {{$skus->pivot->stock ? $skus->pivot->id : 'null'}}">
                       {{ $skus->title }}
                     </div>
                   </div>
                 @endforeach
               </div>
              </div>
            </div>
          </div>
          <div class="col-12 mb-5">
            <button class="btn btn-dark btn-to-cart mt-2 mt-md-0"
                    :disabled="selectSkus === null"
                    @click="$store.commit('addItem', {id: selectSkus, amount: 1})">
              <span>Добавить в корзину</span>
              <i class="bx bx-cart-alt"></i>
            </button>
          </div>
          <div class="col-12 description-wrapper">
            <div class="row">
              <div class="col-12 title">Описание</div>
              <div class="col-12 description">
                {!! $product->description !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="mb-5">
      @if(isset($category))
        @include('user.layouts.category-preview',
        ['title' => 'Может быть интересно',
          'link' => route('product.all', ['category' => $category->id]),
          'products' => $category->products()->take(4)->get()
        ])
        @endif
    </div>
  </div>
@endsection

@section('js')
  <script src="https://unpkg.com/zooming"></script>
<script>
  let showItemAmount = 4
  let currentPosition = 0
  let currentItem = 0
  let scrollStep = 0
  let itemAmount = {{ count($product->photos) }};
  let itemHeight = 0

  function initSliderSize() {
    let previewImageHeight = $('.slider-for .img-wrapper').height()
    $('.slider-nav').height(previewImageHeight)
    let itemMarginBottom = parseInt($('.slider-nav .item .img-wrapper').css('marginBottom'))

    itemHeight = previewImageHeight / showItemAmount - itemMarginBottom + itemMarginBottom / 4
    for (let item of $('.slider-nav .item .img-wrapper')) {
      $(item).css('height', itemHeight)
      $(item).css('width', itemHeight)
    }

    return itemHeight
  }

  $(window).resize(function() {
    itemHeight = initSliderSize()
    scrollStep = itemHeight + parseInt($('.slider-nav .item .img-wrapper').css('marginBottom'))
    currentPosition = currentItem * scrollStep
    $('.slider-nav .scroll-wrapper').css('top', '-' + currentPosition + 'px')
  })

  $(window).ready(function() {
    itemHeight = initSliderSize()

    currentPosition = 0
    scrollStep = itemHeight + parseInt($('.slider-nav .item .img-wrapper').css('marginBottom'))
    $('.slider-nav .scroll-wrapper').css('top', '-' + currentPosition + 'px')
  })

  $('.slider-button#prev').click(function() {
    if (currentPosition > 0) {
      currentItem--
      currentPosition -= scrollStep
      $('.slider-nav .scroll-wrapper').css('top', '-' + currentPosition + 'px')
    }
  })

  $('.slider-button#next').click(function() {
    if (currentPosition < (itemAmount - 2) * itemHeight) {
      currentItem++
      currentPosition += scrollStep
      $('.slider-nav .scroll-wrapper').css('top', '-' + currentPosition + 'px')
    }
  })

  $('.slider-nav .img-wrapper').click(function() {
    let imageID = $(this).attr('data-image-id')
    console.log($('.slider-for .img-wrapper[data-id=' + imageID + ']'))
    $('.slider-for .img-wrapper.active').removeClass('active')
    $('.slider-for .img-wrapper[data-id=' + imageID + ']').addClass('active')
  })

  new Zooming({
    onBeforeOpen: () => {
      $('body').css('overflow','hidden')
    },
    onBeforeClose: () => {
      $('body').css('overflow','auto')
    },
    scaleBase: 1.5,
    scaleExtra: 2,
    scrollThreshold: 99999
  }).listen('.img-product')


</script>
@endsection
