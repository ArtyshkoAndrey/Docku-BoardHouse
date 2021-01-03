@extends('admin.layouts.app')

@section('title', 'Docku - Редактирование товара')

@section('css')

@endsection

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
        <h3>Редактирование товара</h3>
      </div>
      @if ($errors->any())
        <div class="col-12">
          <div class="card bg-dark-dm">
            <div class="invalid-feedback">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      @endif
      <div class="col-12 p-0">
        <form action="{{ route('admin.product.update', $product) }}" method="POST" class="w-full">
          @csrf
          @method('PUT')
          <div class="row row-eq-spacing p-0 m-0">

            <div class="col-12 col-lg mt-10">
              <div class="card bg-dark-dm">
                <div class="form-group">
                  <label for="title" class="required">Название</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Название" value="{{ old('title', $product->title) }}" required>
                </div>

                <div class="form-group">
                  <label for="description" class="required">Описание</label>
                  <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="form-group">
                  <label for="meta_title" class="required">Meta Title</label>
                  <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Title" value="{{ old('meta_title', $product->meta->title) }}" required>
                </div>

                <div class="form-group">
                  <label for="meta_description" class="required">Meta Описание</label>
                  <input type="text" class="form-control" name="meta_description" id="meta_description" placeholder="Meta Описание" value="{{ old('meta_description', $product->meta->description) }}" required>
                </div>

                <div class="custom-switch d-inline-block mr-10">
                  <input type="hidden" name="on_sale" value="0"><!-- d-inline-block = display: inline-block, mr-10 = margin-right: 1rem (10px) -->
                  <input type="checkbox" name="on_sale" id="switch-1" value="1" {{ old('on_sale', $product->on_sale) ? 'checked' : null }}>
                  <label for="switch-1" class="text-danger">Скидка</label>
                </div>
                <div class="custom-switch d-inline-block mr-10">
                  <input type="hidden" name="on_new" value="0">
                  <input type="checkbox" name="on_new" id="switch-2" value="1" {{ old('on_new', $product->on_new) ? 'checked' : null }}>
                  <label for="switch-2" >Новый товар</label>
                </div>
                <div class="custom-switch d-inline-block mr-10">
                  <input type="hidden" name="on_top" value="0"><!-- d-inline-block = display: inline-block, mr-10 = margin-right: 1rem (10px) -->
                  <input type="checkbox" name="on_top" id="switch-3" value="1" {{ old('on_top', $product->on_top) ? 'checked' : null }}>
                  <label for="switch-3">На главной</label>
                </div>

              </div>
            </div>

            <div class="col-lg-4 col-12 mt-10">
              <div class="card bg-dark-dm">
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
                    <input type="number" min="0" step="0.01" class="form-control" name="weight" id="weight" placeholder="Вес товара" value="{{ old('weight', $product->weight) }}">
                  </div>
                </div>

                {{-- Поиск по категории --}}
                <category :name="'category'" :id="'category'" :category_props="{{ json_encode($product->category) ?? null }}"></category>

                {{-- Поиск по брендам --}}
                <brand :name="'brand'" :id="'brand'" :brand_props="{{ json_encode($product->brand) ?? null }}"></brand>


              </div>
            </div>

            <div class="col-12 mt-20">
              <div class="card bg-dark-dm">
                <div id="upload-widget" class="dropzone"></div>
              </div>
            </div>

            <div class="col-12 mt-10 text-right">
              <button class="btn bg-success">Сохранить</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="https://cdn.tiny.cloud/1/z826n1n5ayf774zeqdphsta5v2rflavdm2kvy7xtmczyokv3/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
  <script>
      tinymce.init({
        selector: 'textarea#description',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
      });

    Dropzone.autoDiscover = false;
    let i =0;
    let fileList = [];

    const uploader = new Dropzone('#upload-widget', {
      init: function() {
        // Hack: Add the dropzone class to the element
        $(this.element).addClass("dropzone");
        this.on("success", function (file, serverFileName) {
          fileList[i] = {"serverFileName": serverFileName, "fileName": file.name, "fileId": i};
          i++;
        });
        this.on("removedfile", function(file) {
          let rmvFile = "";
          for(let f=0;f<fileList.length;f++){
            if(fileList[f].fileName === file.name)
            {
              rmvFile = fileList[f].serverFileName;
            }
          }
          if (rmvFile){
            console.log(rmvFile)
            axios.post("{{ route('admin.product.photo.delete') }}", {
              name: rmvFile
            })
            .then(response => {
              console.log(response)
            })
            .catch(response => {
              alert(response.data.status)
            })
          }
        });
      },
      paramName: 'file',
      dictDefaultMessage: 'Переместите фотографии или кликните на поле',
      headers: {
        'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value,
      },
      acceptedFiles: 'image/*',
      url: "{{ route('admin.product.photo', $product->id) }}",
      renameFile: function (file) {
        return new Date().getTime() + '_' + file.name;
      },
      addRemoveLinks: true,
      dictRemoveFile: 'Удалить файл'
    });

    $(document).ready(function() {
      <?php $i = 0;?>
      let mockFile
      @foreach($product->photos as $photo)
      mockFile = { name: '{{ $photo->name . '.png' }}', size: {{ File::size(public_path('storage/images/photos/' . $photo->name . '.png')) }} };
      uploader.emit("addedfile", mockFile);
      uploader.emit("thumbnail", mockFile, '{{ $photo->getThumbnailUrlPng() }}');
      uploader.emit("complete", mockFile);
      uploader.files.push(mockFile)
      fileList.push({"serverFileName": '{{ $photo->name . '.png' }}', "fileName":'{{ $photo->name . '.png' }}', "fileId": {{ $i }}});
      <?php $i++?>
      @endforeach
    });
  </script>
@endsection
