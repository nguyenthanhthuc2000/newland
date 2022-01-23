<div class="sidebar-filter">
    <h2>Lọc theo khoản giá</h2>
    <ul class="filter-list">
        <li class="filter-item">
            <a href="{{ route('article.search', ['tu' => '0', 'den' => '500 trieu']) }}" class="filter-link">< 500 triệu</a>
        </li>
        <li class="filter-item">
            <a href="{{ route('article.search', ['tu' => '500 trieu', 'den' => '800 trieu']) }}" class="filter-link">Từ 500 triệu đén 800 triệu</a>
        </li>
        <li class="filter-item">
            <a href="{{ route('article.search', ['tu' => '800 trieu', 'den' => '1 ty']) }}" class="filter-link">Từ 800 triệu đến 1 tỷ</a>
        </li>
        <li class="filter-item">
            <a href="{{ route('article.search', ['tu' => '1 ty', 'den' => '2 ty']) }}" class="filter-link">Từ 1 tỷ đến 2 tỷ</a>
        </li>
        <li class="filter-item">
            <a href="{{ route('article.search', ['tu' => '2 ty', 'den' => '3 ty']) }}" class="filter-link">Từ 2 tỷ đêns 3 tỷ</a>
        </li>
        <li class="filter-item">
            <a href="{{ route('article.search', ['tu' => '3 ty', 'den' => '5 ty']) }}" class="filter-link">Từ 3 tỷ đến 5 tỷ</a>
        </li>
        <li class="filter-item">
            <a href="{{ route('article.search', ['tu' => '5 ty', 'den' => '7 ty']) }}" class="filter-link">Từ 5 tỷ đến 7 tỷ</a>
        </li>
        <li class="filter-item">
            <a href="{{ route('article.search', ['tu' => '7 ty', 'den' => '10 ty']) }}" class="filter-link">Từ 7 tỷ đến 10 tỷ</a>
        </li>
        <li class="filter-item">
            <a href="{{ route('article.search', ['tu' => '10 ty', 'den' => '20 ty']) }}" class="filter-link">Từ 10 tỷ đến 20 tỷ</a>
        </li>
        <li class="filter-item">
            <a href="{{ route('article.search', ['tu' => '20 ty', 'den' => '30 ty']) }}" class="filter-link">Từ 20 tỷ đến 30 tỷ</a>
        </li>
        <li class="filter-item">
            <a href="{{ route('article.search', ['tu' => '30 ty']) }}" class="filter-link">> 30 tỷ</a>
        </li>
    </ul>
</div>
