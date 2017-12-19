<div class="frame-popup" id="ctr">
	<div class="main-popup ctr">
		<div class="main-ctr">
			<ul>
				@for ($i=1; $i < 30; $i++)
			    <a href="{{ url('category'.$i) }}">
			    	<li><label class="fa fa-lg fa-caret-right"></label> Category {{ $i }}</li>
			    </a>
			    @endfor
			</ul>
		</div>
	</div>
</div>