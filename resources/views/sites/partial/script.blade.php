@push('scripts')
    <script>
        NDD_SDK.bindFormData({
            input_text: [
                'inputSiteName', 'inputSiteURL',
                'inputDataTitle', 'inputDataSubTitle',
                'inputDataEndTime', 'inputDataLogoUrl', 'inputDataBackgroundUrl',
                'inputTemplateId'
            ],
        }, {
            helpClass: 'invalid-feedback',
            bs4: true
        });

        $('#form-create .btn-preview-template').on('click', function (e) {
            let inputs = $('input[name^="data"]');
            let data = {};

            inputs.each(function (index, input) {
                data[input.getAttribute('data-key')] = input.value
            });

            let newHref = $(this).attr('href') + '?data=' + JSON.stringify(data);
            window.open(newHref, '_blank');
            return false;
        });
    </script>
@endpush
