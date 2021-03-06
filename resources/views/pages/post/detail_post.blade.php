@extends('layouts.master_layout')
@section('title')
    {{ $detailArticle->title }}
@endsection
@section('main')
    <div class="row pt-4 pb-4 detail-post">
        <div class="col-md-1"></div>
        <div class="col-xl-8 col-12 pt-3 box__detail">

            <!-- Container for the image gallery -->
            <div class="container p-0 box__detail-album pb-3">

                <div class="slider-for">
                    @php
                        $qtyImg = count($detailArticle->imagesArticle);
                    @endphp
                    <!-- Full-width images with number text -->
                    @foreach ($detailArticle->imagesArticle as $i => $img)
                        <div class="mySlides card-image ">
                            @php  $i+=1; @endphp
                            <div class="numbertext">{{ $i.'/'.$qtyImg}}</div>
                            <img src="{{ getUrlImageUpload($img->image) }}"  style="width:100%">

                            <!-- Image text -->
                            <div class="caption-container">{{ $img->description_img }}
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Next and previous buttons -->
                {{-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a> --}}


                <!-- Thumbnail images -->
                <div class="row thumb-detail-post slider-nav" style="margin: auto; justify-content: center">
                    @foreach ($detailArticle->imagesArticle as $i => $img)
                        <div class="column thumb-detail-post__item">
                            <img class="demo cursor" src="{{ getUrlImageUpload($img->image) }}"  style="width:100%" data-index="{{ ++$i }}" alt="{{ $img->description_img }}">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="b__dt-ct pt-2">
                <h1 class="b__dt-ct-title {{ $detailArticle->featured == 1 ? 'color-red' : '' }}">
                    {!! checkVip($detailArticle->vip) !!}<span>{{ $detailArticle->title.' - '.$detailArticle->phone_contact }}</span>
                </h1>
                <a class="mb-3" style="font-size: 0.9rem;"><i class="fal fa-map-marker-alt"></i>&nbsp; {{ $detailArticle->address_on_post }}</a>

                <div class="card__footer d-flex mb-3 " style="justify-content: space-between; align-items: center">
                    <p class="mb-0 "><i class="fal fa-calendar-alt"></i> {{ $detailArticle->created_at->format('d/m/Y') }}</p>
                    <p class="mb-0" style="cursor: pointer; font-size: 20px">
                        <i class="fal fa-share-alt"></i> &nbsp;
                        <i class="fal fa-heart card__heart"></i>
                    </p>
                    @if($detailArticle->status == 2)
                        <p class="alert-danger alert-status">B??i vi???t b??? t??? ch???i ph?? duy???t</p>
                    @elseif($detailArticle->status == 0)
                        <p class="alert-warning alert-status">B??i vi???t ??ang ch??? x??? l??</p>
                    @endif
                </div>
                <table class="b__dt-ct-short table" style="border: none;font-size: 0.8rem;">
                    <tbody>
                    <tr>
                        <td>M???c gi??</td>
                        <td>???????ng ??i</td>
                        <td>Di???n t??ch</td>
                        <td class="text-end {{ hidden_field($detailArticle->category->id) }}">Ph??ng</td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                {{
                                    ($detailArticle->unit == 'Gi?? / Th??ng') ?
                                        convert_number_to_words($detailArticle->price).' / Th??ng' :
                                        price_project($detailArticle->price, $detailArticle->acreage, $detailArticle->unit)['total_price']

                                }}
                            </strong>
                        </td>
                        <td><strong>{{ $detailArticle->facade ? 'M????t ti????n: '.$detailArticle->facade.' m' : '' }}</strong></td>
                        <td><strong>{{ $detailArticle->acreage }} m??</strong></td>
                        <td class="text-end {{ hidden_field($detailArticle->category->id) }}">{{ $detailArticle->bedroom ? $detailArticle->bedroom : '0' }} ph??ng ng???</td>
                    </tr>
                    <tr>
                        <td>
                            <span>
                                {{
                                    ($detailArticle->unit == 'Gi?? / Th??ng') ?
                                        '' :
                                        price_project($detailArticle->price, $detailArticle->acreage, $detailArticle->unit)['unit_price'];
                                }}
                            </span>
                        </td>
                        <td><span>{{ $detailArticle->way ? 'H???m: '.$detailArticle->way.' m' : '' }}</span></td>
                        <td></td>
                        <td class="text-end {{ hidden_field($detailArticle->category->id) }}">{{ $detailArticle->toilet ? $detailArticle->toilet : '0' }} toilet</td>
                    </tr>
                    </tbody>
                </table>
                <div class="b__dt-ct-desc">
                    <h5 style="font-weight: bold">Th??ng tin chi ti???t</h5>
                    <div class="box__dt-ct-desc-text">
                        {!! $detailArticle->content !!}
                    </div>
                </div>
                <br>
                <div class="b__dt-ct-section-body">
                    <div class="b__dt-ct-section-body-list">
                        <span class="title">Lo???i tin ????ng:</span>
                        <span class="value">{{ $detailArticle->category->name }}</span>
                    </div>
                    <div class="b__dt-ct-section-body-list">
                        <span class="title">?????a ch???:</span>
                        <span class="value">{{ $detailArticle->address_on_post }}</span>
                    </div>
                    <div class="b__dt-ct-section-body-list">
                        <span class="title">M???t ti???n:</span>
                        <span class="value">{{ $detailArticle->facade ? 'M????t ti????n: '.$detailArticle->facade.' m' : '' }}</span>
                    </div>
                    <div class="b__dt-ct-section-body-list {{ hidden_field($detailArticle->category->id) }}">
                        <span class="title">S??? t???ng:</span>
                        <span class="value">{{ $detailArticle->floor ? $detailArticle->floor.' t???ng' : '0' }}</span>
                    </div>
                    <div class="b__dt-ct-section-body-list {{ hidden_field($detailArticle->category->id) }}">
                        <span class="title">S??? ph??ng ng???:</span>
                        <span class="value">{{ $detailArticle->bedroom ? $detailArticle->bedroom.' ph??ng ng???' : '0' }}</span>
                    </div>
                    <div class="b__dt-ct-section-body-list {{ hidden_field($detailArticle->category->id) }}">
                        <span class="title">N???i th???t:</span>
                        <span class="value">{{ $detailArticle->furniture }}</span>
                    </div>
                    <div class="b__dt-ct-section-body-list">
                        <span class="title">Ph??p l??:</span>
                        <span class="value">{{ $detailArticle->legal_documents }}</span>
                    </div>
                </div>
{{--                <div class="b__dt-ct-desc mt-3">--}}
{{--                    <h5 style="font-weight: bold">B???n ?????</h5>--}}
{{--                    <div class="box__dt-ct-desc-text">--}}
{{--                        <iframe--}}
{{--                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.51782664175!2d106.69916291462252!3d10.771594992324795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f40a3b49e59%3A0xa1bd14e483a602db!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEvhu7kgdGh14bqtdCBDYW8gVGjhuq9uZw!5e0!3m2!1svi!2s!4v1642146351254!5m2!1svi!2s"--}}
{{--                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">--}}

{{--                        </iframe>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
        <div class="col-md-2 col-12 pt-3">
            <div class="b__ct">
                <div class="b__ct-info">
                    <img class="b__ct-info-avt img-fluid" style="width: 100px; height: 100px" src="{{asset(getUrlImageUpload($detailArticle->user->avatar, 'avatar'))}}" alt="">

                        <p class="b__ct-info-name pt-3 mb-1"><strong>{{ ($detailArticle->user->name) }}</strong></p>
                        <a href="{{ route('article.SameEntrant', $detailArticle->user->id) }}" class="b__ct-info-article ">Xem th??m {{ $countArticleOfUser }} tin kh??c</a>
                </div>
                <div class="b__ct-contact">
                    {{-- <button class="b__ct-contact-btn b__ct-contact-phone" title="Sao ch??p" id="phone_contact" value="0389946423">
                        {{ $detailArticle->phone_contact }}
                    </button> --}}
                    @php
                        $phone = explode(',', $detailArticle->phone_contact);
                    @endphp
                    @for ($i = 0; $i <= 1; $i++)
                        <a class="b__ct-contact-btn b__ct-contact-phone" title="Sao ch??p" id="phone_contact" href="{{ $phone[$i] }}">
                            {{ $phone[$i] }}
                        </a>
                    @endfor
                    <br>
                    <a href="mailto:nguyenthanhthuc@gmail.com" class="b__ct-contact-btn b__ct-contact-mail">G???i mail</a>
                    <br>
                    <button class="b__ct-contact-btn" data-bs-toggle="modal" data-bs-target="#contactModal">Y??u c???u li??n h???</button>
                </div>
            </div>

        </div>
        <div class="col-md-1"></div>
        <!-- Modal -->
        <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 19990;">
            <div class="modal-dialog" style="min-width: 35%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Y??u c???u li??n h???</h5>
                        <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="frm-contact">
                            <input type="hidden" name="" id="article_id" value="{{ $detailArticle->id }}">
                            <p><strong>Th??ng tin li??n h???</strong></p>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="name" maxlength="32" placeholder="H??? v?? t??n *">
                                <span class="text-danger d-none name-error">Vui l??ng nh???p t??n</span>
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control" id="phone" maxlength="12" placeholder="S??? ??i???n tho???i *">
                                <span class="text-danger d-none phone-error">Vui l??ng nh???p s??? ??i???n tho???i</span>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" id="email" maxlength="65" placeholder="Email *">
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label"><strong>N???i dung</strong></label>
                                <textarea class="form-control" id="content" rows="3">T??i c???n t?? v???n</textarea>
                            </div>
                            &nbsp;
                            <button type="button" class="btn btn-primary w-100 btn__send__contact"
                                    style="padding: 13px;">G???i y??u c???u
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        $data = [
            'phone' => $detailArticle->phone_contact
        ];
    @endphp
    @include('pages.post.component._action_menu_mobile', $data)
@endsection

