;window.NDD_SDK = window.NDD_SDK || (($) => {
    const data_get = (target, path, _default = null) => {
        if (!target || typeof target !== 'object') return _default;
        if (['undefined', 'function'].includes(typeof path) || path == null) return target;

        path = Array.isArray(path) ? path : (path + '').split('.');
        let key = path.shift();
        while (key) {
            if (!target[key]) return _default;
            target = target[key];
            key = path.shift();
        }

        return target;
    };

    const addActiveMenu = (preSelector) => {
        //active menu
        let url = new URL(location.href);
        let route = url.origin + url.pathname;
        let li = $(`${preSelector} a[href="${route}"]`).closest('li');
        li.addClass('active');
        let liParent = li.parent().closest('li').not('.nav-header');
        if (liParent.length > 0) {
            liParent.addClass('active');
            liParent.find('ul').addClass('in');
        }
    };

    const bindFormData = (data, options = {}) => {
        let isBs4 = data_get(options, 'bs4') === true;
        //input text
        for (let inputId of data_get(data, 'input_text', [])) {
            let el = $(`#${inputId}`);
            if (el.data('error')) {
                if (isBs4) {
                    el.addClass('is-invalid');
                } else {
                    el.closest('.form-group').addClass('has-error');
                }
                el.after(`<span class="${data_get(options, 'helpClass', 'help-block')}">${el.data('error')}</span>`);
            }
        }

        for (let inputId of data_get(data, 'checkbox', [])) {
            let el = $(`#${inputId}`);
            if (el.data('checked')) {
                el.prop('checked', true);
                if (el.iCheck instanceof Function) {
                    el.iCheck('uncheck');
                    el.iCheck('check');
                }
            }
        }

        for (let inputId of data_get(data, 'radio_group', [])) {
            let el = $(`#${inputId}`);
            if (el.data('error')) {
                if (el.iCheck instanceof Function) {
                    el.iCheck('uncheck');
                    el.iCheck('check');
                }
            }
        }
    };

    const submitFormWhenChange = (inputIds, formId = 'filter-form') => {
        inputIds.forEach(id => {
            $(`#${id}`).on('change', () => {$(`#${formId}`).submit()})
        })
    };

    const bindDeleteAction = (selector, endPointName = 'end-point', recordName = 'record-name') => {
        $(selector).on('click', function () {
            let button = $(this);
            let name = button.data(recordName);
            let endPoint = button.data(endPointName);
            swal({
                title: 'Are you sure?',
                text: `Deleting ${name}`,
                icon: "warning",
                buttons: true,
                dangerMode: true
            })
                .then(function (willDelete) {
                    if (willDelete) {
                        deleteRecord(button, name, endPoint);
                    }
                });
        });

        function deleteRecord(button, name, endPoint) {
            $.ajax({
                url: endPoint,
                method: 'POST',
                data: {
                    '_method': 'DELETE',
                },
                dataType: 'json'
            })
                .then(function (res) {
                    if (res.success) {
                        swal(`Poof! ${name} has been deleted!`, {
                            icon: "success"
                        });
                        button.closest('tr').remove();
                        return;
                    }

                    swal({
                        title: 'An error occurred',
                        text: 'Try again later',
                        icon: 'error'
                    })
                })
                .catch(() => {
                    swal({
                        title: 'An error occurred',
                        text: 'Try again later',
                        icon: 'error'
                    })
                });
        }
    };

    return {
        addActiveMenu,
        submitFormWhenChange,
        bindFormData,
        bindDeleteAction
    }
})($ || jQuery);
