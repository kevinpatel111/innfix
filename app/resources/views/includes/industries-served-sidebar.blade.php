<div class="widget" id="nav_menu-2">
    <h3 class="short_title  mr-b-12">Industries Served ?</h3>
    <div class="menu-features-container">
    	<ul class="menu" id="menu-features">
        @foreach($categories as $category)
            <li><a class="{{ (url()->current() == route('products.public', ['slug' => $category->slug ]) ? 'active' : '') }}" href="{{ route('products.public', ['slug' => $category->slug ]) }}">{{ $category->name }}</a></li>
        @endforeach
        </ul>
    </div>
</div>