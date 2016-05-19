@extends('store.template.template')
@section('content')
@include('store.partials.slider')
   <center>
   		<h1 style="color: #fff"><span class="label label-primary">CONTACTOS</span></h1><hr>
	<ul class="contactos">
	    <table class="page" style="border: solid #000">
	    <div class="container text-center">
	    	<tr>
	    		<td>
	    		<li><i class="fa fa-facebook-official" aria-hidden="true"></i>
        		&nbsp;facebook.com/EVENTSOFT</li>
               </td></tr>
               <tr>
	    		<td>
	    		<li title="Teléfono celular y Whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i>
        		&nbsp;(+57) 313-567-0293</li>
               </td></tr>
               <tr>
	    		<td>
	    		<li><i class="fa fa-twitter-square" aria-hidden="true"></i>
        		@eventsoft</li><br>
               </td></tr>
               <tr>
	    		<td>
	    		<li><i class="fa fa-youtube-square" aria-hidden="true"></i>
        		&nbsp;youtube.com/EVENTSOFT</li>
                </td></tr>
                <tr>
	    		<td>
	    		<li title="Dirección"><i class="fa fa-location-arrow" aria-hidden="true"></i>
        		&nbsp;Barrio Manga, CR 23#25-6, Cartagena,Colombia</li>
                </td>
	    	</tr>
	    	</div>
	    </table>
	</ul>
	<p>
	<a href="{{ route('home')}}" class="btn btn-primary" style="font-size: 20px">
		<i class="fa fa-chevron-circle-left"></i>&nbsp;Página principal
	</a>
	</p>
	</center>
@endsection