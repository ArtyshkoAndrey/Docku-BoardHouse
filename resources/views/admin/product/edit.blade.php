@extends('admin.layouts.app')

@section('title', 'Doscu - Редактирование заказа')

@section('content')

    <div class="container-fluid mt-20 mb-20">
      <div class="row row-eq-spacing">
        <div class="col-12">
          <nav aria-label="Breadcrumb navigation example">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Товары</a></li>
              <li class="breadcrumb-item active">Редактирование товара "{{ $product->title }}"</li>
            </ul>
          </nav>
        </div>
        <div class="col-12">
          <h3>Редактирование заказа</h3>
        </div>

        <div class="col-12 p-0">
          <form action="{{ route('admin.product.update', $product) }}" method="POST" class="w-full">
            @csrf
            @method('PUT')
            <div class="row row-eq-spacing p-0 m-0">
              <div class="col-lg-4 col-12">
                <div class="card bg-dark-dm">
                  <div class="form-group">
                    <label for="title" class="required">Название</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Название" value="{{ old('title', $product->title) }}" required>
                  </div>

                  <div class="form-group">
                    <label for="price" class="required">Стоимость</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₸</span>
                      </div>
                      <input type="number" min="0" class="form-control" name="price" id="price" placeholder="Стоимость" value="{{ old('price', $product->price) }}" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="price_sale" class="">Скидочная стоимость</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₸</span>
                      </div>
                      <input type="number" min="0" class="form-control" name="price_sale" id="price_sale" placeholder="Стоимость" value="{{ old('price_sale', $product->price_sale) }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="weight" class="required">Вес товара</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">кг.</span>
                      </div>
                      <input type="number" min="0" class="form-control" name="weight" id="weight" placeholder="Вес товара" value="{{ old('weight', $product->weight) }}">
                    </div>
                  </div>

                  {{-- Поиск по категории --}}
                  <category :name="'category'" :id="'category'"></category>

                  {{-- Поиск по брендам --}}
                  <brand :name="'brand'" :id="'brand'"></brand>


                </div>
              </div>

              <div class="col-12 col-lg">
                <div class="card bg-dark-dm">
                  <div class="form-group">
                    <label for="description" class="required">Описание</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description', $product->description) }}</textarea>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
@endsection

@section('script')
  <script src="https://cdn.tiny.cloud/1/z826n1n5ayf774zeqdphsta5v2rflavdm2kvy7xtmczyokv3/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    window.onload = function () {
      tinymce.init({
        selector: 'textarea#description',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
      });
    }
  </script>
@endsection
