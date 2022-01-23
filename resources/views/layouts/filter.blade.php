
<div class="filter ">
    <div class="container">
        <button class="filter-btn filter-btn-close" type="button" >
            <span class="close"><i class="fas fa-times" style="font-size: 1.4rem;"></i></span>
        </button>
        <form action="" id="frm-search">
            <h3 class="search__title d-none">Tìm kiếm</h3>
            <ul class="filter-nav">
                <li class="filter-item">
                    <a class="filter-link" ><span>Hình thức</span></a>
                    <select class="form-select list__option" aria-label="Default select example">
                        <option selected>Tất cả</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </li>
                <li class="filter-item">
                    <a class="filter-link" ><span>Danh mục</span></a>
                    <select class="form-select list__option" aria-label="Default select example">
                        <option selected>Tất cả</option>
                        @foreach ($sell as $f)
                            <option value="{{ $f->id }}">{{ $f->name }}</option>
                        @endforeach
                        @foreach ($lease as $f)
                            <option value="{{ $f->id }}">{{ $f->name }}</option>
                        @endforeach
                    </select>
                </li>
                <li class="filter-item">
                    <a class="filter-link" ><span>Khu vực</span></a>
                    <select class="form-select list__option" aria-label="Default select example">
                        <option selected>Tất cả</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </li>
                <li class="filter-item">
                    <a class="filter-link" ><span>Mức giá</span></a>
                    <select class="form-select list__option" aria-label="Default select example">
                        <option selected>Tất cả</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </li>
                <li class="filter-item">
                    <a class="filter-link" ><span>Diện tích</span></a>
                    <select class="form-select list__option" aria-label="Default select example">
                        <option selected>Tất cả</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </li>
            </ul>
            <div class="filter__btns">
                <i class="fal fa-sync btn__filter"></i>
                <button class="btn__filter btn__search">Tìm kiếm</button>
            </div>
        </form>
    </div>
</div>
