@if($errors->any())
<!-- Notice -->
<div class="row">
        <div class="col-md-12">
          <div class="notification error closeable margin-bottom-30">
            @foreach($errors->all() as $error)
            <p> {{$error}}</p>
           @endforeach
            <a class="close" href="#"></a>
          </div>
        </div>
      </div>
@endif