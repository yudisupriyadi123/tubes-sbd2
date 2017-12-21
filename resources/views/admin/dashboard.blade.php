@extends('admin.index')
@section('title',$title)
@section('content')
<div class="main-admin">
	<div class="block">
		<h3>Add Something</h3>
		<div class="content grid-block-2">
			<ul>
			    <a href="{{ url('/') }}">
			    	<li>
			    		<label class="fa fa-lg fa-edit"></label>
			    	</li>
			    </a>
			    <a href="{{ url('/') }}">
			    	<li>
			    		<label class="fa fa-lg fa-th"></label>
			    	</li>
			    </a>
			</ul>
		</div>
	</div>
	<div class="block">
		<h3>Orders</h3>
		<div class="content grid-block-2">
			<ul>
			    <a href="{{ url('/') }}">
			    	<li>
			    		<label class="fa fa-lg fa-edit"></label>
			    	</li>
			    </a>
			    <a href="{{ url('/') }}">
			    	<li>
			    		<label class="fa fa-lg fa-th"></label>
			    	</li>
			    </a>
			</ul>
		</div>
	</div>
	<div class="block">
		<h3>Costumers</h3>
		<div class="content grid-block-2">
			<ul>
			    <a href="{{ url('/') }}">
			    	<li>
			    		<label class="fa fa-lg fa-edit"></label>
			    	</li>
			    </a>
			    <a href="{{ url('/') }}">
			    	<li>
			    		<label class="fa fa-lg fa-th"></label>
			    	</li>
			    </a>
			</ul>
		</div>
	</div>
	<div class="block">
		<h3>List Products</h3>
		<div class="content grid-block-2">
			<ul>
			    <a href="{{ url('/') }}">
			    	<li>
			    		<label class="fa fa-lg fa-edit"></label>
			    	</li>
			    </a>
			    <a href="{{ url('/') }}">
			    	<li>
			    		<label class="fa fa-lg fa-th"></label>
			    	</li>
			    </a>
			</ul>
		</div>
	</div>
</div>
@endsection