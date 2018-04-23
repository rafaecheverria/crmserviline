{!! Form::open(['method' => 'POST', 'files' => true,'id' => 'avatarForm']); !!}
<div class="file-field input-field">
    <input type="text" name="id" id="id_avatar" hidden="true">
    {!! Form::file('avatar', ['id' => 'avatarInput', 'class' => 'hidden']); !!}         
    <div class="file-path-wrapper">
        <input class="file-path validate" name="avatar" hidden="true" placeholder="Selecciona una imagen">  
    </div>
</div>
{!! Form::close() !!} 
<div class="col-md-12" align="center">
    <a href="#">
        <img alt="Thumbnail Image" class="img-rounded img-responsive avatarImage">
    </a>
    Cambiar imagen
</div>