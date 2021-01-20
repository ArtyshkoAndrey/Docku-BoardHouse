@extends('user.layouts.app')


@section('content')
  <div class="container item-page">
    <div class="row">
      <div class="col-12 col-md-7 slider">
        <div class="row" style="overflow: hidden;">
          <div class="col-12">
            <div class="row">
              <div class="col-3 d-flex justify-content-center">
                <button id="prev" class="slider-button"><i class="far fa-chevron-up"></i></button>
              </div>
            </div>
          </div>
          <div class="col-3 slider-nav">
            <div class="scroll-wrapper">

              @foreach($product->photos as $photo)

                <div class="item">
                  <div class="img-wrapper" data-image-id="{{ $photo->id }}">
                    <picture>
                      <source type="image/webp" srcset="{{ $photo->getThumbnailUrlWebp() }}">
                      <source type="image/jpeg" srcset="{{ $photo->getThumbnailUrlJpg() }}">
                      <img class="w-100" src="{{ $photo->getThumbnailUrlJpg() }}" alt="{{ $photo->name }}">
                    </picture>

                  </div>
                </div>

              @endforeach

            </div>
          </div>
          <div class="col-9 slider-for">

            @foreach($product->photos->reverse() as $photo)
              <div class="img-wrapper" data-id="{{ $photo->id }}">
                <picture>
                  <source type="image/webp" srcset="{{  $photo->url_webp }}">
                  <source type="image/jpeg" srcset="{{  $photo->url_jpg }}">
                  <img class="w-100" src="{{ $photo->url_jpg }}" alt="{{ $photo->name }}">
                </picture>
              </div>
            @endforeach

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
      <div class="col-12 col-md-5">
        <div class="row flex-column">
          <div class="col-12">

            @foreach($categories as $category)
              {{ $category->name }} /
            @endforeach
            {{ $product->title }}

          </div>
          <div class="col-12 title-wrapper">{{ $product->title }}</div>
          <div class="col-12 prices-wrapper"></div>
          <div class="col-12 sizes-wrapper"></div>
          <div class="col-12"></div>
          <div class="col-12 description-wrapper"></div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
<script>
  // $(window).on('resize ready', function() {
  //   console.log(1)
  //   $('.slider-nav').height($('.slider-for .img-wrapper').height());
  // });
  let itemAmount = 4
{{--  {{ count($product->photos) }} - кол-во фотографий--}}

  function initSliderSize() {
    let previewImageHeight = $('.slider-for .img-wrapper').height()
    $('.slider-nav').height(previewImageHeight)
    let itemMarginTop = parseInt($('.slider-nav .item .img-wrapper').css('marginTop'))
    let itemMarginBottom = parseInt($('.slider-nav .item .img-wrapper').css('marginBottom'))


    let itemHeight = previewImageHeight / itemAmount - itemMarginBottom + itemMarginBottom / 4
    for (let item of $('.slider-nav .item .img-wrapper')) {
      $(item).css('height', itemHeight)
      $(item).css('width', itemHeight)
    }

    return itemHeight
  }

  $(window).resize(function() {
    let itemHeight = initSliderSize()
  })

  $(window).ready(function() {
    let itemHeight = initSliderSize()

    let currentPosition = 0
    let scrollStep = itemHeight + parseInt($('.slider-nav .item .img-wrapper').css('marginBottom'))

    $('.slider-button#prev').click(function() {
      if (currentPosition > 0) {
        currentPosition -= scrollStep
        $('.slider-nav .scroll-wrapper').css('top', '-' + currentPosition + 'px')
      }
    })

    $('.slider-button#next').click(function() {
      if (currentPosition < itemAmount * itemHeight) {
        currentPosition += scrollStep
        $('.slider-nav .scroll-wrapper').css('top', '-' + currentPosition + 'px')
      }
    })

    $('.img-wrapper').click(function() {
      alert('change image');
    })
  })

  // console.log(1);
  // $('.slider-for').slick({
  //   slidesToShow: 1,
  //   slidesToScroll: 1,
  //   arrows: false,
  //   fade: true,
  //   asNavFor: '.slider-nav'
  // });
  // $('.slider-nav').slick({
  //   slidesToShow: 4,
  //   slidesToScroll: 1,
  //   vertical: true,
  //   asNavFor: '.slider-for',
  //   draggable: false,
  //   swipe: false,
  //   focusOnSelect: true,
  //   responsive: true,
  // });
</script>
@endsection
