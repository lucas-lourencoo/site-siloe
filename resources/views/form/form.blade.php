<!-- Register Form -->
{!! Form::open(['route'=> 'user.register','method' => 'post', 'class' => 'form-padrao']) !!}

{!! Form::label('name', 'Nome:') !!}
{!! Form::email('email', null, ['placeholder = "Digite seu nome..."']) !!}

{!! Form::label('email', 'Email:') !!}
{!! Form::email('email', null, ['placeholder = "Digite seu email..."']) !!}

{!! Form::label('data', 'Data de nasc.') !!}
{!! Form::date('data', \Carbon\Carbon::now()) !!}

{!! Form::submit('Cadastrar', ['id = "register"']) !!}
{!! Form::close() !!}