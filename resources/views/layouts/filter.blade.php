
<div class="filter ">
    <div class="container">
        <button class="filter-btn filter-btn-close" type="button" >
            <span class="close"><i class="fas fa-times" style="font-size: 1.4rem;"></i></span>
        </button>
        <form action="{{ route('article.filter') }}" method="get" id="frm-search">
            <h3 class="search__title d-none">Tìm kiếm</h3>
            <ul class="filter-nav">
                <li class="filter-item">
                    <a class="filter-link" ><span>Hình thức</span></a>
                    <select class="form-select list__option" aria-label="Default select example" name="hinh-thuc">
                        <option value="">Tất cả</option>
                        <option value="0" {{ (isset(request()->all()['hinh-thuc']) && request()->all()['hinh-thuc'] == '0') ? ' selected' : '' }}>Bán</option>
                        <option value="1" {{ (isset(request()->all()['hinh-thuc']) && request()->all()['hinh-thuc'] == '1') ? ' selected' : '' }}>Cho thuê</option>
                    </select>
                </li>
                <li class="filter-item">
                    <a class="filter-link" ><span>Danh mục</span></a>
                    <select class="form-select list__option" aria-label="Default select example" name="danh-muc">
                        <option value="">Tất cả</option>
                        @foreach ($sell as $f)
                            <option value="{{ $f->slug }}" {{ (isset(request()->all()['danh-muc']) && request()->all()['danh-muc'] == $f->slug) ? ' selected' : '' }}>{{ $f->name }}</option>
                        @endforeach
                        @foreach ($lease as $f)
                            <option value="{{ $f->slug }}" {{ (isset(request()->all()['danh-muc']) && request()->all()['danh-muc'] == $f->slug) ? ' selected' : '' }}>{{ $f->name }}</option>
                        @endforeach
                    </select>
                </li>
                <li class="filter-item">
                    <a class="filter-link" ><span>Khu vực</span></a>
                    <select class="form-select list__option" aria-label="Default select example" name="khu-vuc">
                        <option value="">Tất cả</option>
                        @foreach ($province as $p)
                        <option value="{{ $p->_code }}">{{ $p->_name }}</option>
                        @endforeach
                    </select>
                </li>
                <li class="filter-item">
                    <a class="filter-link" ><span>Mức giá</span></a>
                    <select class="form-select list__option" aria-label="Default select example" name="muc-gia">
                        <option value="">Tất cả</option>
                        <option value="Thoa-thuan">Thỏa thuận</option>
                        <option value="0 - 500 trieu" class="filter-optionnk">< 500 triệu</option>
                        <option value="500 trieu - 800 trieu" class="filter-optionnk">Từ 500 triệu đến 800 triệu</option>
                        <option value="800 trieu - 1 ty" class="filter-optionnk">Từ 800 triệu đến 1 tỷ</option>
                        <option value="1 ty - 2 ty" class="filter-optionnk">Từ 1 tỷ đến 2 tỷ</option>
                        <option value="2 ty - 3 ty" class="filter-optionnk">Từ 2 tỷ đêns 3 tỷ</option>
                        <option value="3 ty - 5 ty" class="filter-optionnk">Từ 3 tỷ đến 5 tỷ</option>
                        <option value="5 ty - 7 ty" class="filter-optionnk">Từ 5 tỷ đến 7 tỷ</option>
                        <option value="7 ty - 10 ty" class="filter-optionnk">Từ 7 tỷ đến 10 tỷ</option>
                        <option value="10 ty - 20 ty" class="filter-optionnk">Từ 10 tỷ đến 20 tỷ</option>
                        <option value="20 ty - 30 ty" class="filter-optionnk">Từ 20 tỷ đến 30 tỷ</option>
                        <option value="30 ty" class="filter-optionnk">> 30 tỷ</option>
                    </select>
                </li>
                <li class="filter-item">
                    <a class="filter-link" ><span>Diện tích</span></a>
                    <select class="form-select list__option" aria-label="Default select example" name="dien-tich">
                        <option value="">Tất cả</option>
                            <option value="30" {{ (isset(request()->all()['dien-tich']) && request()->all()['dien-tich'] == '30') ? 'selected' : '' }}>≤ 30 m²</option>
                            <option value="30-50" {{ (isset(request()->all()['dien-tich']) && request()->all()['dien-tich'] == '30-50') ? 'selected' : '' }}>30 - 50 m²</option>
                            <option value="50-80" {{ (isset(request()->all()['dien-tich']) && request()->all()['dien-tich'] == '50-80') ? 'selected' : '' }}>50 - 80 m²</option>
                            <option value="80-100" {{ (isset(request()->all()['dien-tich']) && request()->all()['dien-tich'] == '80-100') ? 'selected' : '' }}>80 - 100 m²</option>
                            <option value="100-150" {{ (isset(request()->all()['dien-tich']) && request()->all()['dien-tich'] == '100-150') ? 'selected' : '' }}>100 - 150 m²</option>
                            <option value="150-200" {{ (isset(request()->all()['dien-tich']) && request()->all()['dien-tich'] == '150-200') ? 'selected' : '' }}>150 - 200 m²</option>
                            <option value="200-250" {{ (isset(request()->all()['dien-tich']) && request()->all()['dien-tich'] == '200-250') ? 'selected' : '' }}>200 - 250 m²</option>
                            <option value="250-300" {{ (isset(request()->all()['dien-tich']) && request()->all()['dien-tich'] == '250-300') ? 'selected' : '' }}>250 - 300 m²</option>
                            <option value="300-500" {{ (isset(request()->all()['dien-tich']) && request()->all()['dien-tich'] == '300-500') ? 'selected' : '' }}>300 - 500 m²</option>
                            <option value="500" {{ (isset(request()->all()['dien-tich']) && request()->all()['dien-tich'] == '500') ? 'selected' : '' }}>> 500 m²</option>
                    </select>
                </li>
            </ul>
            <div class="filter__btns">
                <button type="reset" class="btn btn-mute"><i class="fal fa-sync btn__filter"></i></button>
                <button class="btn__filter btn__search">Tìm kiếm</button>
            </div>
        </form>
    </div>
</div>
