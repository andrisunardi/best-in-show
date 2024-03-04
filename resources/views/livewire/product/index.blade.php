@section('title', trans('index.about_us'))
@section('icon', 'fas fa-building')

<main>
    <section id="productsBreadcrumb">
        <div class="container">
            <div class="breadcrumb">
                <ol>
                    <li>
                        <a href="#">Home</a>
                        <span class="mx-2 font-poppins-m">&gt;</span>
                    </li>
                    <li>
                        <a href="#">Anjing</a>
                        <span class="mx-2 font-poppins-m">&gt;</span>
                    </li>
                    <li>
                        <span class="current">Produk</span>
                    </li>
                </ol>
            </div>
            <div class="my-6">
                <hr class="border-t-2 border-primaryGray" />
            </div>
        </div>
    </section>

    <section id="productsList">
        <div class="container mt-10">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <button type="button" class="btn-filter-product" onclick="toggleModal()">
                        <div class="flex items-center gap-3">
                            <i class="material-icons rounded-icon text-2xl">tune</i>
                            <p>Filter</p>
                        </div>
                    </button>

                    <div class="filter-tag">
                        <div class="flex items-center gap-3">
                            <p>Super Premium</p>
                            <button type="button">
                                <i class="material-icons rounded-icon">close</i>
                            </button>
                        </div>
                    </div>
                    <div class="filter-tag">
                        <div class="flex items-center gap-3">
                            <p>Holistic</p>
                            <button type="button">
                                <i class="material-icons rounded-icon">close</i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <p class="text-primaryGray text-sm font-poppins-r">
                        Menampilkan 1 &ndash; 16 dari 50 item
                    </p>
                </div>
            </div>

            <div class="mt-10">
                <div class="relative flex gap-6">
                    <div class="hidden lg:block w-1/4">
                        <div class="filter-card">
                            <form action="" class="product-form">
                                <h2>Cari Produk</h2>

                                <div class="relative mt-4">
                                    <div class="absolute top-1/2 left-3 -translate-y-1/2">
                                        <i class="material-icons rounded-icon">search</i>
                                    </div>
                                    <input type="text" placeholder="Cari Produk" />
                                </div>

                                <div class="relative mt-6">
                                    <h2>Kategori</h2>

                                    <div class="mt-3">
                                        <button type="button" class="accordion">
                                            <div class="flex justify-between items-center">
                                                <p>Anjing</p>
                                                <i class="arrow">arrow_drop_down</i>
                                            </div>
                                        </button>
                                        <div class="panel" style="display: none; overflow: hidden;">
                                            <div class="form-group">
                                                <label for="">Super Premium</label>
                                                <input id="" type="checkbox" />
                                            </div>
                                            <div class="form-group">
                                                <label for="">Anjing Pameran</label>
                                                <input id="" type="checkbox" />
                                            </div>
                                        </div>

                                        <button type="button" class="accordion">
                                            <div class="flex justify-between items-center">
                                                <p>Kucing</p>
                                                <i class="arrow">arrow_drop_down</i>
                                            </div>
                                        </button>
                                        <div class="panel" style="display: none; overflow: hidden;">
                                            <div class="form-group">
                                                <label for="">Super Premium</label>
                                                <input id="" type="checkbox" />
                                            </div>
                                            <div class="form-group">
                                                <label for="">Anjing Pameran</label>
                                                <input id="" type="checkbox" />
                                            </div>
                                        </div>

                                        <button type="button" class="accordion">
                                            <div class="flex justify-between items-center">
                                                <p>Hewan Kecil</p>
                                                <i class="arrow">arrow_drop_down</i>
                                            </div>
                                        </button>
                                        <div class="panel" style="display: none; overflow: hidden;">
                                            <div class="form-group">
                                                <label for="">Super Premium</label>
                                                <input id="" type="checkbox" />
                                            </div>
                                            <div class="form-group">
                                                <label for="">Anjing Pameran</label>
                                                <input id="" type="checkbox" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="w-full lg:w-3/4">
                        <div class="gridview-product">
                            <div class="gridview-product-item">
                                <img src="images/thumbnail/dummy-product.png" alt="Good Dog Puppy Lamb & Rice" />
                                <div class="text-center">
                                    <a href="#">Good Dog Puppy Lamb & Rice</a>
                                    <p>Available 18Kg</p>
                                </div>
                            </div>
                            <div class="gridview-product-item">
                                <img src="images/thumbnail/dummy-product.png" alt="Good Dog Puppy Lamb & Rice" />
                                <div class="text-center">
                                    <a href="#">Good Dog Puppy Lamb & Rice</a>
                                    <p>Available 18Kg</p>
                                </div>
                            </div>
                            <div class="gridview-product-item">
                                <img src="images/thumbnail/dummy-product.png" alt="Good Dog Puppy Lamb & Rice" />
                                <div class="text-center">
                                    <a href="#">Good Dog Puppy Lamb & Rice</a>
                                    <p>Available 18Kg</p>
                                </div>
                            </div>
                            <div class="gridview-product-item">
                                <img src="images/thumbnail/dummy-product.png" alt="Good Dog Puppy Lamb & Rice" />
                                <div class="text-center">
                                    <a href="#">Good Dog Puppy Lamb & Rice</a>
                                    <p>Available 18Kg</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="block lg:hidden mt-10">
                <div class="text-right">
                    <p class="text-primaryGray text-sm font-poppins-r">
                        Menampilkan 1 &ndash; 16 dari 50 item
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>
