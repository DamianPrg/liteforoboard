function doAjax(route_url)
{
    $.ajax({
        url:     route_url,
        context: document.body
    }).done(function() {
       // return true
        console.log('doAjax ok ' + route_url);
    }).error(function() {
       console.log('doAjax error ' + route_url);
    });
}