<nav class="menu">
    <ul>        
        @foreach ($categories as $category)
            <li><a href="{{ route('frontend.category.show',['slug' => $category->slug]) }}">{{ $category->name}}</a></li>
        @endforeach
    </ul>
</nav>