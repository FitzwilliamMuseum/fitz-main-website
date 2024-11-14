const cardsArray = document.querySelectorAll('[data-component="card"]');

if (cardsArray.length > 0) {
    // Loop through cards adding a click event and identifying the main link
    cardsArray.forEach(function (card) {
        const mainLink = card.querySelector('.stretched-link');
        const clickableElems = Array.prototype.slice.call(card.querySelectorAll('[data-click]'));
        // Allow other links/buttons in the card to still be "clickable"
        if (clickableElems) {
            clickableElems.forEach(function (elem) {
                return elem.addEventListener("click", (event) => {
                    return event.stopPropagation();
                });
            });
        }
        card.addEventListener('click', (event) => {
            if (event.redispatched || event.target === mainLink) {
                return;
            }
            let noTextSelected = !window.getSelection().toString();
            if (noTextSelected) {
                const event2 = new MouseEvent("click", event);
                event2.redispatched = true;
                mainLink.dispatchEvent(event2);
            }
        });
    });
}
