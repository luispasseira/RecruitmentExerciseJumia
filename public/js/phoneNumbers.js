var dataTable = ('#tablePhoneNumbers');
var dataTableBody = ('#tablePhoneNumbersBody');

//creates pages in the given table.
function paginateTable(table, limit) {
    table.DataTable({
        destroy: true,
        "pageLength": limit,
        "bLengthChange": false,
        "bAutoWidth": false,
    });
}

function fillDataTableContent(data) {
    console.log('mostra');
    for (let i = 0; i < data.length; i++) {
        dataTableBody.append("<tr><td>" + data[i].country + "</td> <td style=\"width:14%\">" + data[i].state ? "OK" : "NOK" + "</td> <td>" + values[i].ScoreHome + " - " + values[i].ScoreAway + "</td> <td><span style=\"width:10%;\" class=\"avatar avatar-online\"><img src=\"/resources/imgs/teams/" + values[i].AwayTeamFlag + "\" /></span></td> <td style=\"width:14%\">" + values[i].AwayTeamName + "</td> <td style=\"width:14%\">" + values[i].Date + "</td> <td style=\"width:10%\" class=\"no-users\">" + tip + "</td> <td style=\"width:10%\" class=\"no-users\">" + result + "</td> </tr>");
    }
}

function emptyDataTableContent() {
    dataTableBody.empty;
}

function getPhoneNumbers() {
    $.ajax({
        type: 'post',
        contentType: 'application/x-www-form-urlencoded; charset=utf-8',
        processData: true,
        url: '/',
        data: ({functionCall: 'indexCustomersPhoneNumbers'}),
        success: function (data) {
            console.log(data);
            console.log(JSON.parse(data));
            emptyDataTableContent();
            fillDataTableContent(data);
        },
        error: function (data) {
            console.log('error');
            console.log(data);
        }
    });
}

function getPhoneNumbersByCountry(country) {
    $.ajax({
        type: 'post',
        contentType: 'application/x-www-form-urlencoded; charset=utf-8',
        processData: true,
        url: '/',
        data: ({functionCall: 'indexCustomersPhoneNumbersByCountry', country: country}),
        success: function (data) {
            console.log(data);
            fillDataTableContent(data);
        },
        error: function (data) {
            console.log('error');
            console.log(data);
        }
    });
}

function getPhoneNumbersByState(state) {
    $.ajax({
        type: 'post',
        contentType: 'application/x-www-form-urlencoded; charset=utf-8',
        processData: true,
        url: '/',
        data: ({functionCall: 'indexCustomersPhoneNumbersByState', state: state}),
        success: function (data) {
            console.log(JSON.parse(data));
            fillDataTableContent(data);
        },
        error: function (data) {
            console.log('error');
            console.log(data);
        }
    });
}

$('#selectFilterCountry').on('change', function () {
    getPhoneNumbersByCountry(this.value);
});

$('#selectFilterState').on('change', function () {
    getPhoneNumbersByState(this.value);
});

//calls
//getPhoneNumbers();
//getPhoneNumbersByCountry('212');
getPhoneNumbersByState('1');
console.log('PhoneNumber.js ready');