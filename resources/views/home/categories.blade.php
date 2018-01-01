<div class="home-content main-width">
    <div class="home-panel">
        <div class="panel-title">
            CATEGORIES
        </div>
    </div>
    <div class="home-categories grid-7 scroll-left">
        @foreach ($category as $ctr)
        <a href="{{ url('/category?idctr='.$ctr->id.'&name='.$ctr->name) }}">
            <div class="frame-ctr">
                {{ $ctr->name }}
            </div>
        </a>
        @endforeach
    </div>
</div>
