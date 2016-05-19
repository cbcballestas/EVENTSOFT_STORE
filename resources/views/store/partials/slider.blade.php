<div id="slider" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#slider" data-slide-to="0" class="active"></li>
    <li data-target="#slider" data-slide-to="1"></li>
    <li data-target="#slider" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
   <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="{{ asset('image/eventos.jpg') }}" alt="slide1">
        <div class="carousel-caption">
          <p class="text-slider">Mesas,sillas u otros Implementos para tu evento</p>
        </div>
      </div>
      <div class="item">
        <img src="{{ asset('image/dj.jpg') }}" alt="slide2">
        <div class="carousel-caption">
          <p class="text-slider">Implementos para DJ, con sus respectivos forros y protectores</p>
        </div>
      </div>
      <div class="item">
        <img src="{{ asset('image/stand.jpg') }}" alt="slide3">
        <div class="carousel-caption">
          <p class="text-slider">Todo lo relacionado con la decoración de tu STAND</p>
        </div>
      </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#slider" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><hr>