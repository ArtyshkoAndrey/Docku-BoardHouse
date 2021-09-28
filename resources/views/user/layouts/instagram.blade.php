<section class="instagram">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 col-md-6 d-flex flex-column">
        <span class="small">Следите за новостями</span>
        <span class="big">в нашем инстаграме -<br><a href="https://www.instagram.com/dockuboardhouse/">@dockuboardhouse</a></span>
      </div>
      <div class="col-12 col-md-5">
        <div class="row">
          @foreach($posts as $post)
            <div class="col-4 mt-3 d-flex align-items-stretch">
              <a href="{{ url($post['link']) }}" target="_blank" class="d-block">
                <img src="{{ $post['img'] }}" class="img-fluid rounded-3 h-100" alt="{{ $post['link'] }}">
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
