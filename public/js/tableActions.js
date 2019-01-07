//paginates given table
function paginateTable(table, limit) {
    table.DataTable({
        destroy: true,
        searching: false,
        info: false,
        stateSave: false,
        "pageLength": limit,
        "bLengthChange": false,
        "bAutoWidth": false
    });
}

//empties given table
function emptyTableContent(table) {
    table.empty();
}