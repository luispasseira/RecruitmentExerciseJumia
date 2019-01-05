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
    for (let i = 0; i < data.length; i++) {
        //dataTable.append("<tr value=\"" + values[i].Id + "\"> <td style=\"width:10%\">" + values[i].Competition + "</td> <td style=\"width:14%\">" + values[i].HomeTeamName + "</td> <td><span style=\"width:10%;\" class=\"avatar avatar-online\"><img src=\"/resources/imgs/teams/" + values[i].HomeTeamFlag + "\" /></span></td> <td style=\"width:8%\" class=\"no-users\">" + values[i].ScoreHome + " - " + values[i].ScoreAway + "</td> <td><span style=\"width:10%;\" class=\"avatar avatar-online\"><img src=\"/resources/imgs/teams/" + values[i].AwayTeamFlag + "\" /></span></td> <td style=\"width:14%\">" + values[i].AwayTeamName + "</td> <td style=\"width:14%\">" + values[i].Date + "</td> <td style=\"width:10%\" class=\"no-users\">" + tip + "</td> <td style=\"width:10%\" class=\"no-users\">" + result + "</td> </tr>");
    }
}

function getPhoneNumbers() {
    $.ajax({
        type: 'POST',
        contentType: 'application/json; charset=utf-8',
        url: '../../src/controllers/EntityCustomerController.php',
        data: {functionCall: 'indexCustomersPhoneNumbers'},
        dataType: 'json',
        success: function (data) {
            console.log(data);
            fillDataTableContent(data);
        },
        error: function () {

        }
    });
}

getPhoneNumbers();
console.log('PhoneNumber.js ready');