@extends('KambariuRezervacija.Layout.main')

@section('title','|Pridėti kambarį')

@section('width') <div class="col-md-12"> @endsection


@section('content')

  <div class="col-md-12 alert alert-info text-center" role="alert">
    <strong>Naujo kambario kūrimas:</strong> Pridėkite norimą informacija.
  </div>


<div class="col-md-12 well">
  <div class="col-md-6 well">
      <h1>Pridėti naują kambarį</h1>
      <hr>

      {!! Form::open(array('route' => 'rooms.store', 'data-parsley-validate' =>'', 'files' => true)) !!}
        {{ Form::label('number','Kambario numeris:') }}
        {{ Form::number('number',0, array('class' => 'form-control', 'required' => '')) }}

        {{ Form::label('price','Kaina:') }}
        {{ Form::number('price','0', array('class' => 'form-control', 'required' => '','min' => '0')) }}

        {{ Form::label('data','Kambario tipas:') }}
        <select class="form-control" name="room_type_fk">
        @foreach($data as $type)
        @if($type->name == old('data'))
              <option selected>{{ $type->name }}</option>
            @else
              <option>{{ $type->name }}</option>
            @endif
        @endforeach
          </select>
          @if ($errors->has('data'))
              <span class="help-block">
                  <strong>{{ $errors->first('data') }}</strong>
              </span>
          @endif
      

        {{ Form::label('body','Aprašymas:') }}
        {{ Form::textarea('body',null, array('class' => 'form-control', 'required' => '','minlength' => '10', 'maxlength' => '255')) }}
  </div>
  <div class="col-md-6 well ">
    <h1>Kambario nuotrauka</h1>
    <hr>
     {{Form::label('room_image','Įkelti nuotrauką')}}
         {{Form::file('room_image')}}

        <img src="/Style/Images/avatar2.jpg" width="440" height="450" alt="Avatar" id="avatar_show" class="img-thumbnail " style="margin-top: 20px;" />
    
    
      <br><button id="remove_button" type="button" class="hidden btn btn-danger btn-lg" style="width:250px;"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Pašalinti</button>
    </div>
</div>

        {{ Form::submit('Pridėti', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
      



      {!! Form::close() !!}


  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  </div>
  
@endsection
@section('scripts')
  <script src="/Style/Js/Image_upload.js"></script>
@endsection
