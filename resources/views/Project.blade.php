@extends('master')
@section('content')
<div id=app>
<project-form></project-form>
</div>
@stop


@section('script')
<script>
var app = new Vue({
   el: '#app',
   
   
});

</script>
@endsection

