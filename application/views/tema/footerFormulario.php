<!--JavaScript at end of body for optimized loading-->
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
</script>

<?php if ($paginaEditar == true) { ?>
    <script type="text/javascript" src="../../js/semantic.min.js"></script>
    <script type="text/javascript" src="../../dist/calendar.min.js"></script>
    <script src="../../trumbowyg/dist/trumbowyg.min.js"></script>
<?php } else { ?>
    <script type="text/javascript" src="../js/semantic.min.js"></script>
    <script type="text/javascript" src="../dist/calendar.min.js"></script>
    <script src="../trumbowyg/dist/trumbowyg.min.js"></script>
<?php } ?>

<script>
    $('.menu .item')
        .tab()
    ;
    $('#example13').calendar({
        ampm: false,
        monthFirst: false,
        formatter: {
            date: function (date, settings) {
                if (!date) return '';
                var day = date.getDate();
                var month = date.getMonth() + 1;
                var year = date.getFullYear();
                return year + '-' + month + '-' + day;
            }
        }
    });
    $('#trumbowyg-demo').trumbowyg();
</script>

<script type="text/javascript">
    $(document).ready(function () {
        var max_fields = 100; //maximum input boxes allowed
        var wrapper = $(".addSlot"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="ui action input" style="margin-bottom: 10px;"><input type="text" name="slots[]" required/><button class="ui red button remove_field"><i class="fa fa-minus" aria-hidden="true"></i></button></div>'); //add input box
            }
        });
        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
</script>

</body>
</html>