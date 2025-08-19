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

// search for medicine
$(function () {
    var t;

    function renderLoading() {
        $('#medicine-results').html('Qidirilmoqda…');
    }

    function renderEmpty() {
        $('#medicine-results').html('Hech narsa topilmadi');
    }

    function renderError() {
        $('#medicine-results').html('Xatolik yuz berdi');
    }

    function renderItems(items) {
        var base = "{{ url('/product') }}"; // <— починили
        var html = $.map(items, function (m) {
            return '<div class="suggest-item" style="padding:6px 8px;border:1px solid #eee;border-radius:8px;margin:4px 0;">'
                + '<a href="' + base + '/' + m.id + '">' + m.title + '</a> — $' + (m.price || 0)
                + '</div>';
        }).join('');
        $('#medicine-results').html(html);
    }

    function doSearch(q) {
        q = $.trim(q || '');
        if (!q) {
            $('#medicine-results').empty();
            return;
        }

        renderLoading();
        $.ajax({
            url: "{{ route('pages.medicineSearch') }}",
            data: {title: q},
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            success: function (resp) {
                if (!resp.count) {
                    renderEmpty();
                    return;
                }
                renderItems(resp.data);
            },
            error: renderError
        });
    }

    // Ввод с дебаунсом
    $('#medicine-search').on('input', function () {
        clearTimeout(t);
        var val = this.value;
        t = setTimeout(function () {
            doSearch(val);
        }, 300);
    });

    // Enter — немедленный поиск
    $('#medicine-search').on('keydown', function (e) {
        if (e.key === 'Enter' || e.keyCode === 13) {
            e.preventDefault();         // не сабмитим форму
            clearTimeout(t);
            doSearch(this.value);
        }
    });

    // На всякий случай — полностью гасим сабмит формы (если нажали Enter в других браузерных кейсах)
    $('#medicine-search-form').on('submit', function (e) {
        e.preventDefault();
        doSearch($('#medicine-search').val());
    });
});


// adding to medicine to wishlist
(function () {
    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    const badge = document.getElementById('wishlist-count');

    function setBadge(count) {
        if (!badge) return;
        if (count > 0) {
            badge.textContent = String(count);
            badge.style.display = '';
        } else {
            badge.textContent = '';
            badge.style.display = 'none';
        }
    }

    function renderButton(el, isIn) {
        el.classList.toggle('is-in', isIn);
        el.setAttribute('aria-pressed', isIn ? 'true' : 'false');
        const label = el.querySelector('.label');
        if (label) label.textContent = isIn ? 'В избранном' : 'Add to wishlist';
    }

    function updateAllButtonsForId(id, isIn) {
        document.querySelectorAll('.wishlist-toggle[data-id="' + id + '"]')
            .forEach(el => renderButton(el, isIn));
    }

    function removeWishlistRow(id) {
        // Удаляем все строки с таким товаром
        document.querySelectorAll('[data-wishlist-row][data-id="' + id + '"]')
            .forEach(el => el.remove());

        // Если строк не осталось — показываем "пусто"
        const list = document.getElementById('wishlist-list');
        const empty = document.getElementById('wishlist-empty');
        if (list && !list.querySelector('[data-wishlist-row]') && empty) {
            empty.style.display = '';
        }
    }

    document.addEventListener('click', async (e) => {
        const btn = e.target.closest('.wishlist-toggle');
        if (!btn) return;

        e.preventDefault();

        if (btn.dataset.loading === '1') return;
        btn.dataset.loading = '1';

        const url = btn.dataset.url;
        if (!url) {
            delete btn.dataset.loading;
            return;
        }

        function checkEmpty() {
            const list = document.getElementById('wishlist-list');
            const empty = document.getElementById('wishlist-empty');
            if (!list || !empty) return;
            if (!list.querySelector('[data-wishlist-row]')) {
                empty.style.display = '';
            }
        }

        function removeWishlistRow(id) {
            const rows = document.querySelectorAll('[data-wishlist-row][data-id="' + id + '"]');
            rows.forEach((row) => {
                // запускаем fade-out
                row.classList.add('is-removing');

                // по окончании анимации удаляем из DOM
                const onEnd = (ev) => {
                    if (ev.target !== row) return; // ждём завершения именно у строки
                    row.removeEventListener('transitionend', onEnd);
                    if (row.parentNode) row.parentNode.removeChild(row);
                    checkEmpty();
                };
                row.addEventListener('transitionend', onEnd, {once: true});

                // защита на случай отсутствия transition (старые браузеры)
                setTimeout(() => {
                    if (row.isConnected) {
                        row.removeEventListener('transitionend', onEnd);
                        if (row.parentNode) row.parentNode.removeChild(row);
                        checkEmpty();
                    }
                }, 1000);
            });
        }

        try {
            const res = await fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrf || '',
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                credentials: 'same-origin'
            });

            if (res.status === 419) throw new Error('CSRF token mismatch (419)');
            if (res.status === 405) throw new Error('Method not allowed (405)');
            if (res.status === 302) throw new Error('Redirect (302)');
            if (!res.ok) throw new Error('HTTP ' + res.status);

            const data = await res.json(); // { success, id, is_favorite, count, ids }
            if (!data || !data.success) throw new Error('Bad JSON');

            const id = String(data.id);

            // Обновляем все кнопки и бейдж
            updateAllButtonsForId(id, !!data.is_favorite);
            setBadge(Number(data.count) || 0);

            // Если удалили из избранного и мы на странице избранного — убираем строку сразу
            if (!data.is_favorite) {
                removeWishlistRow(id);
            }
        } catch (err) {
            console.error(err);
            alert('Не удалось выполнить операцию. Попробуйте ещё раз.');
        } finally {
            delete btn.dataset.loading;
        }
    });
})();

// like
$(document).on('click', '.like-btn', function (e) {
    e.preventDefault();

    let $btn = $(this);
    let url = $btn.attr('href');

    $.ajax({
        url: url,
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.liked) {
                $btn.addClass('active');
            } else {
                $btn.removeClass('active');
            }
        },
        error: function () {
            alert("Ошибка при лайке");
        }
    });
});




