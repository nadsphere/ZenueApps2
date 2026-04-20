/**
 * Notification page shared functionality
 */

(function() {
    'use strict';

    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var pendingDeleteIds = [];

    /**
     * Get selected notification IDs
     */
    function getSelectedIds() {
        var ids = [];
        $('.notif-item-checkbox:checked').each(function() {
            ids.push($(this).val());
        });
        return ids;
    }

    /**
     * Toggle select all checkboxes
     */
    window.notifToggleAll = function(source) {
        var checkboxes = $('.notif-item-checkbox');
        checkboxes.prop('checked', $(source).prop('checked'));
        checkboxes.closest('.notif-list-item').toggleClass('selected', $(source).prop('checked'));
        updateBulkBar();
    };

    /**
     * Called when any item checkbox changes
     */
    window.notifItemChanged = function() {
        $('.notif-item-checkbox').each(function() {
            $(this).closest('.notif-list-item').toggleClass('selected', $(this).prop('checked'));
        });

        var total = $('.notif-item-checkbox').length;
        var checked = $('.notif-item-checkbox:checked').length;
        $('#notif-check-all').prop('checked', total > 0 && checked === total);
        $('#notif-check-all').prop('indeterminate', checked > 0 && checked < total);

        updateBulkBar();
    };

    /**
     * Show/hide bulk action bar based on selection
     */
    function updateBulkBar() {
        var ids = getSelectedIds();
        var count = ids.length;
        var $bar = $('#notif-bulk-bar');
        var $count = $('#notif-selected-count');

        if (count > 0) {
            $bar.show();
            $count.text(count + ' dipilih');
        } else {
            $bar.hide();
        }
    }

    /**
     * Determine base URL path (user or eo)
     */
    function getBasePath() {
        return window.location.pathname.indexOf('/eo/') === 0 ? '/eo/notif' : '/user/notif';
    }

    /**
     * Open delete confirmation modal
     * @param {string} name - Title or count to show
     * @param {string} subtext - Sub text to show
     * @param {array} ids - Array of IDs to delete
     */
    function openNotifDeleteModal(name, subtext, ids) {
        pendingDeleteIds = ids;
        document.getElementById('notifDeleteName').textContent = name;
        document.getElementById('notifDeleteSubtext').textContent = subtext;
        document.getElementById('notifDeleteModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    /**
     * Close delete confirmation modal
     */
    window.closeNotifDeleteModal = function() {
        document.getElementById('notifDeleteModal').classList.remove('active');
        document.body.style.overflow = '';
        pendingDeleteIds = [];
    };

    /**
     * Confirm delete from modal - executes the actual delete
     */
    window.confirmNotifDelete = function() {
        var base = getBasePath();

        pendingDeleteIds.forEach(function(id) {
            $.ajax({
                url: base + '/delete/' + id,
                type: 'POST',
                data: { _token: csrfToken },
                success: function() {
                    $('#notif-item-' + id).fadeOut(200, function() {
                        $(this).remove();
                        if ($('.notif-list-item').length === 0) {
                            window.location.reload();
                        }
                    });
                }
            });
        });

        // Reset select all
        $('#notif-check-all').prop('checked', false);
        updateBulkBar();
        updateNotifBadge();
        closeNotifDeleteModal();
    };

    /**
     * Mark selected notifications as read
     */
    window.notifBulkMarkRead = function() {
        var ids = getSelectedIds();
        if (ids.length === 0) return;

        var base = getBasePath();

        ids.forEach(function(id) {
            $.ajax({
                url: base + '/mark-read/' + id,
                type: 'POST',
                data: { _token: csrfToken }
            });
        });

        setTimeout(function() {
            window.location.reload();
        }, 300);
    };

    /**
     * Delete selected notifications (opens modal first)
     */
    window.notifBulkDelete = function() {
        var ids = getSelectedIds();
        if (ids.length === 0) return;

        var count = ids.length;
        var name = count + ' notifikasi';
        var subtext = 'dari daftar notifikasi Anda?';
        var $items = $('.notif-item-checkbox:checked').closest('.notif-list-item');
        var titles = [];
        $items.find('.notif-item-title-text').each(function() {
            titles.push($(this).text().trim());
        });

        if (titles.length > 0) {
            name = titles.slice(0, 3).join(', ');
            if (titles.length > 3) name += '...';
            subtext = 'dan ' + (titles.length - 3) + ' notifikasi lainnya?';
            if (titles.length <= 3) subtext = 'dari daftar notifikasi Anda?';
        }

        openNotifDeleteModal(name, subtext, ids);
    };

    /**
     * Delete a single notification (opens modal first)
     * @param {number} id - Notification ID
     */
    window.deleteNotification = function(id) {
        var $item = $('#notif-item-' + id);
        var title = $item.find('.notif-item-title-text').text().trim();
        openNotifDeleteModal(title, 'dari daftar notifikasi Anda?', [id]);
    };

    /**
     * Mark a single notification as read and optionally redirect
     * @param {number} id - Notification ID
     * @param {string} link - Redirect URL (empty means reload)
     */
    window.markAsRead = function(id, link) {
        var base = getBasePath();

        $.ajax({
            url: base + '/mark-read/' + id,
            type: 'POST',
            data: { _token: csrfToken },
            success: function() {
                if (link && link.length > 0) {
                    window.location.href = link;
                } else {
                    window.location.reload();
                }
            }
        });
    };

    /**
     * Update the notification badge count in the header
     */
    function updateNotifBadge() {
        $.ajax({
            url: '/notifications/unread-count',
            type: 'GET',
            success: function(response) {
                var count = response.count || 0;
                var display = count > 99 ? '99+' : count;
                if (count > 0) {
                    $('#notif-badge-user, #notif-badge-eo').text(display).show();
                    $('#notif-badge-user-mobile, #notif-badge-eo-mobile').text(display).show();
                } else {
                    $('#notif-badge-user, #notif-badge-eo').hide();
                    $('#notif-badge-user-mobile, #notif-badge-eo-mobile').hide();
                }
            }
        });
    }

    // Initialize badge on page load
    updateNotifBadge();
})();
