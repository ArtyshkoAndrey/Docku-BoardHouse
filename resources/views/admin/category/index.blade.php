@extends('admin.layouts.app')

@section('title', 'Docku - Список категорий')

@section('content')
  <div class="container-fluid mt-20 mb-20">
    <div class="row row-eq-spacing">
      <div class="col-12">
        <nav aria-label="Breadcrumb navigation example">
          <ul class="breadcrumb">
            <li class="breadcrumb-item active"><a href="#">Категории</a></li>
            <li class="breadcrumb-item"></li>
          </ul>
        </nav>
      </div>
      <div class="col-12">
        <div class="row align-items-center">
          <div class="col-auto">
            <h3>Категории</h3>
          </div>

          <div class="col-auto px-10">
            <a href="#modal-brand-add" class="btn d-block">Создать новый бренд</a>
          </div>

        </div>
      </div>

      <div class="col-12">
        <div class="row" style="margin-left: -1rem; margin-right: -1rem ;">
          @foreach($categories as $category)
            <div class="col-12 mt-10">
              <div class="card p-10 bg-dark-dm m-0">
                <div class="row align-items-center">
                  <div class="col-4 col-md-4 col-lg-auto">
                    <a href="#modal-brand-{{ $category->id }}" class="text-decoration-none text-danger m-0 p-0"><h5 class="p-0 m-0 d-block">{{ $category->name }}</h5></a>
                  </div>

                  <div class="col-md col">
                    <div class="row justify-content-center">

                      <div class="col-md-10 col-lg-auto col-4 pl-10 mt-10 mt-lg-0 mt-md-10 ml-lg-auto">
                        <a href="#modal-brand-{{ $category->id }}" class="btn bg-transparent text-success shadow-none border-0 d-block"><i class="bx bx-pencil font-size-16"></i></a>
                      </div>
                      <div class="col-md-10 col-lg-auto col-4 pl-10 mt-10 mt-lg-0 mt-md-10">
                        <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn shadow-none bg-transparent text-danger border-0 w-full d-block"><i class="bx bx-trash font-size-16"></i></button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>

    </div>
  </div>
@endsection

@section('script')
  <script>

  </script>
@endsection
