 <!-- footer style two -->
<footer class="footer-style-two centred">
    <div class="container">
        <div class="logo-box">
            <a href="{{ route('index') }}">
                <figure><img src="/images/footer/footer-logo.png" alt=""></figure>
            </a>
        </div>
        <ul class="footer-social">

            @foreach ($socialLinks as $link)

                <li><a href="{{ $link->link }}" target="_blank"><i class="{{ $link->additional_classes }}"></i></a></li>

            @endforeach

        </ul>
        <div class="copyright">Copyright © {{ (date('Y') == 2018) ? 2018 : 2018 - date('Y')}}. Все права защищены.</div>
    </div>
</footer>
<!-- footer style two end -->