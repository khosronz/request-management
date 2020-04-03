
{!! Form::model($card, ['route' => ['cards.update', $card->id], 'method' => 'patch']) !!}

@include('cards.fields')

{!! Form::close() !!}