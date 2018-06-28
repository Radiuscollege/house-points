@extends('base')

@section('content')
<vue-main :user="{{json_encode($user)}}"></vue-main>
@endsection