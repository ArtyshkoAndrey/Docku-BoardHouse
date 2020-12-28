<div class="container item-catalog">
  <div>
    <span class="title">Новое поступление</span>
    <a href="#!"><i class="bx bx-right-arrow-alt"></i></a>
  </div>
  <div class="row">
    <div class="col-12 col-md-6 col-lg-4 col-xl-3 p-0" v-for="i in 4">
      @include('user.layouts.item')
    </div>
  </div>
</div>
