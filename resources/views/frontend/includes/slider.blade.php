<div id="iview">
  @if(isset($sliders))
    @foreach($sliders as $slider)
    <div data-iview:thumbnail="{{$slider->miniatura}}" data-iview:image="{{$slider->imagen}}" data-iview:transition="block-drop-random" >
      <div class="container">
        <div class="iview-caption  bg-no-caption" data-x="220" data-y="240" data-transition="expandLeft">
          <div class="custom-caption">
            <h3>{!!$slider->titulo!!}</h3><br>
              <h4>{!!$slider->subtitulo!!}</h4>
            <p>{!!$slider->resumen!!}</p>
            @if($slider->url)
            <div class="text-right"> <a href="{{$slider->url}}"  class="btn btn-primary btn-lg">Leer Más</a> 
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
@endif
</div>