var BwtProfile = function()
{
    this.elts = {
        birthDate: $('#birth'),
        country: $("#country")
    };

    this.endpoints = {

    };

};

$(function(){
    var bwtp = new BwtProfile();

    bwtp.elts.birthDate.datepicker({
        format: 'dd-mm-yyyy'
    });

    $('.select2').select2();

    $.ajax({
        url: '/countries',
        type: 'get',
        dataType: 'json',
        success: function (countries) {
            // console.log(countries);
            var length = countries.length;
            var userCountry = bwtp.elts.country.data('ctr');
            for(var i = 0; i < length; i++) {
                var country = countries[i];
                bwtp.elts.country.append('' +
                    '<option value="' + country.name + '" '+(userCountry === country.name ? 'selected' : '')+'>' +
                    country.name +
                    '</option>')
            }
        },
        error: function (a, b, c) {
            console.log(a, b, c);
        }
    });
});