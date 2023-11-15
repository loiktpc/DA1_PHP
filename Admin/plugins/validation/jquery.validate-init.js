jQuery(".form-valide").validate({
    ignore: [],
    errorClass: "invalid-feedback animated fadeInDown",
    errorElement: "div",
    errorPlacement: function (e, a) {
        jQuery(a).parents(".form-group > div").append(e);
    },
    highlight: function (e) {
        jQuery(e)
            .closest(".form-group")
            .removeClass("is-invalid")
            .addClass("is-invalid");
    },
    success: function (e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"),
            jQuery(e).remove();
    },
    rules: {
        UserName: { required: !0, minlength: 6, maxlength: 20 },
        UserEmail: { required: !0, email: !0 },
        // pattern ít nhất 6 ký tự, ít nhất 1 chữ và 1 số
        UserPass: {
            required: !0,
            minlength: 6,
            maxlength: 20,
        },
        "val-confirm-password": { required: !0, equalTo: "#UserPass" },
        "val-select2": { required: !0 },
        "val-select2-multiple": { required: !0, minlength: 2 },
        "val-suggestions": { required: !0, minlength: 5 },
        role_id: { required: !0 },
        checkconfrim: { required: !0 },
        "val-currency": { required: !0, currency: ["$", !0] },
        "val-website": { required: !0, url: !0 },
        UserPhone: { required: !0, minlength: 10, number: true, maxlength: 15 },
        "val-digits": { required: !0, digits: !0 },
        "val-number": { required: !0, number: !0 },
        "val-range": { required: !0, range: [1, 5] },
        "val-terms": { required: !0 },
        name: { required: !0, minlength: 6 },
    },
    messages: {
        UserName: {
            required: "Vui Lòng Nhập tên đăng nhập",
            minlength: "Vui Lòng Nhập Trên 6 kí tự",
            maxlength: "không được quá 20 kí tự ",
        },
        UserEmail: "Vui Lòng Nhập Địa Chỉ Email",
        UserPass: {
            required: "Vui Lòng Nhập Mật Khẩu",
            minlength: "Vui Lòng Nhập Trên 6 kí tự",
            maxlength: "không được quá 20 kí tự",
        },
        "val-confirm-password": {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password as above",
        },
        "val-select2": "Please select a value!",
        "val-select2-multiple": "Please select at least 2 values!",
        "val-suggestions": "What can we do to become better?",
        role_id: "Vui Lòng Nhập Phân Quyền",
        checkconfrim: "vui lòng chọn thông tin ",
        "val-currency": "Please enter a price!",
        "val-website": "Please enter your website!",
        UserPhone: {
            required: "vui lòng nhập Số Điện Thoại",
            minlength: "nhập ít nhất 10 số",
            number: "vui lòng nhập số",
            maxlength: "không được nhập nhiều hơn 15 kí tự",
        },
        "val-digits": "Please enter only digits!",
        "val-number": "Please enter a number!",
        "val-range": "Please enter a number between 1 and 5!",
        "val-terms": "You must agree to the service terms!",
        name: {
            required: "vui lòng không được để trống",
            minlength: "Vui lòng nhập trên 6 kí tự",
        },
    },
});
