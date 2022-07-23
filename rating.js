const stars = document.querySelectorAll("#star");
const rate = document.querySelector("#rate");

stars.forEach((star, i) => {
  star.addEventListener("click", () => {
    let rating;

    for (let j = 0; j <= i; j++) {
      stars[j].classList.add("active");
      rating = j + 1;
    }

    if (stars[i].classList.contains("active")) {
      for (let k = i + 1; k < stars.length; k++) {
        stars[k].classList.remove("active");
      }

      rating = i + 1;
    }

    rate.value = rating;
  });
});
