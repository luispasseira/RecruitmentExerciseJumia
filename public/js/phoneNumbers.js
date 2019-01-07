//vars
const dataTable = $('#tablePhoneNumbers');
const dataTableHead = $('#tablePhoneNumbersHead');
const dataTableBody = $('#tablePhoneNumbersBody');

//functions
function emptyTableContent(table) {
    table.empty();
}

function fillDataTableContentHead() {
    emptyTableContent(dataTableHead);
    dataTableHead.append("<tr><th scope=\"col\">Country</th>\<th scope=\"col\">State</th><th scope=\"col\">Country code</th><th scope=\"col\">Phone num.</th></tr>");
}

function fillDataTableContentBody(data) {
    emptyTableContent(dataTableBody);
    for (let i = 0; i < data.length; i++) {
        dataTableBody.append("<tr><td>" + data[i].country + "</td> <td>" + (data[i].state ? "OK" : "NOK") + "</td> <td>+" + data[i].country_code + "</td> <td>" + data[i].number + "</td></tr>");
    }
    paginateTable(dataTable, 5);
}

function fillDataTableContent(data) {
    fillDataTableContentHead();
    fillDataTableContentBody(data);
}

function paginateTable(table, limit) {
    table.DataTable({
        destroy: true,
        searching: false,
        info: false,
        "retrieve": true,
        "pageLength": limit,
        "bLengthChange": false,
        "bAutoWidth": false
    });
}

//requests
function getPhoneNumbers() {
    $.ajax({
        type: 'post',
        contentType: 'application/x-www-form-urlencoded; charset=utf-8',
        processData: true,
        url: '/',
        data: ({functionCall: 'indexCustomersPhoneNumbers'}),
        success: function (data) {
            fillDataTableContent(JSON.parse(data));
        },
        error: function (data) {
            console.log(JSON.parse(data));
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
            fillDataTableContent(JSON.parse(data));
        },
        error: function (data) {
            console.log(JSON.parse(data));
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
            fillDataTableContent(JSON.parse(data));
        },
        error: function (data) {
            console.log(JSON.parse(data));
        }
    });
}

//events
$('#selectFilterCountry').on('change', function () {
    getPhoneNumbersByCountry(this.value);
});

$('#selectFilterState').on('change', function () {
    getPhoneNumbersByState(this.value);
});

//calls
getPhoneNumbers();

//tests
//getPhoneNumbersByCountry('212');
//getPhoneNumbersByState('0');


console.log('PhoneNumber.js ready');