function getObjectGetParams()
{
    var search = window.location.search.substr(1),
    params = {};
    if (search == '') return false;   
    search.split('&').forEach(function(item) {
        item = item.split('=');
        params[item[0]] = item[1];
    });
    return params;
}

function buildStingGetPages()
{
    var get = getObjectGetParams();
    var string = '';
    if (get.page) string += '&page' + get.page;
    if (get.pages) string += '&pages' + get.pages;
    return string; 
}