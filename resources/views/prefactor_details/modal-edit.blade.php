
{!! Form::model($prefactorDetail, ['route' => ['prefactorDetails.update', $prefactorDetail->id], 'method' => 'patch']) !!}

@include('prefactor_details.fields')

{!! Form::close() !!}