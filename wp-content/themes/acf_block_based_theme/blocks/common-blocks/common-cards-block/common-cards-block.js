const cards = document.querySelectorAll(".yellow-effects");
const wrapper = document.querySelector(".featured-cards");

wrapper.addEventListener("mousemove", function ($event) {
  cards.forEach(card => {
    const rect = card.getBoundingClientRect();
    const x = $event.clientX - rect.left;
    const y = $event.clientY - rect.top;

    card.style.setProperty("--xPos", `${x}px`);
    card.style.setProperty("--yPos", `${y}px`);
  });
});