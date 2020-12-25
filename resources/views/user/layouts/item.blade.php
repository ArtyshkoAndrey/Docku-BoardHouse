<div class="card bg-transparent shadow-0 sale">

  <div class="card-body mx-auto">
    <div class="row">
      <div class="col-12">
        <div class="img-wrapper">
          <div class="sale-badge">Sale</div>
          <img src="{{ asset('images/item-preview.png') }}" class="img-fluid">
          {{--      TODO: Изменить asset, когда будут таблицы --}}
        </div>
      </div>
    </div>
    <div class="row pt-3">
      <div class="col-12">
        <a class="title" href="#">Burton Custom x</a>
      </div>
    </div>
    <div class="row context">
      <div class="col-5 d-flex flex-column justify-content-center pl-1 pr-0">
        <span class="old-price">340 000 ₸</span>{{--  TODO: обычная цена--}}
        <span class="price">200 000 ₸</span>{{--  TODO: цена со скидкой--}}
      </div>
      <div class="col-7 d-flex justify-content-center align-items-center p-0">
        <button class="btn btn-outline-dark btn-to-cart">
          <i class="bx bx-cart"></i>
          <span>В корзину</span>
        </button>
{{--        <a href="#!" class="btn btn-outline-dark btn-to-cart">--}}
{{--          <i class="bx bx-cart"></i>--}}
{{--          <span>Выбрать</span>--}}
{{--        </a>--}}
      </div>
    </div>
  </div>
</div>
