<div id="small-dialog1" class="mfp-hide">
    <div class="signup">
        <h3>Subscribe</h3>
        <h4>Enter Your Valid E-mail</h4>
        <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" />
        <div class="clearfix"></div>
        <input type="submit"  value="Subscribe Now"/>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });
    });
</script>