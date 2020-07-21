// DOM

const cardCommu = document.querySelector('.servicesUs__card1')
const cardAudio = document.querySelector('.servicesUs__card2')
const cardEvent = document.querySelector('.servicesUs__card3')

const imgComm = document.querySelector('.servicesUs__img1')
const imgCommAlt = document.querySelector('.servicesUs__imgAlt1')

const imgAudio = document.querySelector('.servicesUs__img2')
const imgAudioAlt = document.querySelector('.servicesUs__imgAlt2')

const imgEvent = document.querySelector('.servicesUs__img3')
const imgEventAlt = document.querySelector('.servicesUs__imgAlt3')

const divCommu = document.querySelector('.displayComm')
const divAudio = document.querySelector('.displayAudio')
const divEvent = document.querySelector('.displayEvent')

// EVENT

cardCommu.addEventListener('click',fCommunication);
cardAudio.addEventListener('click',fAudio);
cardEvent.addEventListener('click',fEvent);