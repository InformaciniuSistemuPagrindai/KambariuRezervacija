@extends('KambariuRezervacija.Layout.main')

@section('title','|Kambario redagavimas')

@section('width') <div class="col-md-12"> @endsection


@section('content')

  <div class="col-md-12 alert alert-info text-center" role="alert">
    <strong>Kambario redagavimas:</strong> Pakeiskite norimą informacija.
  </div>

  <div class="col-md-6 well">


      <h1>Redaguoti kambario informaciją</h1>
      <hr>
      {!! Form::model($data['room'], ['route' => ['rooms.update', $data['room'] -> id], 'method'=>'PUT']) !!}
        {{ Form::label('number','Kambario numeris:') }}
        {{ Form::number('number',null, ["class" => 'form-control', 'required' => '','min' => '0','minlength' => '2', 'maxlength' => '3' ]) }}
        
        <div class="form-group">
            <label for="">Kambario tipas</label>
            {{ Form::select('room_type_fk', $data['cat'],null,array('class'=>'form-control','style'=>'width: 25%;')) }}

        </div>

        {{ Form::label('price','Kaina:') }}
        {{ Form::number('price',null, array('class' => 'form-control', 'required' => '','min' => '0','minlength' => '3', 'maxlength' => '4')) }}


      
        {{ Form::label('body','Aprašymas:') }}
        {{ Form::textarea('body',null, array('class' => 'form-control', 'required' => '','minlength' => '10', 'maxlength' => '255')) }}
        <br>
        <div class="col-sm-6">
         {!! Html::linkRoute('rooms.show', 'Atšaukti', array($data['room']->id), array('class' => 'btn btn-danger btn-block')) !!}
          </div>
          <div class="col-sm-6">
            
            {{  Form::submit('Pakeisti', array('class' => 'btn btn-success btn-block')) }}
          </div>

      {!! Form::close() !!}

  </div>
    <div class="col-md-6  well">
    <h1>Kambario nuotrauka</h1>
    <hr>
    <img src="/Style/Images/avatar2.jpg" width="250" height="250" alt="Avatar" id="avatar_show" class="img-thumbnail" />
    <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
    <br>
      <input style="margin-top: 20px; !important" type="file" id="avatar" name="avatar">
      @if ($errors->has('avatar'))
          <span class="help-block">
              <strong>{{ $errors->first('avatar') }}</strong>
          </span>
      @endif
      
      <br><button id="remove_button" type="button" class="hidden btn btn-danger btn-lg" style="width:250px;"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Pašalinti</button>
    </div>
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