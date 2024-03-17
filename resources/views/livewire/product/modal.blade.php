<div id="filtermodal" class="modal-wrapper" style="display: none;">
    <div class="modal-card">
        <div class="absolute top-0 right-0">
            <button type="button" class="close-modal" onclick="toggleModal()">
                <i class="material-icons rounded-icon text-xl">close</i>
            </button>
        </div>

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
