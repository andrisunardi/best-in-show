@push("css")
    {{-- <script>
        (function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,"script","//www.google-analytics.com/analytics.js","ga");

        ga("create", "{{ env("GOOGLE_ANALYTICS") }}", "auto");
        ga("send", "pageview");
    </script>

    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(["_setAccount", "{{ env("GOOGLE_ANALYTICS") }}"]);
        _gaq.push(["_trackPageview"]);

        (function() {
            var ga = document.createElement("script"); ga.type = "text/javascript"; ga.async = true;
            ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";
            var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script> --}}

    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env("GOOGLE_ANALYTICS") }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag("js", new Date());
        gtag("config", "{{ env("GOOGLE_ANALYTICS") }}");
    </script>
@endpush

@push('script')
@endpush
