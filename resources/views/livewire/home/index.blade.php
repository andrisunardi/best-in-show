@section('title', trans('index.home'))
@section('icon', 'fas fa-home')

<main>
    <section id="homeIntro">
        <div class="container">
            <div class="text-center">
                <h1 class="page-heading-1 text-secondaryRed">
                    Percayakan Kehidupan Hewan Anda Pada <br />
                    Produk Best in Show
                </h1>
            </div>
            <div class="mt-4 text-center">
                <h4 class="text-primaryBlack font-poppins-r">
                    Temukan Perbedaan yang Dapat Dilihat dan Dirasakan pada Hewan Kesayangan Anda
                </h4>
            </div>
            <div class="mt-4">
                <div class="flex flex-col lg:flex-row justify-center items-center gap-6">
                    <a href="#" class="btn-intro-category">ANJING</a>
                    <a href="#" class="btn-intro-category">KUCING</a>
                    <a href="#" class="btn-intro-category">HEWAN KECIL</a>
                </div>
            </div>
            <div class="mt-8">
                <img src="images/banner/pet-categories.webp" class="w-full" />
            </div>
        </div>
    </section>

    <section id="homeProduct">
        <div class="container">
            <div class="text-center">
                <h2 class="page-heading-2 text-primaryBlack">Produk Kami</h2>
            </div>
            <div class="mt-6">
                <div class="gridview-category">
                    <div class="grid-item">
                        <a href="#" class="category-thumbnail"
                            style="background: linear-gradient(
                        0deg,
                        rgba(29, 29, 29, 0.40) 0%,
                        rgba(29, 29, 29, 0.40) 100%
                      ),
                      url(images/thumbnail/thumbnail-category-cat.webp) center / cover no-repeat,
                      #D9D9D9;">
                            <div class="absolute top-1/2 left-1/2 translate-50">
                                <p class="text-primaryWhite text-xl font-poppins-m">Kucing</p>
                            </div>
                        </a>

                        <div class="mt-4 text-center">
                            <a href="#" class="category-link">Explore Products</a>
                        </div>
                    </div>

                    <div class="grid-item">
                        <a href="#" class="category-thumbnail"
                            style="background: linear-gradient(
                        0deg,
                        rgba(29, 29, 29, 0.40) 0%,
                        rgba(29, 29, 29, 0.40) 100%
                      ),
                      url(images/thumbnail/thumbnail-category-dog.webp) center / cover no-repeat,
                      #D9D9D9;">
                            <div class="absolute top-1/2 left-1/2 translate-50">
                                <p class="text-primaryWhite text-xl font-poppins-m">Anjing</p>
                            </div>
                        </a>

                        <div class="mt-4 text-center">
                            <a href="#" class="category-link">Explore Products</a>
                        </div>
                    </div>

                    <div class="grid-item">
                        <a href="#" class="category-thumbnail"
                            style="background: linear-gradient(
                        0deg,
                        rgba(29, 29, 29, 0.40) 0%,
                        rgba(29, 29, 29, 0.40) 100%
                      ),
                      url(images/thumbnail/thumbnail-category-small.webp) center / cover no-repeat,
                      #D9D9D9;">
                            <div class="absolute top-1/2 left-1/2 translate-50">
                                <p class="text-primaryWhite text-xl font-poppins-m">Hewan Kecil</p>
                            </div>
                        </a>

                        <div class="mt-4 text-center">
                            <a href="#" class="category-link">Explore Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="homeInfo">
        <div class="container">
            <div class="text-center">
                <h2 class="page-heading-2 text-primaryBlack">Info Kami</h2>
            </div>
            <div class="mt-6">
                <div class="gridview-brand-info">
                    <div class="grid-item">
                        <p class="item-title">SUPER PREMIUM</p>
                        <div class="mt-4">
                            <p class="item-caption">
                                Lorem ipsum dolor sit amet consectetur. Sit in feugiat tempus sit rhoncus orci aliquam.
                                Fringilla neque fringilla suspendisse velit sed volutpat. Sit nisi integer rhoncus quis
                                dolor phasellus varius semper consequat. Tincidunt
                            </p>
                        </div>
                        <div class="mt-6">
                            <a href="#" class="item-link">Check Our Blog</a>
                        </div>
                    </div>

                    <div class="grid-item">
                        <p class="item-title">SUPER PREMIUM</p>
                        <div class="mt-4">
                            <p class="item-caption">
                                Lorem ipsum dolor sit amet consectetur. Sit in feugiat tempus sit rhoncus orci aliquam.
                                Fringilla neque fringilla suspendisse velit sed volutpat. Sit nisi integer rhoncus quis
                                dolor phasellus varius semper consequat. Tincidunt
                            </p>
                        </div>
                        <div class="mt-6">
                            <a href="#" class="item-link">Check Our Blog</a>
                        </div>
                    </div>

                    <div class="grid-item">
                        <img src="images/thumbnail/sample-brand-info.png" class="w-52 mx-auto" alt="Info Kami">
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
