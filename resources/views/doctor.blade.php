@extends('master')
@section('content')
<div id=doctor>
<doctor-list></doctor-list>
</div>
@stop


@section('script')
<script>
var app = new Vue({
   el: '#doctor',
   
   
});

</script>
@endsection

