function changePerPage(type, value) {
    const url = new URL(window.location.href);
    url.searchParams.set('per_page', value);
    if (type === 'orders') {
        url.searchParams.set('orders_page', 1);
    } else if (type === 'pakets') {
        url.searchParams.set('pakets_page', 1);
    }
    window.location.href = url.toString();
}
