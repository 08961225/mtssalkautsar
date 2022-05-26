<a href="#" id="scroll" style="display: none;">
    <span class="glyphicon glyphicon-name"></span>

</a>
<footer class="footer">
    <div class="container">
        <div class="footer-logo"><a><img src="<?= base_url('assets/'); ?>vendor/home/img/footer-logo.png" alt=""></a></div>
        <span class="copyright">&copy;Procurement <?= date('Y'); ?><a> Powered By : Authorized</a></span>
        <div class="credits">
            <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Knight
        -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer>


<script type="text/javascript">
    $(document).ready(function(e) {

        $('#test').scrollToFixed();
        $('.res-nav_click').click(function() {
            $('.main-nav').slideToggle();
            return false

        });

        $('.Portfolio-box').magnificPopup({
            delegate: 'a',
            type: 'image'
        });

    });
</script>

<script>
    wow = new WOW({
        animateClass: 'animated',
        offset: 100
    });
    wow.init();
</script>


<script type="text/javascript">
    $(window).load(function() {

        $('.main-nav li a, .servicelink').bind('click', function(event) {
            var $anchor = $(this);

            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - 102
            }, 1500, 'easeInOutExpo');
            /*
            if you don't want to use the easing effects:
            $('html, body').stop().animate({
            	scrollTop: $($anchor.attr('href')).offset().top
            }, 1000);
            */
            if ($(window).width() < 768) {
                $('.main-nav').hide();
            }
            event.preventDefault();
        });
    })
</script>

<script type="text/javascript">
    $(window).load(function() {


        var $container = $('.portfolioContainer'),
            $body = $('body'),
            colW = 375,
            columns = null;


        $container.isotope({
            // disable window resizing
            resizable: true,
            masonry: {
                columnWidth: colW
            }
        });

        $(window).smartresize(function() {
            // check if columns has changed
            var currentColumns = Math.floor(($body.width() - 30) / colW);
            if (currentColumns !== columns) {
                // set new column count
                columns = currentColumns;
                // apply width to container manually, then trigger relayout
                $container.width(columns * colW)
                    .isotope('reLayout');
            }

        }).smartresize(); // trigger resize to set container width
        $('.portfolioFilter a').click(function() {
            $('.portfolioFilter .current').removeClass('current');
            $(this).addClass('current');

            var selector = $(this).attr('data-filter');
            $container.isotope({

                filter: selector,
            });
            return false;
        });

    });
</script>



<script type="text/javascript">
    var otherCheckbox = document.querySelector('input[value="others"]');
    var otherText = document.querySelector('input[id="otherVal"]');
    otherText.style.visibility = 'hidden';

    otherCheckbox.onchange = function() {
        if (otherCheckbox.checked) {
            otherText.style.visibility = 'visible';
            otherText.value = '';
        } else {
            otherText.style.visibility = 'hidden';
        }
    };
</script>





<script>
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
        return true;
    }
</script>


<script>
    $(document).ready(function() {
        var form_count = 1,
            previous_form, next_form, total_forms;
        total_forms = $("fieldset").length;
        $(".next-form").click(function() {
            previous_form = $(this).parent();
            next_form = $(this).parent().next();
            next_form.show();
            previous_form.hide();
            setProgressBarValue(++form_count);
        });
        $(".previous-form").click(function() {
            previous_form = $(this).parent();
            next_form = $(this).parent().prev();
            next_form.show();
            previous_form.hide();
            setProgressBarValue(--form_count);
        });
        setProgressBarValue(form_count);

        function setProgressBarValue(value) {
            var percent = parseFloat(100 / total_forms) * value;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
                .html(percent + "%");
        }
        // Handle form submit and validation
        $("#register_form").submit(function(event) {
            var error_message = '';
            if (!$("#name").val()) {
                error_message += "Please Fill Registered Company Name";
            }
            if (!$("#cfo").val()) {
                error_message += "<br>Please CEO Name";
            }
            if (!$("#ceo").val()) {
                error_message += "<br>Please CFO Name";
            }
            // Display error if any else submit form
            if (error_message) {
                $('.alert-success').removeClass('hide').html(error_message);
                return false;
            } else {
                return true;
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('#scroll').fadeIn();
            } else {
                $('#scroll').fadeOut();
            }
        });
        $('#scroll').click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    });
</script>
</body>




</html>