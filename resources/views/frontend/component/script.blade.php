<script src="/frontend/assets/js/jquery-3.3.1.min.js"></script>
<script src="/frontend/assets/js/modernizr-3.6.0.min.js"></script>
<script src="/frontend/assets/js/plugins.js"></script>
<script src="/frontend/assets/js/bootstrap.min.js"></script>
<script src="/frontend/assets/js/heandline.js"></script>
<script src="/frontend/assets/js/isotope.pkgd.min.js"></script>
<script src="/frontend/assets/js/magnific-popup.min.js"></script>
<script src="/frontend/assets/js/owl.carousel.min.js"></script>
<script src="/frontend/assets/js/wow.min.js"></script>
<script src="/frontend/assets/js/countdown.min.js"></script>
<script src="/frontend/assets/js/odometer.min.js"></script>
<script src="/frontend/assets/js/viewport.jquery.js"></script>
<script src="/frontend/assets/js/nice-select.js"></script>
<script src="/frontend/assets/js/main.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $('.select2').select2({
        placeholder: "Select a country",
        allowClear: true,
        width: 'resolve',
        ajax: {
            url: 'https://restcountries.com/v3.1/all',
            dataType: 'json',
            delay: 250,
            processResults: function (data, params) {
                // Lọc dữ liệu theo từ khóa tìm kiếm
                var filteredData = $.grep(data, function (country) {
                    return country.name.common.toLowerCase().indexOf(params.term.toLowerCase()) > -1;
                });

                return {
                    results: $.map(filteredData, function (country) {
                        return {
                            id: country.cca3,
                            text: country.name.common
                        };
                    })
                };
            },
            cache: true
        }
    });
});
</script>
