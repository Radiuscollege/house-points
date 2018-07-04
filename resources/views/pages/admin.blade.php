@extends('base')

@section('content')
<vue-admin :users="{{json_encode($users)}}" :user="{{json_encode($user)}}" :badges="{{json_encode($badges)}}"></vue-admin>
@endsection