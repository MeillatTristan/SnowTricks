const elementList = [...document.querySelectorAll('.containerComment')];
  for (let i = 0; i < 10; i++) {
    if (elementList[i]) {
        elementList[i].style.display = 'flex';
    }
}

const loadmore = document.querySelector('#LoadMore');
let currentItems = 10;
loadmore.addEventListener('click', (e) => {
    const elementList = [...document.querySelectorAll('.containerComment')];
    for (let i = currentItems; i < currentItems + 12; i++) {
        if (elementList[i]) {
            elementList[i].style.display = 'flex';
        }
    }
    currentItems += 10;

    // Load more button will be hidden after list fully loaded
    if (currentItems >= elementList.length) {
        loadmore.style.display = 'none';
    }
})
