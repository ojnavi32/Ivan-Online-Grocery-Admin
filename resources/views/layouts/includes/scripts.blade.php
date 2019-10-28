<script src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/datatables.min.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script>
$(function () {
    $('.select2').select2({
        templateResult: function (data) {    
            if (!data.element) {
            return data.text;
            }

            var $element = $(data.element);

            var $wrapper = $('<span></span>');
            $wrapper.addClass($element[0].className);

            $wrapper.text(data.text);

            return $wrapper;
        }
    })
    setTimeout(() => {
        $('.alert.alert-dismissible').hide()
    }, 5000)
})
</script>
@stack('script')