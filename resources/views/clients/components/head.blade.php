<meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{$title}}</title>
    <base href="{{asset('')}}">
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <script>
        // Lấy tất cả radio buttons
        const radioButtons = document.querySelectorAll('.form-check-input');

        // Lặp qua từng radio button và lắng nghe sự kiện click
        radioButtons.forEach(radio => {
            radio.addEventListener('click', function () {
                // Bỏ chọn tất cả radio button khác
                radioButtons.forEach(rb => {
                    if (rb !== this) {
                        rb.checked = false; // Bỏ chọn
                        rb.nextElementSibling.style.backgroundColor = ""; // Đặt lại màu nền
                        rb.nextElementSibling.style.color = ""; // Đặt lại màu chữ
                        rb.nextElementSibling.style.borderColor = ""; // Đặt lại màu viền
                    }
                });

                // Cập nhật màu sắc cho nhãn tương ứng với radio button đã chọn
                this.nextElementSibling.style.backgroundColor = "#ff5722"; // Màu nền khi chọn
                this.nextElementSibling.style.color = "white"; // Màu chữ khi chọn
                this.nextElementSibling.style.borderColor = "#ff5722"; // Màu viền khi chọn
            });
        });
        //-------------- phần màu sắc
        const radioButtonsColor = document.querySelectorAll('.form-check-input');

// Lặp qua từng radio button và lắng nghe sự kiện click
radioButtonsColor.forEach(radio => {
    radio.addEventListener('click', function () {
        // Bỏ chọn tất cả radio button khác
        radioButtonsColor.forEach(rb => {
            if (rb !== this) {
                rb.checked = false; // Bỏ chọn
                rb.nextElementSibling.style.backgroundColor = ""; // Đặt lại màu nền
                rb.nextElementSibling.style.color = ""; // Đặt lại màu chữ
                rb.nextElementSibling.style.borderColor = ""; // Đặt lại màu viền
            }
        });

        // Cập nhật màu sắc cho nhãn tương ứng với radio button đã chọn
        this.nextElementSibling.style.backgroundColor = "red"; // Màu nền khi chọn
        this.nextElementSibling.style.color = "white"; // Màu chữ khi chọn
        this.nextElementSibling.style.borderColor = "#red"; // Màu viền khi chọn
    });
});
    </script>
    <style>
        .product-options {
            display: flex;
            gap: 10px;
        }

        .product-options .form-check {
            position: relative;
        }

        .product-options .form-check-input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .product-options .form-check-label {
            border: 1px solid #ccc;
            padding: 10px 20px;
            text-align: center;
            width: 100px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .product-options .form-check-input:checked + .form-check-label {
            /* background-color: #ff5722; */
            color: black;
            border-color: red;
        }

        .product-options .form-check-label:hover {
            background-color: #f5f5f5;
            border-color: #bbb;
        }
    </style>
    <!-- Favicons -->
    <link rel="shortcut icon" href="templates/img/favicon.ico" />
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="templates/css/font-awesome.min.css" />
    <!-- Ionicons css -->
    <link rel="stylesheet" href="templates/css/ionicons.min.css" />
    <!-- Nice select css -->
    <link rel="stylesheet" href="templates/css/nice-select.css" />
    <!-- Jquery fancybox css -->
    <link rel="stylesheet" href="templates/css/jquery.fancybox.css" />
    <!-- Jquery ui price slider css -->
    <link rel="stylesheet" href="templates/css/jquery-ui.min.css" />
    <!-- Meanmenu css -->
    <link rel="stylesheet" href="templates/css/meanmenu.min.css" />
    <!-- Nivo slider css -->
    <link rel="stylesheet" href="templates/css/nivo-slider.css" />
    <!-- Owl carousel css -->
    <link rel="stylesheet" href="templates/css/owl.carousel.min.css" />
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="templates/css/bootstrap.min.css" />
    <!-- Custom css -->
    <link rel="stylesheet" href="templates/css/default.css" />
    <!-- Main css -->
    <link rel="stylesheet" href="templates/style.css" />
    <!-- Responsive css -->
    <link rel="stylesheet" href="templates/css/responsive.css" />
    <!-- Customize css -->
    <link rel="stylesheet" href="templates/css/customize.css" />

    <!-- Modernizer js -->
    <script src="templates/js/vendor/modernizr-3.5.0.min.js"></script>
