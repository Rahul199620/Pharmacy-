@extends('master')
@section('content')
<div id=patient>
<patient-list></patient-list>
</div>
@stop
@section('script')
<script>
var app = new Vue({
   el: '#patient',      
});
</script>
@endsection


