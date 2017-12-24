<div class="menu-main-ctr">
	<div class="ctr-head">All Tags</div>
	<ol>
		@for ($i=1; $i <= 10; $i++)
	    <a href="{{ url('/tags/ctr'.$i) }}">
	    	<li>
	    		<label class="icn fa fa-lg fa-tag"></label>
	    		<label class="ttl">Tags {{ $i }}</label>
	    	</li>
	    </a>
	    @endfor
	</ol>
</div>