<!-- <script src="js/isotope.min.js"></script> -->
<script src="js/mixitup.min.js"></script>
<script src="js/typed.js"></script>
    <!-- build:js js/main.min.js -->
    <script src="assets/js/main.min.js"></script>

    <!-- endbuild -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
            AOS.init(
              {
                // Global settings:
                disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
                startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
                initClassName: 'aos-init', // class applied after initialization
                animatedClassName: 'aos-animate', // class applied on animation
                useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
                disableMutationObserver: false, // disables automatic mutations' detections (advanced)
                debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
                throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
                
    
                // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
                offset: 120, // offset (in px) from the original trigger point
                delay: 100, // values from 0 to 3000, with step 50ms
                duration: 500, // values from 0 to 3000, with step 50ms
                easing: 'ease', // default easing for AOS animations
                once: false, // whether animation should happen only once - while scrolling down
                mirror: false, // whether elements should animate out while scrolling past them
                anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation
              }
            );
    </script>

<script>
  $(document).ready(function(){
        var form = document.getElementsByClassName("needs-validation");
        $('#submit_email_subscribe').click(function(e){
            e.preventDefault()
            console.log('clicked');
            if (form[0].checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                form[0].classList.add("was-validated");
                return
            }
            var email = $('#subscriberEmail').val();
            console.log(email);
            $.ajax({
                type: "POST",
                url: "./ajaxCalls.php",
                dataType: "json",
                data: {subscribe:"newsletter",subEmail:email},
                success: function(data){
                    console.log(data);
                    if(data.code == "200"){
                        toastr.success(data.msg);
                    } else {
                        toastr.error(data.msg);
                    }
                    $('#subscriberEmail').val("");
                }

            });
        });
  });

  $(document).ready(function(){
        var form = document.getElementsByClassName("needs-validation");
        $('#submit_mailbox_subscribe').click(function(e){
            e.preventDefault()
            console.log('clicked');
            var email = $('#mailboxEmail').val();
            if(email == ""){
                toastr.error("please provide a valid email");
                return
            }
            console.log(email);
            $.ajax({
                type: "POST",
                url: "./ajaxCalls.php",
                dataType: "json",
                data: {subscribe:"newsletter",subEmail:email},
                success: function(data){
                    console.log(data);
                    if(data.code == "200"){
                        toastr.success(data.msg);
                    } else {
                        toastr.error(data.msg);
                    }
                    $('#mailboxEmail').val("");
                }

            });
        });
  });
</script>













</body>
</html>