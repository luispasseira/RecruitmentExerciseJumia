//vars
const dataTable = $('#tablePhoneNumbers');
const dataTableHead = $('#tablePhoneNumbersHead');
const dataTableBody = $('#tablePhoneNumbersBody');

//functions
//fills the head of tablePhoneNumbers.
function fillDataTableContentHead() {
    emptyTableContent(dataTableHead);
    dataTableHead.append("<tr><th scope=\"col\">Country</th>\<th scope=\"col\">State</th><th scope=\"col\">Country code</th><th scope=\"col\">Phone num.</th></tr>");
}

//fills the body of tablePhoneNumbers with given data
//and paginates the table.
function fillDataTableContentBody(data) {
    emptyTableContent(dataTableBody);

    data = JSON.parse(data);

    for (let i = 0; i < data.length; i++) {
        dataTableBody.append("<tr><td>" + data[i].country + "</td> <td>" + (data[i].state ? "OK" : "NOK") + "</td> <td>+" + data[i].country_code + "</td> <td>" + data[i].number + "</td></tr>");
    }

    paginateTable(dataTable, 5);
}

//fills the head and body and paginates the table.
function fillDataTableContent(data) {
    fillDataTableContentHead();
    fillDataTableContentBody(data);
}

//destroys current given table pagination.
function reinitializeTablePagination(table) {
    if ($.fn.DataTable.isDataTable(table)) {
        table.DataTable().destroy();
    }
}

//requests
//gets all phone numbers on db via ajax.
function getPhoneNumbers() {
    $.ajax({
        type: 'post',
        contentType: 'application/x-www-form-urlencoded; charset=utf-8',
        processData: true,
        url: '/',
        data: ({functionCall: 'indexCustomersPhoneNumbers'}),
        success: function (data) {
            reinitializeTablePagination(dataTable);
            fillDataTableContent(data);
        },
        error: function (data) {
            console.log(JSON.parse(data));
        }
    });
}

//gets all phone numbers on db via ajax by given country.
function getPhoneNumbersByCountry(country) {
    $.ajax({
        type: 'post',
        contentType: 'application/x-www-form-urlencoded; charset=utf-8',
        processData: true,
        url: '/',
        data: ({functionCall: 'indexCustomersPhoneNumbersByCountry', country: country}),
        success: function (data) {
            reinitializeTablePagination(dataTable);
            fillDataTableContent(data);
        },
        error: function (data) {
            console.log(JSON.parse(data));
        }
    });
}

//gets all phone numbers on db via ajax by given state.
function getPhoneNumbersByState(state) {
    $.ajax({
        type: 'post',
        contentType: 'application/x-www-form-urlencoded; charset=utf-8',
        processData: true,
        url: '/',
        data: ({functionCall: 'indexCustomersPhoneNumbersByState', state: state}),
        success: function (data) {
            reinitializeTablePagination(dataTable);
            fillDataTableContent(data);
        },
        error: function (data) {
            console.log(JSON.parse(data));
        }
    });
}

//events
$('#selectFilterCountry').on('change', function () {
    getPhoneNumbersByCountry(this.value);
    $('#selectFilterCountry option:eq(0)').prop('selected', true);
});

$('#selectFilterState').on('change', function () {
    getPhoneNumbersByState(this.value);
    $('#selectFilterState option:eq(0)').prop('selected', true);
});

//calls
getPhoneNumbers();

//tests
//getPhoneNumbersByCountry('212');
//getPhoneNumbersByState('0');