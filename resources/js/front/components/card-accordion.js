// card accordion
function cardAccordion() {
    const cards = document.querySelectorAll(".card");

    cards.forEach((card) => {
        const btn = card.querySelector(".accordion-btn");
        btn.addEventListener("click", () => {
            cards.forEach((item) => {
                if (item !== card) {
                    item.classList.remove("show");
                }
            });
            card.classList.toggle("show");
        });
    });
    console.log("veikia");
}

export default cardAccordion;
