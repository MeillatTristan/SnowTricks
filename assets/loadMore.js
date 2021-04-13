const elementList = [...document.querySelectorAll('.containerTricks .cardTrick')];
  for (let i = 0; i < 15; i++) {
    if (elementList[i]) {
        elementList[i].style.display = 'flex';
    }
}

const loadmore = document.querySelector('#LoadMore');
let currentItems = 15;
loadmore.addEventListener('click', (e) => {
    console.log('yo');
    const elementList = [...document.querySelectorAll('.containerTricks .cardTrick')];
    for (let i = currentItems; i < currentItems + 15; i++) {
        if (elementList[i]) {
            elementList[i].style.display = 'flex';
        }
    }
    currentItems += 15;

    // Load more button will be hidden after list fully loaded
    if (currentItems >= elementList.length) {
        event.target.style.display = 'none';
    }
})

