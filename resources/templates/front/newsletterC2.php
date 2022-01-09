<setion class="newsletterC2">
    <div
        class="newsletterC2__container"
        data-aos="flip-down"
        data-aos-duration="1000">
        <h3 class="newsletterC2__title">Envoyez-nous une newsletter pour être
            <br>
                <span>
                    mis à jour</span>
            </h3>
            <form
                class="newsletterC2__form needs-validation"
                method="POST"
                action="#"
                role="email">
                <!-- <i class="fa fa-envelope" aria-hidden="true"></i> -->
                <input
                    type="email"
                    placeholder="Votre adresse mail"
                    id="subscriberEmail"
                    name="email"
                    required="required">
                    <a href="#" id="submit_email_subscribe" class="newsletterC2__a" type="submit" name="submit">
                        <button class="newsletterC2">Abonnez-vous</button>
                    </a>
                </form>
            </div>
        </setion>


<script>
    $(document).ready(function () {
        var form = document.getElementsByClassName("needs-validation");
        $('#submit_email_subscribe').click(function (e) {
            e.preventDefault()
            console.log('clicked');
            if (form[0].checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                form[0]
                    .classList
                    .add("was-validated");
                return
            }
            var email = $('#subscriberEmail').val();
            console.log(email);
            $.ajax({
                type: "POST",
                url: "./ajaxCalls.php",
                dataType: "json",
                data: {
                    subscribe: "newsletter",
                    subEmail: email
                },
                success: function (data) {
                    console.log(data);
                    if (data.code == "200") {
                        toastr.success(data.msg);
                    } else {
                        toastr.error(data.msg);
                    }
                    $('#subscriberEmail').val("");
                }

            });
        });
    });
    $(document).ready(function () {
        var form = document.getElementsByClassName("needs-validation");
        $('#submit_email_footer').click(function (e) {
            e.preventDefault()
            console.log('clicked');
            var email = $('#email-input').val();
            if (email == "") {
                toastr.error("please provide a valid email");
                return
            }
            console.log(email);
            $.ajax({
                type: "POST",
                url: "./ajaxCalls.php",
                dataType: "json",
                data: {
                    subscribe: "newsletter",
                    subEmail: email
                },
                success: function (data) {
                    console.log(data);
                    if (data.code == "200") {
                        toastr.success(data.msg);
                    } else {
                        toastr.error(data.msg);
                    }
                    $('#email-input').val("");
                }

            });
        });
    });
    $(document).ready(function () {
        var form = document.getElementsByClassName("needs-validation");
        $('#submit_mailbox_subscribe').click(function (e) {
            e.preventDefault()
            console.log('clicked');
            var email = $('#mailboxEmail').val();
            if (email == "") {
                toastr.error("please provide a valid email");
                return
            }
            console.log(email);
            $.ajax({
                type: "POST",
                url: "./ajaxCalls.php",
                dataType: "json",
                data: {
                    subscribe: "newsletter",
                    subEmail: email
                },
                success: function (data) {
                    console.log(data);
                    if (data.code == "200") {
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