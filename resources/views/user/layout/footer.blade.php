<footer class="footer section text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="social-media">
                    <li>
                        <a href="https://www.facebook.com/">
                            <i class="tf-ion-social-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/">
                            <i class="tf-ion-social-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.twitter.com/">
                            <i class="tf-ion-social-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.pinterest.com/">
                            <i class="tf-ion-social-pinterest"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script src="plugins/jquery/dist/jquery.min.js"></script>
<script>
    $(".button").click(function () {
        const id = $(this).attr('id').split('-');
        const action = id[0];
        const productId = id[1];
        switch (action) {
            case 'plus':
                $.get(
                    '/plus/' + productId,
                    function (response) {
                        $(".quantity-" + productId).text(response[0]);
                        $(".total-" + productId).text(response[1])
                        $(".total-price").text(response[2])
                    }
                );
                break;
            case 'minus':
                $.get(
                    '/minus/' + productId,
                    function (response) {
                        $(".quantity-" + productId).text(response[0]);
                        $(".total-" + productId).text(response[1])
                        $(".total-price").text(response[2])
                    }
                );
                break;
            case 'remove':
                $('#yes').click(function () {
                        $.get(
                            '/remove-cart/' + productId,
                            function (response) {
                                $('.product-' + productId).remove();
                                $(".total-price").text(response)
                            }
                        );
                    }
                );
        }
    })
</script>
