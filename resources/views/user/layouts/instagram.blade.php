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
            <div class="col-4 mt-3">
              <a href="{{ url($post['link']) }}"
                 target="_blank"
                 data-toggle="tooltip"
                 data-placement="top"
                 title="{{ mb_strimwidth($post['caption'], 0, 40, "...") }}"
                 class="d-block instagram-posts">
                <img src="{{ $post['img'] }}" class="w-100 object-fit-cover rounded-3" alt="{{ $post['link'] }}">
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
