<!-- subscribe section -->
<section class="contact-section">
    <div class="container">
        <div class="sec-title centred"><h2>Написать мне</h2></div>
        <div class="form-area">
            <form id="contact-form" name="contact_form" class="default-form" action="{{ route('supports.send') }}" method="post">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <input type="text" name="name" value="" placeholder="Ваше имя" required="">
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <input type="email" name="email" value="" placeholder="Ваш email" required="">
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <input type="text" name="site" value="" placeholder="Сайт" required="">
                    </div>
                    <div class="colo-md-12 col-sm-12 col-xs-12">
                        <input type="text" name="subject" value="" placeholder="Тема" required="">
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <textarea placeholder="Ваше сообщение" name="text" required=""></textarea>
                    </div>
                </div>
                <div class="contact-btn centred">
                    <button type="submit" class="btn-one" data-loading-text="Please wait...">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- subscribe section end -->
