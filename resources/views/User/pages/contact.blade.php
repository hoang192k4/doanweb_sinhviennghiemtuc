@extends('layouts.layouts_user')
@section('title', 'Trang liên hệ')
@section('content')
    <div class="container_css" style="padding: 0px 10px;">
        <div class="contact">
            <div class="row_contact">
                <div class="top_nav"
                    style="font-size: 35px; margin-bottom: 30px; text-align: center;width: 100%;font-family: Poppins;">
                    Liên hệ
                </div>
                <div class="col_contact" style="width:50%; justify-content: center;">
                    <div class="col_contact_1" style="background-color:ghostwhite">
                        <iframe shape="rect"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3055.5809799629687!2d106.69851285347562!3d10.771678697067994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f40a3b49e59%3A0xa1bd14e483a602db!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEvhu7kgdGh14bqtdCBDYW8gVGjhuq9uZw!5e1!3m2!1svi!2s!4v1732982868503!5m2!1svi!2s"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <div style="text-align:center; width: 80%;margin-left: 40px; margin-top:5px;font-size: 13px;">
                            Địa
                            chỉ : 65 Huỳnh Thúc Kháng,
                            P. Bến Nghé,
                            Quận 1, TP. Hồ
                            Chí Minh
                            Số điện thoại : 1900 1234
                            Email : cskh_svnt@gmail.com</div>
                    </div>
                </div>
                <div class="col_contact">
                    <div class="col_contact_2">
                        <form class="form_contact" action="" method="" style="padding-left: 30px;">
                            <div class="col">
                                <input type="text" name="name" placeholder="Họ và tên của bạn" />
                            </div>
                            <div class="col">
                                <input type="text" name="email" placeholder="E-mail" />
                            </div>
                            <div class="col">
                                <input type="text" name="subject" placeholder="Tiêu đề" />
                            </div>
                            <div class="col">
                                <textarea name="message" placeholder="Nội dung"
                                    style="width: 500px;height: 250px;margin-left: 10px; padding-left: 5px;"></textarea>
                            </div>
                            <button class="sendMessage">
                                Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
