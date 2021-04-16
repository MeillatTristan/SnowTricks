const elementList = [...document.querySelectorAll('.containerTricks .cardTrick')];
  for (let i = 0; i < 12; i++) {
    if (elementList[i]) {
        elementList[i].style.display = 'flex';
    }
}

const loadmore = document.querySelector('#LoadMore');
let currentItems = 12;
loadmore.addEventListener('click', (e) => {
    const elementList = [...document.querySelectorAll('.containerTricks .cardTrick')];
    for (let i = currentItems; i < currentItems + 12; i++) {
        if (elementList[i]) {
            elementList[i].style.display = 'flex';
        }
    }
    currentItems += 12;

    // Load more button will be hidden after list fully loaded
    if (currentItems >= elementList.length) {
        event.target.style.display = 'none';
    }
})

