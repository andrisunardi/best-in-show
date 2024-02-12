<div>
    <div id="overlay" style="display: none;"></div>
    <div id="sidemenu" style="right: -100%;">
        <div class="p-4">
            <button type="button" id="sidemenu-close">
                <i>close</i>
            </button>
            <div class="clear-both"></div>

            <ul class="sidemenu-list">
                <li>
                    <a href="#">ANJING</a>
                </li>
                <li>
                    <a href="#">KUCING</a>
                </li>
                <li>
                    <a href="#">PRODUK</a>
                </li>
                <li>
                    <a href="#">TEMPAT MEMBELI</a>
                </li>
                <li>
                    <a href="#">LAIN-LAIN</a>
                </li>
                <li>
                    <a href="#">TENTANG KAMI</a>
                </li>
                <li>
                    <a href="#">HUBUNGI KAMI</a>
                </li>
            </ul>

            <form class="navbar-form">
                <div class="form-group">
                    <div class="icon-placeholder">
                        <i class="material-icons rounded-icon">search</i>
                    </div>
                    <input type="text" placeholder="Cari Produk atau Artikel" />
                </div>
            </form>
        </div>
    </div>

    <header>
        <div class="top-accent"></div>

        <div class="header-container">
            <div class="header-wrapper">
                <div class="hidden lg:block w-2/6">&nbsp;</div>
                <div class="lg:w-4/6">
                    <img src="{{ asset("assets/images/logo/bis-logo.webp") }}" alt="Best In Show" />
                </div>

                <div class="hidden lg:block w-2/6">
                    <form class="navbar-form">
                        <div class="form-group">
                            <div class="icon-placeholder">
                                <i class="material-icons rounded-icon">search</i>
                            </div>
                            <input type="text" placeholder="Cari Produk atau Artikel" />
                        </div>
                    </form>
                    <div class="clear-both"></div>
                </div>
                <div class="block lg:hidden">
                    <button type="button" id="hamburger-button">
                        <i>menu</i>
                    </button>
                </div>
            </div>
        </div>

        <div class="hidden lg:block mt-7">
            <ul class="menu-list">
                <li>
                    <a href="#">ANJING</a>
                </li>
                <li>
                    <a href="#">KUCING</a>
                </li>
                <li>
                    <a href="#">PRODUK</a>
                </li>
                <li>
                    <a href="#">TEMPAT MEMBELI</a>
                </li>
                <li>
                    <a href="#">LAIN-LAIN</a>
                </li>
                <li>
                    <a href="#">TENTANG KAMI</a>
                </li>
                <li>
                    <a href="#">HUBUNGI KAMI</a>
                </li>
            </ul>
        </div>
    </header>
</div>
