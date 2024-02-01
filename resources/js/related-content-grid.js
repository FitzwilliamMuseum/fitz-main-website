window.addEventListener("DOMContentLoaded", () => {
    const grid = document.querySelector(".related .related-grid");
    if (!grid) return;
    
    const numItems = grid.children.length;
    if (numItems < 4) {
        grid.classList.add("less-than-four");
    } else {
        grid.classList.add("four");
    }

});
