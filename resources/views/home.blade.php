@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <section>
        @include('partials._logo')
        <span class="slogan">Weboholics - Dit kreative bureau</span>
       	 <a id="downBtn" href="#gallery-container"><i class="fa fa-angle-down" aria-hidden="true"></i></a>


    </section>
    <section>
        <image-gallery></image-gallery>
    </section>

@endsection
@section('scripts')
<script>
	$('#downBtn').on('click',function(){
	    $('html, body').stop().animate({
	        scrollTop: $( $(this).attr('href') ).offset().top
	    }, 1500);
	});
</script>
@endsection