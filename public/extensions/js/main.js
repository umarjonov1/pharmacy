/*price range*/

$('#sl2').slider();

var RGBChange = function () {
    $('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
};

/*scroll to top*/

$(document).ready(function () {
    $(function () {
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: 'top', // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: 'linear', // Scroll to top easing (see http://easings.net/)
            animation: 'fade', // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            //scrollTarget: false, // Set a custom target element for scrolling to the top
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647 // Z-Index for the overlay
        });
    });
});


function cart(res) {

    $("#cart .modal-body").html(res);
    $("#cart").modal();


}

$(".add-to-cart").click(function (e) {

    var url = $(this).data("url");
    var id = $(this).data("id");

    e.preventDefault();

    $.ajax({
        url: url, data: {id: id}, type: "GET", success: function (res) {

            cart(res);

        }, error: function (e) {

            alert("Error")
        }

    });

});

$(".addCart").click(function (e) {

    var url = $(this).data('url');
    var id = $(this).data('id');

    e.preventDefault();

    $.ajax({
        url: url, data: {id: id}, type: "GET", success: function (res) {
            return res;
        }, error: function (e) {
            alert(e);
        }
    })
})


$(".plusProduct").click(function (e) {

    var url = $(this).data('url');
    var id = $(this).data('id');

    e.preventDefault();

    $.ajax({
        url: url, data: {id: id}, type: "GET", success: function (res) {
            location.reload();
        }, error: function (e) {
            alert(e);
        }
    })
})


$(".subProduct").click(function (e) {

    var url = $(this).data('url');
    var id = $(this).data('id');

    e.preventDefault();

    $.ajax({
        url: url, data: {id: id}, type: "GET", success: function (res) {
            location.reload();
        }, error: function (e) {
            alert(e);
        }
    })
})

$(".removeProduct").click(function (e) {
    e.preventDefault();

    var button = $(this);
    var url = button.data('url');
    var id = button.data('id');
    var row = button.closest('tr'); // найдет <tr>, в котором находится кнопка

    $.ajax({
        url: url,
        data: {id: id},
        type: "GET",
        success: function (res) {
            row.fadeOut(1000, function () {
                $(this).remove();
            });
        },
        error: function (xhr) {
            alert("Ошибка: " + xhr.statusText);
        }
    });
});

$(document).ready(function () {
    $(document).on('change', '.statusSelect', function () {
        const $this = $(this);
        const url = $this.data("url");
        const id = $this.data("id");
        const status = $this.val();
        const token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: url,
            type: "POST",
            data: {
                id: id,
                status: status,
                _token: token
            },
            success: function (res) {
                alert("Статус успешно обновлён");
                console.log(res);
            },
            error: function (xhr) {
                alert("Ошибка при обновлении статуса");
                console.log(xhr.responseText);
            }
        });
    });
});




