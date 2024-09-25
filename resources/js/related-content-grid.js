window.addEventListener("DOMContentLoaded", () => {
    const grid = document.querySelectorAll(".related .related-grid");
    if (!grid) return;
    grid.forEach((el) => {
        const numItems = el.children.length;
        if (numItems < 4) {
            el.classList.add("less-than-four");
        } else {
            el.classList.add("four");
        }
    });
});
